<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'stockBajo',
        'idCategoria',
        'urlImagen',
        'activo'
    ];

    // Relación: Pertenece a una Categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'idCategoria');
    }

    // Relaciones 1 a 1 con sus especificaciones
    public function especCelular() { return $this->hasOne(EspecCelular::class, 'idProducto'); }
    public function especComputadora() { return $this->hasOne(EspecComputadora::class, 'idProducto'); }
    public function especLavarropa() { return $this->hasOne(EspecLavarropa::class, 'idProducto'); }
    public function especHeladera() { return $this->hasOne(EspecHeladera::class, 'idProducto'); }
}