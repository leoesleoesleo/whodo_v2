<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sugerircategoria extends Model
{
    protected $primaryKey = 'idSugerirCategoria';
    protected $fillable = [
      'nombreCategoria'
    ];
}
