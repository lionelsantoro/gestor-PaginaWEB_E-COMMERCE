<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\LoginController; 
use App\Http\Controllers\RegistroController;


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

Route::post('/InformacionDeContacto', [ContactoController::class, 'procesar']);


Route::get('/login', function () {
    return view('Login');
});

Route::post('/login', [App\Http\Controllers\LoginController::class, 'procesar']);


Route::get('/registro', function () {
    return view('registro'); // Asegurate de que tu archivo se llame registro.blade.php
});

Route::post('/registro', [App\Http\Controllers\RegistroController::class, 'procesar']);