<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoriaproducto extends Model
{
    protected $primaryKey = 'idCategoriaProducto';
    protected $fillable = [
      'idCategoria', 'idProducto'
    ];
}
