<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function procesar(Request $request) 
    { 
        // 1. Validar que vengan los datos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 2. Intentar loguear (Compara con la tabla 'usuarios')
        // Usamos 'correo' porque así se llama la columna en tu BD.
        $credenciales = [
            'correo' => $request->email,
            'password' => $request->password 
        ];

        if (Auth::attempt($credenciales)) {
            // Si el correo y contraseña coinciden, creamos la sesión de seguridad
            $request->session()->regenerate();
            
            // Redirigimos al inicio con tu Toast morado de éxito
            return redirect('/')->with('success', 'Inicio de sesión exitoso');
        }

        // 3. Si se equivoca de contraseña o correo, lo devolvemos con un error
        return back()->withErrors([
            'email' => 'El correo o la contraseña son incorrectos.',
        ])->onlyInput('email');
    } 

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}