<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
    	$role_admin->name = 'admin';
    	$role_admin->save();
    	$role_usuario = new Role();
    	$role_usuario->name = 'usuario';
    	$role_usuario->save();
    }
}
