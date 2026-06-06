<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\AuthController;     // NUEVO CONTROLADOR DE LOGIN/REGISTRO
use App\Http\Controllers\CarritoController;  // NUEVO CONTROLADOR DEL CARRITO
use App\Http\Controllers\ProductoController;

// ==========================================
// RUTAS PÚBLICAS (INICIO Y CONTACTO)
// ==========================================
Route::get('/', function () {
    return view('PaginaPrincipal');
});

Route::get('/quienes-somos', function () {
    return view('QuienesSomos');
});

Route::get('/comercializacion', function () {
    return view('Comercializacion');
});

Route::get('/terminos-y-usos', function () {
    return view('Terminos_Y_Usos');
});

Route::get('/informacion-de-contacto', function () {
    return view('InformacionDeContacto');
});

Route::get('/historialcompra', function () {
    return view('carrito.historialcompra');
});

Route::post('/informacion-de-contacto', [ContactoController::class, 'procesar']);


// ==========================================
// RUTA DINÁMICA DEL CATÁLOGO
// ==========================================
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');


// ==========================================
// RUTAS DE AUTENTICACIÓN (LOGIN Y REGISTRO)
// ==========================================
// Importante: El ->name('login') le avisa a Laravel a dónde mandar a los que no tienen sesión
Route::get('/login', function () {
    return view('formularios.Login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/registro', function () {
    return view('formularios.registro'); 
});

Route::post('/registro', [AuthController::class, 'registrar']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ==========================================
// RUTAS DEL CARRITO DE COMPRAS (SOLO CLIENTES)
// ==========================================
// El middleware 'auth' protege estas rutas. Si alguien sin cuenta quiere entrar, Laravel lo manda al login.
Route::middleware(['auth'])->group(function () {
  Route::get('/carrito', [CarritoController::class, 'index'])->name('carrito');
    Route::post('/carrito/agregar/{producto}', [CarritoController::class, 'agregar']);
    Route::post('/carrito/actualizar/{item}', [CarritoController::class, 'actualizarCantidad']);
    Route::get('/carrito/eliminar/{item}', [CarritoController::class, 'eliminar']);
    Route::post('/carrito/pagar', [CarritoController::class, 'confirmarPago']);
});

// ==========================================
// RUTAS DE HISTORIAL DE COMPRA
// ==========================================
Route::get('/historialcompra', function () {
    // 1. Obtenemos los pedidos del usuario logueado
    // 2. Traemos las relaciones 'items' y 'items.producto' para evitar múltiples consultas a la base de datos (Eager Loading)
    // 3. Excluimos los pedidos 'creada' porque esos son el carrito activo, no el historial
    $pedidos = \App\Models\Pedido::with('items.producto')
                ->where('ID_Usuario', Auth::id())
                ->where('estado', '!=', 'creada') 
                ->orderBy('created_at', 'desc') // Ordenamos del más reciente al más antiguo
                ->get();

    return view('carrito.historialcompra', compact('pedidos'));
})->middleware('auth'); // Protegemos la ruta para que solo entren usuarios logueados

// ==========================================
// RUTAS DEL PANEL DE ADMINISTRACIÓN Y CRUD PRODUCTOS
// ==========================================
// Agrupamos todas las rutas admin bajo el middleware 'auth' para protegerlas
Route::middleware(['auth'])->group(function () {
    
    // Vistas principales del Panel
    Route::get('/admin', function () { return view('Admin.Admin'); });
    Route::get('/admin/usuarios', function () { return view('Admin.adminUsuarios'); });
    Route::get('/admin/categorias', function () { return view('Admin.adminCategorias'); });
    Route::get('/admin/consultas', function () { return view('Admin.adminConsultas'); });
    Route::get('/admin/pedidos', function () { return view('Admin.adminPedidos'); });

    // CRUD PRODUCTOS (Conectado al ProductoController)
    Route::get('/admin/productos', [ProductoController::class, 'index']); // Leer (Mostrar tabla)
    Route::post('/admin/productos', [ProductoController::class, 'store']); // Crear
    Route::put('/admin/productos/{id}', [ProductoController::class, 'update']); // Modificar (Faltaba la barra "/")
    Route::patch('/admin/productos/{id}/baja', [ProductoController::class, 'bajaLogica']); // Baja Lógica (Faltaba la barra "/")

});