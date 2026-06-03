<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\CatalogoController; // ¡ESTA ES LA LÍNEA QUE TE FALTABA!


Route::get('/', function () {
    return view('PaginaPrincipal');
});

Route::get('/quienes-somos', function () {
    return view('QuienesSomos');
});

Route::get('/comercializacion', function () {
    return view('Comercializacion');
});

Route::get('/informacion-de-contacto', function () {
    return view('InformacionDeContacto');
});

Route::post('/informacion-de-contacto', [ContactoController::class, 'procesar']);

Route::get('/terminos-y-usos', function () {
    return view('Terminos_Y_Usos');
});

/*  === RUTAS ANTIGUAS ESTÁTICAS (COMENTADAS) ===

Route::get('/catalogo/telefonos', function () {
    return view('catalogo.telefonos'); 
});

Route::get('/catalogo/telefonos/2', function () {
    return view('catalogo.telefonos2'); 
});

Route::get('/catalogo/computadoras', function () {
    return view('catalogo.computadoras');
});

Route::get('/catalogo/computadoras/2', function () {
    return view('catalogo.computadoras2');
});

Route::get('/catalogo/lavarropas', function () {
    return view('catalogo.lavarropas');
});

Route::get('/catalogo/lavarropas/2', function () {
    return view('catalogo.lavarropas2');
});

Route::get('/catalogo/heladeras', function () {
    return view('catalogo.heladeras');
});

Route::get('/catalogo/heladeras/2', function () {
    return view('catalogo.heladeras2');
});

*/

Route::post('/InformacionDeContacto', [ContactoController::class, 'procesar']);


Route::get('/login', function () {
    return view('formularios.Login');
});

Route::post('/login', [App\Http\Controllers\LoginController::class, 'procesar']);


Route::get('/registro', function () {
    return view('formularios.registro'); // Asegurate de que tu archivo se llame registro.blade.php
});

Route::post('/registro', [App\Http\Controllers\RegistroController::class, 'procesar']);

// Rutas del Panel de Administración
Route::get('/admin', function () { return view('Admin.Admin'); });
Route::get('/admin/productos', function () { return view('Admin.adminProductos'); });
Route::get('/admin/usuarios', function () { return view('Admin.adminUsuarios'); });
Route::get('/admin/categorias', function () { return view('Admin.adminCategorias'); });
Route::get('/admin/consultas', function () { return view('Admin.adminConsultas'); });
Route::get('/admin/pedidos', function () { return view('Admin.adminPedidos'); });


// ==========================================
// NUEVA RUTA DINÁMICA DEL CATÁLOGO
// ==========================================
Route::get('/catalogo', [CatalogoController::class, 'index'])->name('catalogo.index');