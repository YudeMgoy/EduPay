<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaksi;
use Auth;
use Carbon\Carbon;
class GudangController extends Controller
{
    public function index(){
        if (Auth::user()->role == 4) {
            $transaksis = transaksi::where('status',1)
                        ->orderBy('created_at', 'DESC')
                        ->get();
            
            return view('gudang.gudanglist',compact('transaksis'));
        } else {
        $transaksis = transaksi::where('id_gudang',NULL)
                            ->whereDate('created_at', '=', Carbon::today()->toDateString())
                            // ->orwhere('status',1)
                            // ->orwhere('status',2)
                            // ->orwhere('status',3)
                            // ->orwhere('status',4)
                            ->where(function ($query) {
                                $query->where('status',1)
                            ->orwhere('status',2)
                            ->orwhere('status',3)
                            ->orwhere('status',4);
                             })
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

        $data = transaksi::find($id);
        $data->status = 1;
        $data->id_gudang = Auth::user()->id;

        $data->save();
        return redirect()->back();
    }

    public function dikirim($id){

        $data = transaksi::find($id);
        $data->status = 2;

        $data->save();
        session()->flash('status', 'Silahkan Antar Barang');
        return redirect()->back();

    }
    public function cencel(){
        $data = transaksi::find($id);
        $data->delete();
        session()->flash('status', 'Pesanan di Hapus');
        return redirect()->back();
    }
}
