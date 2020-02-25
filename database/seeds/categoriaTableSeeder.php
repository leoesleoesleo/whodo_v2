<?php

use Illuminate\Database\Seeder;
use App\Categorias;

class categoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categorias::create([
            'nombreCategoria' => 'Tecnología',
            'activo' => 1
        ]);

        Categorias::create([
            'nombreCategoria' => 'Alimentos',
            'activo' => 1
        ]);

        Categorias::create([
            'nombreCategoria' => 'Moda',
            'activo' => 1
        ]);
    }
}
