<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
	public function get_barang(){
   		return $this->belongsto('\App\User','pembeli_id');
	}
	public function get_keranjang(){
    	return $this->hasMany('\App\Keranjang','transaksi_id');
	}
}
