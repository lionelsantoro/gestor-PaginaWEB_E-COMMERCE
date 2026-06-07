<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // IMPORTANTE: Agregamos DB para transacciones

class CarritoController extends Controller
{
    public function index()
    {
        $pedido = Pedido::where('ID_Usuario', Auth::id())
                        ->where('estado', 'creada')
                        ->with('items.producto')
                        ->first();

        return view('carrito.index', compact('pedido'));
    }

    public function agregar(Request $request, $idProducto)
    {
        if (!Auth::check()) {
            return response()->json(['status' => 'unauthenticated', 'message' => 'Debes iniciar sesión.']);
        }

        $producto = Producto::findOrFail($idProducto);
        
        $stockDisponible = $producto->stock - $producto->stock_bajo;

        if ($stockDisponible <= 0) {
            return response()->json(['status' => 'error', 'message' => 'No hay stock disponible (Reserva mínima alcanzada).']);
        }

        $pedido = Pedido::firstOrCreate(
            ['ID_Usuario' => Auth::id(), 'estado' => 'creada'],
            ['total' => 0]
        );

        $item = PedidoItem::where('ID_Pedido', $pedido->id)
                          ->where('ID_Producto', $idProducto)
                          ->first();

        if ($item) {
            if ($item->cantidad + 1 > $stockDisponible) {
                return response()->json(['status' => 'error', 'message' => 'Límite de stock alcanzado.']);
            }
            $item->cantidad += 1;
            $item->save();
        } else {
            PedidoItem::create([
                'ID_Pedido'      => $pedido->id,
                'ID_Producto'    => $idProducto,
                'cantidad'       => 1,
                'precioUnitario' => $producto->precio,
            ]);
        }

        $this->recalcularTotal($pedido);
        return response()->json(['status' => 'success', 'message' => 'Producto agregado al carrito.']);
    }

    public function actualizarCantidad(Request $request, $idItem)
    {
        $item     = PedidoItem::findOrFail($idItem);
        $producto = $item->producto;
        
        $stockDisponible = $producto->stock - $producto->stock_bajo;

        if ($request->cantidad > $stockDisponible) {
            return redirect()->back()->with('error', 'Superaste el límite de stock disponible.');
        }

        if ($request->cantidad < 1) {
            $item->delete();
        } else {
            $item->cantidad = $request->cantidad;
            $item->save();
        }

        $this->recalcularTotal($item->ID_Pedido);
        return redirect()->back();
    }

    public function eliminar($idItem)
    {
        $item     = PedidoItem::findOrFail($idItem);
        $idPedido = $item->ID_Pedido;
        $item->delete();

        $this->recalcularTotal($idPedido);
        return redirect()->back()->with('success', 'Producto eliminado del carrito.');
    }
    
    public function confirmarPago(Request $request)
    {
        $request->validate(['direccion' => 'required|string|max:255']);

        // Usamos una transacción para que si algo falla, no se descuente stock a medias
        return DB::transaction(function () use ($request) {
            $pedido = Pedido::where('ID_Usuario', Auth::id())
                            ->where('estado', 'creada')
                            ->with('items.producto')
                            ->firstOrFail();

            $totalFinal = 0;

            // 1. VALIDACIÓN INTEGRAL Y CÁLCULO
            foreach ($pedido->items as $item) {
                $producto = $item->producto;
                $stockDisponible = $producto->stock - $producto->stock_bajo;

                if ($stockDisponible <= 0 || $item->cantidad > $stockDisponible) {
                    if ($request->expectsJson()) {
                        return response()->json([
                            'status' => 'error', 
                            'message' => "El producto '{$producto->nombre}' ya no tiene stock suficiente."
                        ]);
                    }
                    return back()->with('error', "Stock insuficiente para '{$producto->nombre}'.");
                }
                
                // Acumulamos el total real según los precios actuales
                $totalFinal += ($item->cantidad * $item->precioUnitario);
            }

            // 2. APLICAR DESCUENTO DE STOCK
            foreach ($pedido->items as $item) {
                $item->producto->decrement('stock', $item->cantidad);
            }

            // 3. FINALIZAR PEDIDO
            $pedido->update([
                'total'     => $totalFinal,
                'direccion' => $request->direccion,
                'estado'    => 'pagada'
            ]);

            if ($request->expectsJson()) {
                return response()->json(['status' => 'success']);
            }
            return redirect('/historialcompra')->with('success', '¡Compra confirmada!');
        });
    }

    private function recalcularTotal($pedido)
    {
        $pedido = $pedido instanceof Pedido ? $pedido : Pedido::find($pedido);
        if ($pedido) {
            $pedido->total = $pedido->items->sum(fn($item) => $item->cantidad * $item->precioUnitario);
            $pedido->save();
        }
    }
}