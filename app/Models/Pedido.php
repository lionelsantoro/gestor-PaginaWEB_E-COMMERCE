<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pedidos';

    protected $fillable = [
        'ID_Usuario', 'total', 'estado', 'direccion',
    ];

    public function items()
    {
        return $this->hasMany(PedidoItem::class, 'ID_Pedido');
    }
}