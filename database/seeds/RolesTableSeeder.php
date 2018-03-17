<?php

use Illuminate\Database\Seeder;
use Restaurante\Configuracion\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Administrador', 'Recepcion'];

        foreach ($roles as $key => $value) {
	        $role = new Role;
	        $role->name = $value;
	        $role->save();
        }
    }
}
