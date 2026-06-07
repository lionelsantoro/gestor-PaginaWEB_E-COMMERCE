<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoItem;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

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
        
        // Calculamos el stock real disponible para la venta (respetando el stock_bajo)
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
                return response()->json(['status' => 'error', 'message' => 'No puedes agregar más unidades. Límite de stock alcanzado.']);
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
        $request->validate([
            'direccion' => 'required|string|max:255'
        ]);

        $pedido = Pedido::where('ID_Usuario', Auth::id())
                        ->where('estado', 'creada')
                        ->firstOrFail();

        // 1. PRIMERA PASADA: Validar que todos los items cumplen la regla del stock_bajo
        foreach ($pedido->items as $item) {
            $producto = $item->producto;
            $stockDisponible = $producto->stock - $producto->stock_bajo;

            // Si el stock cae a un número igual o menor al stock_bajo, frenamos la compra
            if ($stockDisponible <= 0 || $item->cantidad > $stockDisponible) {
                if ($request->expectsJson()) {
                    return response()->json([
                        'status' => 'error', 
                        'message' => "El producto '{$producto->nombre}' alcanzó su límite de reserva. Por favor, disminuye la cantidad o elimínalo del carrito."
                    ]);
                }
                return redirect()->back()->with('error', "Falta de stock para '{$producto->nombre}'.");
            }
        }

        $totalCalculado = 0;

        // 2. SEGUNDA PASADA: Como todo está correcto, descontamos de la base de datos
        foreach ($pedido->items as $item) {
            $producto = $item->producto;
            
            $producto->stock -= $item->cantidad;
            $producto->save();
            
            $totalCalculado += ($item->cantidad * $item->precioUnitario);
        }

        // 3. Finalizamos el pedido
        $pedido->estado    = 'pagada';
        $pedido->direccion = $request->direccion;
        $pedido->total     = $totalCalculado;
        $pedido->save();

        if ($request->expectsJson()) {
            return response()->json(['status' => 'success']);
        }

        return redirect('/historialcompra')->with('success', '¡Compra confirmada con éxito!');
    }

    private function recalcularTotal($pedidoId)
    {
        $pedido = Pedido::find($pedidoId instanceof Pedido ? $pedidoId->id : $pedidoId);
        if ($pedido) {
            $total = $pedido->items->sum(fn($item) => $item->cantidad * $item->precioUnitario);
            $pedido->total = $total;
            $pedido->save();
        }
    }
}