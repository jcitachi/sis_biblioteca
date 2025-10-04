<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    //
    protected $table = 'estudents';
    protected $fillable = [
        'codigo',
        'dni',
        'nombres',
        'apellidos',
        'carrera',
        'direccion',
        'telefono',
        'estado'
    ];
}
