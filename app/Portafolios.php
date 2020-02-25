<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portafolios extends Model
{
    protected $primaryKey = 'idPortafolio';
    protected $fillable = [
        'portafolio', 'activo', 'idUser', 'idCategoria'
    ];
}
