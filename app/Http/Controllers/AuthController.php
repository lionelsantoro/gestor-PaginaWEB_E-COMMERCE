<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    // ==========================================
    // LÓGICA DE REGISTRO
    // ==========================================
    public function registrar(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            // VALIDACIÓN 1: "unique:usuarios,correo" prohíbe crear cuentas con emails ya registrados.
            'email' => 'required|email|unique:usuarios,correo', 
            'password' => 'required|min:6|confirmed',
        ]);

        $nuevoUsuario = Usuario::create([
            'nombreCompleto' => $request->nombre . ' ' . $request->apellido,
            'correo' => $request->email,
            'contrasena' => Hash::make($request->password),
            'rol' => 'cliente', // Rol requerido por la cátedra
            'active' => true
        ]);

        Auth::login($nuevoUsuario);

        return redirect('/')->with('success', 'Registro exitoso');
    }

    // ==========================================
    // LÓGICA DE LOGIN
    // ==========================================
    public function login(Request $request) 
    { 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credenciales = [
            'correo' => $request->email,
            'password' => $request->password 
        ];

        // VALIDACIÓN 2: Auth::attempt() verifica automáticamente si la cuenta existe 
        // y si la contraseña es correcta. Si no existe, salta al "return back()".
        if (Auth::attempt($credenciales)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Inicio de sesión exitoso');
        }

        // Si llega acá, es porque no tiene cuenta o puso mal los datos:
        return back()->withErrors([
            'email' => 'El correo o la contraseña son incorrectos.',
        ])->onlyInput('email');
    } 

    // ==========================================
    // LÓGICA DE LOGOUT
    // ==========================================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}