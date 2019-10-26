<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use Auth;
class GudangController extends Controller
{
    public function index(){
        if (Auth::user()->role == 4) {
            $transaksis = Transaksi::where('status',1)
                        ->orderBy('created_at', 'DESC')
                        ->get();
            
            return view('gudang.gudanglist',compact('transaksis'));
        } else {
        $transaksis = Transaksi::where('id_gudang',NULL)
                            ->where('status',1)
                            ->orwhere('status',2)
                            ->orwhere('status',3)
                            ->orwhere('status',4)
                            ->with('get_barang')
                            ->with('get_keranjang')
                            ->with('get_pay')
                            ->with('get_status')
                            ->orderBy('created_at', 'DESC')
                            ->get();
        
        return view('gudang.gudanglist',compact('transaksis'));  
        }
        
    }

    public function dikemas($id){

        $data = Transaksi::find($id);
        $data->status = 1;
        $data->id_gudang = Auth::user()->id;

        $data->save();
        return redirect()->back();
    }

    public function dikirim($id){

        $data = Transaksi::find($id);
        $data->status = 2;

        $data->save();
        session()->flash('status', 'Silahkan Antar Barang');
        return redirect()->back();

    }
    public function cencel(){
        $data = Transaksi::find($id);
        $data->delete();
        session()->flash('status', 'Pesanan di Hapus');
        return redirect()->back();
    }
}
