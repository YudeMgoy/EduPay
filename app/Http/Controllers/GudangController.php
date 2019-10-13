<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
class GudangController extends Controller
{
    public function index(){
        $data = Transaksi::where('id_gudang',NULL)
                            ->get();
        return view('gudang.gudanglist',[
            'list'=>$data
        ]);
    }
}
