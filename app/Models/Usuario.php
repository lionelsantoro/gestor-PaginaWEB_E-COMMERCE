<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // <-- IMPORTANTE
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'usuarios';

    protected $fillable = [
        'nombreCompleto', 'correo', 'contrasena', 'rol', 'active',
    ];

    // Ocultar contraseña al hacer consultas
    protected $hidden = [
        'contrasena',
    ];

    // Para que Laravel sepa qué campo es la contraseña
    public function getAuthPassword()
    {
        return $this->contrasena;
    }
}