<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // MOSTRAR LA VISTA
    public function index(Request $request)
    {
        // Traemos los usuarios activos
        $query = Usuario::where('active', true);

        // Filtro por nombre o correo
        if ($request->filled('buscar')) {
            $query->where(function($q) use ($request) {
                $q->where('nombreCompleto', 'LIKE', '%' . $request->buscar . '%')
                  ->orWhere('correo', 'LIKE', '%' . $request->buscar . '%');
            });
        }

        // Filtro por rol (cliente o admin)
        if ($request->filled('rol')) {
            $query->where('rol', $request->rol);
        }

        $usuarios = $query->get();

        return view('Admin.adminUsuarios', compact('usuarios'));
    }

    // CREAR ADMIN
    public function store(Request $request)
    {
        Usuario::create([
            'nombreCompleto' => $request->nombreCompleto,
            'correo' => $request->correo,
            'contrasena' => Hash::make($request->contrasena), 
            'rol' => $request->rol, // Viene como 'admin' del formulario
            'active' => true
        ]);

        return back()->with('success', 'Administrador creado exitosamente.');
    }

    // ACTUALIZAR ADMIN
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        
        $usuario->nombreCompleto = $request->nombreCompleto;
        $usuario->correo = $request->correo;

        // Si escribió algo en la contraseña, la actualizamos
        if ($request->filled('contrasena')) {
            $usuario->contrasena = Hash::make($request->contrasena);
        }

        $usuario->save();

        return back()->with('success_perfil', 'Administrador actualizado.');
    }

    // BAJA LÓGICA
    public function bajaLogica($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->active = false;
        $usuario->save();

        return back()->with('success', 'Usuario dado de baja.');
    }
}