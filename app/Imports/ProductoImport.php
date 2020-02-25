<?php

namespace App\Imports;

use App\productos;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new productos([
            'nombre' => $row[0],
            'precio' => $row[1],
            'nombrePortafolio' => $row[2]
        ]);
    }
}
