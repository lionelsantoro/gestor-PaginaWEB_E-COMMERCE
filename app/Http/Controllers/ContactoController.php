<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consulta; // Importamos el modelo que creaste
use Illuminate\Support\Facades\Auth; // Importamos Auth para saber quién escribe

class ContactoController extends Controller
{
    public function procesar(Request $request)
    {
        // 1. Validamos por seguridad en el backend
        $request->validate([
            'asunto' => 'required|string|max:255|regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/',
            'mensaje' => 'required|string'
        ]);

        // 2. Guardamos la consulta en la base de datos
        Consulta::create([
            'ID_Usuario' => Auth::id(), // Obtenemos la ID del usuario que inició sesión
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
            'estado' => 'noLeido' // Por defecto entra como no leído
        ]);

        // 3. Devolvemos a la vista con el mensaje de éxito para que salte el Toast
        return back()->with('success_contacto', 'Mensaje enviado.');
    }
}