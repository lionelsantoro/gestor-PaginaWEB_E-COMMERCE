<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegistroController extends Controller
{
    public function procesar(Request $request)
    {
        // 1. Validar que los datos cumplan las reglas
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,correo', // Que el correo no exista ya
            'password' => 'required|min:6|confirmed', // confirmed busca el campo password_confirmation
        ]);

        // 2. Guardar en la base de datos
        $nuevoUsuario = Usuario::create([
            'nombreCompleto' => $request->nombre . ' ' . $request->apellido,
            'correo' => $request->email,
            'contrasena' => Hash::make($request->password), // Encriptación obligatoria
            'rol' => 'comprador',
            'active' => true
        ]);

        // 3. Iniciar sesión automáticamente después de registrarse
        Auth::login($nuevoUsuario);

        // 4. Redirigir al inicio con tu Toast de éxito
        return redirect('/')->with('success', 'Registro exitoso');
    }
}