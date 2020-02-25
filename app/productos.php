<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productos extends Model
{
    protected $primaryKey = 'idProducto';
    protected $fillable = [
      'nombre', 'referencia', 'precio', 'cantidad', 'codigoBarras', 'activo', 'fechaVencimiento', 'nombrePortafolio'
    ];
}
