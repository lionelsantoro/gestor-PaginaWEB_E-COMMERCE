<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CatalogoController;
use App\Http\Controllers\AuthController;     // NUEVO CONTROLADOR DE LOGIN/REGISTRO
use App\Http\Controllers\CarritoController;  // NUEVO CONTROLADOR DEL CARRITO

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
// RUTAS DEL PANEL DE ADMINISTRACIÓN
// ==========================================
Route::get('/admin', function () { return view('Admin.Admin'); });
Route::get('/admin/productos', function () { return view('Admin.adminProductos'); });
Route::get('/admin/usuarios', function () { return view('Admin.adminUsuarios'); });
Route::get('/admin/categorias', function () { return view('Admin.adminCategorias'); });
Route::get('/admin/consultas', function () { return view('Admin.adminConsultas'); });
Route::get('/admin/pedidos', function () { return view('Admin.adminPedidos'); });