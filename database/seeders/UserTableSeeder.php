<?php

namespace Database\Seeders;

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'doc')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User;
        $user->name = 'Desarrollo Académico';
        $user->email = 'computo@ite.edu.mx';
        $user->password = bcrypt('prueba');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User;
        $user->name = 'Ricardo Castro';
        $user->email = 'rcastro@ite.edu.mx';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
