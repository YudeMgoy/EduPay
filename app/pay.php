<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pay extends Model
{
    public function get_pay_data(){

    	return $this->belongsTo('\App\Transaksi','int');
    }
}
