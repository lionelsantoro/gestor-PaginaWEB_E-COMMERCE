<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\Categoria;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Limpiamos las tablas desactivando las claves foráneas temporalmente
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Producto::truncate();
        Categoria::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Llamamos a los seeders individuales en orden estricto
        $this->call([
            CategoriaSeeder::class,
            ProductoSeeder::class, // Producto debe ir después para encontrar las categorías
        ]);
    }
}