<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consulta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'consultas';

    protected $fillable = [
        'ID_Usuario',
        'asunto',
        'mensaje',
        'estado'
    ];

    // Relación: Una consulta pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'ID_Usuario');
    }
}