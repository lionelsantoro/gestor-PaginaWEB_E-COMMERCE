<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    // 1. MOSTRAR LA VISTA (Con filtros de búsqueda y categoría)
    public function index(Request $request)
    {
        // Empezamos la consulta trayendo solo los productos activos y sus categorías
        $query = Producto::with('categoria')->where('activo', true);

        // Si el usuario escribió algo en el campo "buscar"
        if ($request->filled('buscar')) {
            $query->where('nombre', 'LIKE', '%' . $request->buscar . '%');
        }

        // Si el usuario seleccionó una "categoría" del menú desplegable
        if ($request->filled('categoria')) {
            $query->where('ID_categoria', $request->categoria);
        }

        // Ejecutamos la consulta final
        $productos = $query->get();
        
        return view('Admin.adminProductos', compact('productos'));
    }

    // 2. CREAR PRODUCTO
    public function store(Request $request)
    {
        Producto::create([
            'nombre' => $request->nombre,
            'ID_categoria' => $request->ID_categoria,
            'stock' => $request->stock,
            'stock_bajo' => $request->stock_bajo, // <-- Agregado para la alerta de stock
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
            'stock_bajo' => $request->stock_bajo, // <-- Agregado para poder editar el límite
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