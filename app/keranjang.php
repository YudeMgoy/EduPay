<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keranjang extends Model
{
    //
public function get_barang(){
   	return $this->belongsto('\App\listBarang','id_barang');
   }
public function get_list(){
   	return $this->hasmany('\App\Transaksi','transaksi_id');
}
}
