<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController extends Controller
{
     public function procesar(Request $request) { 
   
        return view('exitoRegistro'); 
    } 
}
