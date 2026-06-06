<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta;

class ConsultaController extends Controller
{
    // 1. MOSTRAR LA VISTA
    public function index()
    {
        // Traemos todas las consultas con los datos del usuario.
        // Ordenamos para que las 'noLeido' aparezcan primero, y luego por fecha más reciente.
        $consultas = Consulta::with('usuario')
            ->orderByRaw("estado = 'noLeido' DESC")
            ->orderBy('created_at', 'desc')
            ->get();

        return view('Admin.adminConsultas', compact('consultas'));
    }

    // 2. MARCAR COMO LEÍDO
    public function marcarLeido($id)
    {
        $consulta = Consulta::findOrFail($id);
        $consulta->estado = 'leido';
        $consulta->save();

        return back()->with('success', 'Consulta marcada como leída.');
    }

    // 3. ELIMINAR CONSULTA
    public function destroy($id)
    {
        $consulta = Consulta::findOrFail($id);
        // Como le pusimos SoftDeletes al modelo, esto hace una baja lógica automáticamente
        $consulta->delete(); 

        return back()->with('success', 'Mensaje eliminado correctamente.');
    }
}