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
    Schema::create('espec_computadoras', function (Blueprint $table) {
        $table->unsignedBigInteger('idProducto')->primary();
        $table->string('ram', 50)->nullable();
        $table->string('almacenamiento', 100)->nullable();
        $table->string('procesador', 150)->nullable();
        $table->string('gpu', 150)->nullable();

        $table->foreign('idProducto')->references('id')->on('productos')->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('espec_computadoras');
    }
};
