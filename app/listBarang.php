<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class listBarang extends Model
{
    //
    public function get_data(){
    	return $this->hasMany('\App\keranjang','id');
    }
    public function get_kategori(){
        return $this->belongsTo('\App\kategori','kategori');
    }
        
}
