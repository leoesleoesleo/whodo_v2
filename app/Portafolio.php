<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portafolio extends Model
{
    protected $primaryKey = 'idPortafolio';
    protected $fillable = [
        'portafolio', 'activo', 'idUser', 'idCategoria'
    ];
}
