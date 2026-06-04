<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedidoItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pedido_items';

    protected $fillable = [
        'ID_Pedido', 'ID_Producto', 'cantidad', 'precioUnitario',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }
}