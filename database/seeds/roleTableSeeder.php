<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class roleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create(['name' => 'admin']);
        $proveedor = Role::create(['name' => 'proveedor']);
        $usuario = Role::create(['name' => 'usuario']);
    }
}
