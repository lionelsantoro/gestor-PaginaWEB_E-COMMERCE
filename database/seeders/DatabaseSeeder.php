<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Usuario;
use App\Models\Pedido;
use App\Models\PedidoItem;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Limpiamos TODAS las tablas desactivando las claves foráneas temporalmente
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        PedidoItem::truncate();
        Pedido::truncate();
        Usuario::truncate();
        Producto::truncate();
        Categoria::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 2. Llamamos a los seeders individuales en orden estricto
        $this->call([
            UsuarioSeeder::class,   // Primero los usuarios
            CategoriaSeeder::class, // Luego las categorías
            ProductoSeeder::class,  // Finalmente los productos
        ]);
    }
}