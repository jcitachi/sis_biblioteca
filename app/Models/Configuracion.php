<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    //
    protected $table = 'configuracions';
    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'correo',
        'logo'];
}
