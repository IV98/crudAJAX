<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Datos extends Model
{
    protected $table = "tblDatos";

    protected $fillable = [
        'id',
        'nombre',
        'direccion',
        'edad',
        'ocupacion',
        'pasatiempo'
    ];
}
