<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedido_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Pedido');
            $table->unsignedBigInteger('ID_Producto');
            $table->integer('cantidad');
            $table->decimal('precioUnitario', 12, 2);
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ID_Pedido')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('ID_Producto')->references('id')->on('productos')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedido_items');
    }
};