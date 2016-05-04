<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PasarKomoditi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasar', function (Blueprint $table) {
            $table->increments('id_pasar');
            $table->string('nama_pasar',200)->index()->unique();
        });
        Schema::create('komoditi', function (Blueprint $table) {
            $table->increments('id_komoditi');
            $table->integer('id_komoditi');
            $table->string('nama_komoditi',200)->index()->unique();
        });
        Schema::create('harga', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('harga');
            $table->date('tanggal')->index();
            $table->integer('id_komoditi');
            $table->integer('id_pasar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('komoditi');
        Schema::drop('pasar');
        Schema::drop('harga');
    }
}
