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
                    ->where('estado', '!=', 'pendientePago') // Modificado
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
}