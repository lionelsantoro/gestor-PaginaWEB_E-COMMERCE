<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EspecCelular extends Model
{
    protected $table = 'espec_celulares';
    
    // Configuración vital para indicar que la PK no es "id" ni autoincremental
    protected $primaryKey = 'idProducto';
    public $incrementing = false;
    protected $keyType = 'int';

    public $timestamps = false; // No necesitamos create/update aquí, lo maneja Producto

    protected $fillable = ['idProducto', 'ram', 'almacenamiento', 'pixeles', 'bateria'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idProducto');
    }
}