<?php

use Illuminate\Database\Seeder;
use Restaurante\Configuracion\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->role_id = 1;
        $user->name = 'Administrador';
        $user->username = 'admin';
        $user->lastname = 'Sistema';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('admin');
        $user->save();
    }
}
