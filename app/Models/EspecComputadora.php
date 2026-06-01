<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EspecComputadora extends Model
{
    protected $table = 'espec_computadoras';
    protected $primaryKey = 'idProducto';
    public $incrementing = false;
    protected $keyType = 'int';
    public $timestamps = false;

    protected $fillable = ['idProducto', 'ram', 'almacenamiento', 'procesador', 'gpu'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
}