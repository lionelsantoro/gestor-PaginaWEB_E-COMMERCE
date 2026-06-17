<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class CatalogoController extends Controller
{
    public function index(Request $request)
    {
        // 1. Traer categorías para los botones
        $categorias = Categoria::where('activo', true)->get();

        // 2. Preparar consulta de productos
        $query = Producto::where('activo', true);

        // 3. Filtrar si se elige una categoría (por el ID)
        if ($request->has('categoria') && $request->categoria != 'todas') {
            $query->where('ID_categoria', $request->categoria);
        }

        // 4. Paginar de a 15 
        $productos = $query->paginate(15)->appends($request->query());

        // 5. Retornar la vista
        return view('catalogo.index', compact('productos', 'categorias'));
    }
}