<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pasar extends Model
{
	protected $table = 'pasar';
    protected $fillable=['nama_pasar'];
	public $timestamps = false;
	public function data_pasar()
    {
        return $this->hasMany('App\harga','id_pasar','id_pasar');
    }
}
