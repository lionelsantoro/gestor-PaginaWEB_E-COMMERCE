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

        if ($producto->stock <= 0) {
            return response()->json(['status' => 'error', 'message' => 'No hay stock disponible.']);
        }

        $pedido = Pedido::firstOrCreate(
            ['ID_Usuario' => Auth::id(), 'estado' => 'creada'],
            ['total' => 0]
        );

        $item = PedidoItem::where('ID_Pedido', $pedido->id)
                          ->where('ID_Producto', $idProducto)
                          ->first();

        if ($item) {
            if ($item->cantidad + 1 > $producto->stock) {
                return response()->json(['status' => 'error', 'message' => 'No hay más stock disponible.']);
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

        if ($request->cantidad > $producto->stock) {
            return redirect()->back()->with('error', 'No hay suficiente stock.');
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
        $pedido = Pedido::where('ID_Usuario', Auth::id())
                        ->where('estado', 'creada')
                        ->firstOrFail();

        foreach ($pedido->items as $item) {
            $producto = $item->producto;
            $producto->stock -= $item->cantidad;
            $producto->save();
        }

        $pedido->estado    = 'pagada';
        $pedido->direccion = $request->direccion;
        $pedido->save();

        // Si la petición viene del fetch (AJAX) → devuelve JSON para el modal
        if ($request->expectsJson()) {
            return response()->json(['status' => 'success']);
        }

        // Fallback por si el JS falla → redirige normalmente
        return redirect('/catalogo')->with('success', '¡Compra confirmada con éxito!');
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