<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
class GudangController extends Controller
{
    public function index(){
        $transaksis = Transaksi::where('id_gudang',NULL)
                            ->with('get_barang')
                            ->with('get_keranjang')
                            ->with('get_pay')
                            ->with('get_status')
                            ->get();
        
        return view('gudang.gudanglist',compact('transaksis'));        
    }

    public function dikemas(Request $req){


    }

    public function dikirim(){

    }
}
