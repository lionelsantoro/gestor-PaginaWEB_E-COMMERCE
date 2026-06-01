<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EspecLavarropa extends Model
{
    protected $table = 'espec_lavarropas';
    protected $primaryKey = 'idProducto';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = ['idProducto', 'capacidadKg', 'programas', 'tipoCarga'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
}