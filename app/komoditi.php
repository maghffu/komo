<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class komoditi extends Model
{
    protected $table = 'komoditi';
    protected $fillable = ['id_komoditi','nama_komoditi'];
    public $timestamps = false;
    public function harga()
    {
    	return $this->hasMany('App\harga','id_komoditi','id_komoditi');
    }
	public function getHarga()
    {
    	return $this->hasOne('App\harga','id_komoditi','id_komoditi')->select('id_komoditi','harga');
    }

}
