<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\keranjang;
use App\listbarang;
use App\transaksi;
use App\user;

class KosongController extends Controller
{
    public function kosong($id){
        $keranjang = keranjang::find($id);
        $transaksi = transaksi::findOrFail($keranjang->transaksi_id);
        if($keranjang->jumlah_barang <= 1){
            $transaksi->total_harga -= ($keranjang->get_barang->harga_barang - $keranjang->get_barang->diskon);
            if($transaksi->paymen == 1){
                $user = user::find($transaksi->pembeli_id);
                $user->saldo += ($keranjang->get_barang->harga_barang - $keranjang->get_barang->diskon);
                $user->save();
            }
            if($transaksi->total_harga == 0){
                $transaksi->status = 4;
                $keranjang->delete();
                $transaksi->save();
                return redirect()->back();
            }
            $transaksi->save();
            $keranjang->delete();
            return redirect()->back();
        }
    }

    public function edit(Request $req){
        $keranjang = Keranjang::find($req->id_keranjang);
        $barang = listBarang::find($keranjang->id_barang);
        $transaksi = transaksi::find($keranjang->transaksi_id);
        if($req->jumlah_stock == 0){
            $transaksi->total_harga -= ($barang->harga_barang - $barang->diskon) * ( $keranjang->jumlah_barang - $req->jumlah_stock);
            if($transaksi->paymen == 1){
                $user = user::find($transaksi->pembeli_id);
                $user->saldo += ($barang->harga_barang - $barang->diskon) * ( $keranjang->jumlah_barang - $req->jumlah_stock);
                $user->save();
            }
            if($transaksi->total_harga == 0){
                $transaksi->status = 4;
                $keranjang->delete();
                $transaksi->save();
                return redirect()->back();
            }
            $transaksi->save();
            $keranjang->delete();
            return redirect()->back();
        }
        if($transaksi->paymen == 1){
            $user = User::find($transaksi->pembeli_id);
            $user->saldo += ($barang->harga_barang - $barang->diskon) * ( $keranjang->jumlah_barang - $req->jumlah_stock);
            $user->save(); 
        }
        $transaksi->total_harga -= ($barang->harga_barang - $barang->diskon) * ( $keranjang->jumlah_barang - $req->jumlah_stock);
        $transaksi->save();
        $keranjang->jumlah_barang = $req->jumlah_stock;
        $keranjang->harga_barang = ($barang->harga_barang - $barang->diskon) * $req->jumlah_stock;
        session()->flash('status', 'Troli Berhasil Di edit');
        $keranjang->save();
        return redirect()->back();
    }
}
