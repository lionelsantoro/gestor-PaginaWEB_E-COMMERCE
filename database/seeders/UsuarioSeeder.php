<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::create([
            'nombreCompleto' => 'lucia salazar',
            'correo' => 'lucy@gmail.com',
            'contrasena' => Hash::make('admin123'),
            'rol' => 'admin',
            'active' => true
        ]);

        Usuario::create([
            'nombreCompleto' => 'jose',
            'correo' => 'jose@gmail.com',
            'contrasena' => Hash::make('cliente123'),
            'rol' => 'cliente',
            'active' => true
        ]);

         Usuario::create([
            'nombreCompleto' => 'Martin',
            'correo' => 'Martin@gmail.com',
            'contrasena' => Hash::make('cliente1234'),
            'rol' => 'cliente',
            'active' => true
        ]);

        Usuario::create([
            'nombreCompleto' => 'juana',
            'correo' => 'juana@gmail.com',
            'contrasena' => Hash::make('cliente12345'),
            'rol' => 'cliente',
            'active' => true
        ]);
    }
}