<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 200);
            $table->text('descripcion')->nullable();
            $table->decimal('precio', 12, 2);
            $table->integer('stock')->default(0);
            $table->integer('stock_bajo')->default(5);
            $table->unsignedBigInteger('ID_categoria'); 
            $table->string('url_image', 255)->nullable();
            $table->boolean('activo')->default(true);
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ID_categoria')
                  ->references('id')
                  ->on('categorias')
                  ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};