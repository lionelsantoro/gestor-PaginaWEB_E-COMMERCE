<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCompleto', 150);
            $table->string('correo', 150)->unique();
            $table->string('contrasena', 255);
            $table->enum('rol', ['cliente', 'admin'])->default('cliente');
            $table->boolean('active')->default(true);
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};