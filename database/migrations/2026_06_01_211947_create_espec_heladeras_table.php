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
    Schema::create('espec_heladeras', function (Blueprint $table) {
        $table->unsignedBigInteger('idProducto')->primary();
        $table->integer('capacidadLitros')->nullable();
        $table->boolean('noFrost')->nullable();
        $table->string('consumoEnergetico', 50)->nullable();

        $table->foreign('idProducto')->references('id')->on('productos')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('espec_heladeras');
    }
};
