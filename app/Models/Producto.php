<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'stock_bajo',
        'ID_categoria',
        'url_image',
        'activo',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'ID_categoria');
    }

    public function pedidoItems()
    {
        return $this->hasMany(PedidoItem::class, 'ID_Producto');
    }
}