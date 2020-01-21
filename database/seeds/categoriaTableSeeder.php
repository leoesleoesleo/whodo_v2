<?php

use Illuminate\Database\Seeder;
use App\Categoria;

class categoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::create([
            'nombreCategoria' => 'Tecnología',
            'activo' => 1
        ]);

        Categoria::create([
            'nombreCategoria' => 'Alimentos',
            'activo' => 1
        ]);

        Categoria::create([
            'nombreCategoria' => 'Moda',
            'activo' => 1
        ]);
    }
}
