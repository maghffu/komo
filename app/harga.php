<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class harga extends Model
{
	protected $table = 'harga';
    protected $fillable=['harga','tanggal','id_komoditi','id_pasar'];
    public $timestamps = false;
    public function komoditi()
    {
    	return $this->hasOne('App\komoditi','id_komoditi','id_komoditi');
    }
}