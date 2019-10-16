<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    public function get_barang_data(){
    	return $this->hasMany('\App\listBarang','int');
    }
}
