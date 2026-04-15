<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function procesar(Request $request) { 
   
        return view('exitoLogin'); 
    } 
}