<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    public function get_barang_data(){
    	return $this->hasMany('\App\listBarang','kategori');
    }
}
