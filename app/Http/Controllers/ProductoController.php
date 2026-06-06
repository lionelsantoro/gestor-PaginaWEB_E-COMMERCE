<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    // 1. MOSTRAR LA VISTA
    public function index()
    {
        // Traemos solo los productos que están activos
        $productos = Producto::with('categoria')->where('activo', true)->get();
        
        return view('Admin.adminProductos', compact('productos'));
    }

    // 2. CREAR PRODUCTO
    public function store(Request $request)
    {
        Producto::create([
            'nombre' => $request->nombre,
            'ID_categoria' => $request->ID_categoria,
            'stock' => $request->stock,
            'precio' => $request->precio,
            'activo' => true
            // Si en tu form agregas descripción o imagen, los pones aquí
        ]);

        return back()->with('success', 'Producto creado exitosamente.');
    }

    // 3. MODIFICAR PRODUCTO
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        
        $producto->update([
            'nombre' => $request->nombre,
            'ID_categoria' => $request->ID_categoria,
            'stock' => $request->stock,
            'precio' => $request->precio,
        ]);

        return back()->with('success', 'Producto actualizado.');
    }

    // 4. BAJA LÓGICA (Eliminar)
    public function bajaLogica($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->activo = false; // Aquí aplicamos tu lógica
        $producto->save();

        return back()->with('success', 'Producto eliminado (dado de baja).');
    }
}