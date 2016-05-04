<?php

use Illuminate\Database\Seeder;

class user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
         	'name' => 'Admin Pusat',
         	'email' => 'adminpusat',
         	'password' => bcrypt('12345678')
        ]);
        DB::table('users')->insert([
         	'name' => 'Admin Limpung',
         	'email' => 'limpung',
         	'id_pasar' => 1,
         	'password' => bcrypt('limpung')
        ]);
        DB::table('users')->insert([
         	'name' => 'Admin Batang',
         	'email' => 'batang',
         	'id_pasar' => 3,
         	'password' => bcrypt('batang')
        ]);
        DB::table('users')->insert([
         	'name' => 'Admin Bandar',
         	'email' => 'bandar',
         	'id_pasar' => 2,
         	'password' => bcrypt('bandar')
        ]);
    }
}