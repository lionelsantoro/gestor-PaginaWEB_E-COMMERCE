<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Usuario');
            $table->string('asunto');
            $table->text('mensaje');
            $table->enum('estado', ['leido', 'noLeido'])->default('noLeido');
            
            // Esto crea los campos 'created_at' y 'updated_at' (tu campo 'create' del diagrama)
            $table->timestamps(); 
            // Esto crea el campo 'deleted_at' (tu campo 'deleted' del diagrama para bajas lógicas)
            $table->softDeletes(); 

            // Llave foránea conectada a la tabla de usuarios
            $table->foreign('ID_Usuario')
                  ->references('id')
                  ->on('usuarios')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};