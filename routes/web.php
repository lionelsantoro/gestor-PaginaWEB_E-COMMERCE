<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/terminos-y-usos', function () {
    return view('Terminos_Y_Usos');
});