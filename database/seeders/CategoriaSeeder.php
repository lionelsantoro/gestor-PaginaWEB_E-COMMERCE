<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        Categoria::create(['nombre' => 'Teléfonos', 'activo' => true]);
        Categoria::create(['nombre' => 'Computadoras', 'activo' => true]);
        Categoria::create(['nombre' => 'Lavarropas', 'activo' => true]);
        Categoria::create(['nombre' => 'Heladeras', 'activo' => true]);
    }
}