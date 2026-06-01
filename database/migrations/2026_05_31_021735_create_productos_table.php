<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void
{
    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre', 200);
        $table->text('descripcion')->nullable();
        $table->decimal('precio', 12, 2);
        $table->integer('stock')->default(0);
        $table->integer('stockBajo')->default(5);
        
        // Clave Foránea
        $table->unsignedBigInteger('idCategoria');
        $table->foreign('idCategoria')->references('id')->on('categorias')->onDelete('restrict');
        
        $table->string('urlImagen', 255)->nullable();
        $table->boolean('activo')->default(true);
        
        $table->timestamps();
        $table->softDeletes();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
