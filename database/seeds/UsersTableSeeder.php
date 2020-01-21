<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@whodo.com',
            'password' => Hash::make('admin'),
            'active' => 1,
            'esEmpresa' => 0
        ]);

        $user->assignRole('admin');
    }
}
