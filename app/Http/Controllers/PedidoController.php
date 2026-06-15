<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        // Excluimos los carritos activos ('pendientePago') para que el admin no los vea
        $pedidos = Pedido::with(['usuario', 'items.producto'])
                    ->where('estado', '!=', 'pendientePago')
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('Admin.adminPedidos', compact('pedidos'));
    }

    public function actualizarEstado(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->estado = $request->estado;
        $pedido->save();

        return back()->with('success', 'Estado actualizado.');
    }

    // Nuevo método agregado:
    public function actualizarEnvio(Request $request, $id)
    {
        $pedido = Pedido::findOrFail($id);

        // Validación: Solo permitir modificar si el estado es 'pagada'
        if ($pedido->estado !== 'pagada') {
            return back()->with('error', 'No se puede modificar el envío de un pedido que no esté pagado.');
        }

        $request->validate([
            'envio' => 'required|in:enviado,no enviado,listo para retirar',
        ]);

        $pedido->envio = $request->envio;
        $pedido->save();

        return back()->with('success', 'Estado de envío actualizado correctamente.');
    }
}