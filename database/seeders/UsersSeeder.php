<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email'=>'computo@ite.edu.mx',
            'type'=>'admin',
            'password'=>bcrypt('prueba')
        ]);
        DB::table('users')->insert([
            'email'=>'desarrollo@ite.edu.mx',
            'type'=>'admin',
            'password'=>bcrypt('Tecnologgic0')
        ]);
    }
}
