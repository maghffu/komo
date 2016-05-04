<?php

use Illuminate\Database\Seeder;

class pasarseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pasar')->insert([
         	'nama_pasar' => 'Batang'
        ]);

        DB::table('pasar')->insert([
         	'nama_pasar' => 'Limpung'
        ]);

        DB::table('pasar')->insert([
         	'nama_pasar' => 'Bandar'
        ]);
    }
}
