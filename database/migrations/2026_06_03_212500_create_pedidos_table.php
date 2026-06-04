<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Usuario');
            $table->decimal('total', 12, 2)->default(0);
            // Acá están tus 4 estados exactos del UML
            $table->enum('estado', ['creada', 'pendientePago', 'pagada', 'cancelada'])->default('creada');
            $table->string('direccion', 255)->nullable();
            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('ID_Usuario')->references('id')->on('usuarios')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};