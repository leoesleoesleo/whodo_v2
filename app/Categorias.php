<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    protected $primaryKey = 'idCategoria';
    protected $fillable = [
        'nombreCategoria', 'activo',
    ];
}
