<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\keranjang;
use Auth;
use App\listBarang;
use App\Transaksi;
use App\User;
use App\pay;


class BeliController extends Controller
{

    public function listBarang(){
        $keranjang = Keranjang::where('transaksi_id', NULL)
                                ->where('pembeli_id', Auth::user()->id)
                                ->get();
        $list = ListBarang::all();

        return view('beli.listbarang', [
            'keranjangs' => $keranjang,
            'lists' => $list,
        ]);
    }
    public function MasukanBarang(Request $req, $id)
    {
        $this->validate($req, [
            'jumlah_barang' => 'required|min:1'
        ]);

        $barang = listBarang::find($req->id);
        $check = Keranjang::where('id_barang', $barang->id)
                            ->where('pembeli_id',Auth::user()->id)
                            ->where('transaksi_id', NULL)
                            ->get();
        if(count($check)>0)
        {
            $keranjang = Keranjang::where('id_barang', $barang->id)
                                ->where('pembeli_id',Auth::user()->id)
                                ->first();
            $keranjang->jumlah_barang += $req->jumlah_barang;
            $keranjang->harga_barang += $req->jumlah_barang * $barang->harga_barang;
            session()->flash('status', 'Berhasil Menambahkan Barang ke keranjang');            
            $keranjang->update();
        }
        else{
            $keranjang = new Keranjang;
            $keranjang->id_barang = $barang->id;
            $keranjang->jumlah_barang = $req->jumlah_barang;
            $keranjang->harga_barang = $barang->harga_barang * $req->jumlah_barang;            
            $keranjang->pembeli_id = Auth::user()->id;
            session()->flash('status', 'Berhasil Menambahkan Barang ke keranjang'); 
            $keranjang->save();
        }        

        return redirect('keranjang');
    }
    public function EditKeranjang(Request $req){
        if($req->jumlah_barang == 0){
            session()->flash('error', 'Kalau Beli minimal 1 LOL');
            return redirect(url('keranjang'));
        }
        $keranjang = Keranjang::find($req->id);
        $barang = listBarang::find($keranjang->id_barang);
        $keranjang->jumlah_barang = $req->jumlah_barang;
        $keranjang->harga_barang = $barang->harga_barang * $req->jumlah_barang; 
        session()->flash('status', 'Troli Berhasil Di edit'); 
        $keranjang->save();

        return redirect(url('keranjang'));

    }
    public function CancelBeli(){

        Keranjang::where('pembeli_id', Auth::user()->id)
                ->where('transaksi_id', NULL)
                ->delete();

        return redirect(url('list/barang'));  
    }

    public function DeleteListBarang($id)
    {
        session()->flash('status', 'Barang Di Hapus');
        $all = Keranjang::find($id);
        $all->delete();
        return redirect(url('keranjang'));
    }

    public function Prosess(Request $req)
    { 
        $length = 5;
        $randstring = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);

        $keranjangs = Keranjang::where('pembeli_id', Auth()->user()->id)
                                ->where('transaksi_id', NULL)
                                ->get();
        $total_harga = 0;
        
        for ($i=0;$i<count($keranjangs);$i++)
        {
            $total_harga += $keranjangs[$i]->harga_barang;           
        }
        // CLEAR TRANSAKSI CACHE
        // Transaksi::where('id_gudang', NULL)
        //         ->delete();
        if($req->pay == 1){
            if(Auth::user()->saldo < $total_harga){
                session()->flash('error', 'Saldo Anda Tidak Cukup');
                return redirect()->back();
            }
            else{
                $pembeli = Auth::user();
                $pembeli->saldo -= $total_harga;
                $pembeli->save();
                $transaksi = new Transaksi;
                $transaksi->pembeli_id = Auth::user()->id;
                $transaksi->paymen = $req->pay;
                $transaksi->alamat_kelas = "Tempat COD";
                $transaksi->status = 4;
                $transaksi->no_wa = $req->no_wa;
                $transaksi->id_transaksi =  $randstring;     
                $transaksi->total_harga = $total_harga;
                $transaksi->save();
                $transaksi2 = Transaksi::where('pembeli_id', Auth::user()->id)
                                        ->orderBy('id', 'DESC')->first();
                for ($i=0;$i<count($keranjangs);$i++)
                {            
                    $keranjangs[$i]->transaksi_id = $transaksi2->id;
                    $keranjangs[$i]->save();
                }
            }
        }
        else{

                $transaksi = new Transaksi;
                $transaksi->pembeli_id = Auth::user()->id;
                $transaksi->paymen = $req->pay;
                $transaksi->alamat_kelas = $req->alamat_kelas;
                $transaksi->status = 4;
                $transaksi->no_wa = $req->no_wa;
                $transaksi->id_transaksi =  $randstring;     
                $transaksi->total_harga = $total_harga;
                $transaksi->save();
                $transaksi2 = Transaksi::where('pembeli_id', Auth::user()->id)
                                        ->orderBy('id', 'DESC')->first();
                for ($i=0;$i<count($keranjangs);$i++)
                {            
                    $keranjangs[$i]->transaksi_id = $transaksi2->id;
                    $keranjangs[$i]->save();
                }
        }
        $data = [
            'barang' => $keranjangs,
            'transaksi' => $transaksi2
        ];
        $file = 'img/qr.png';        
        // \QRCode::text("$transaksi2->id")->setOutfile($file)->png();

        // return view('pages.qrcode', [
        //     'qrfile' => $file
        // ]);
        return redirect(url('list/pesanan'));
    }
    public function IsiKeranjang(){
        $bayar = pay::all();
        $keranjang = Keranjang::where('pembeli_id',Auth::user()->id)
                                ->where('transaksi_id',NULL)
                                ->get();
        $total_harga = 0;
        
        for ($i=0;$i<count($keranjang);$i++)
        {
            $total_harga += $keranjang[$i]->harga_barang;           
        }
        return view('beli.keranjang',[
            'item' => $keranjang,
            'pay' => $bayar,
            'harga' =>$total_harga
        ]);
    }
    public function listPesan(){
        $data = Transaksi::where('pembeli_id',Auth::user()->id)->get();

        
        return view('beli.pesanan',[
            'pesanan' => $data
        ]);
    }
    public function detailprosess($id){
        $data = Transaksi::find($id);

        return view('beli.detail_pesanan',[
            'detail'=> $data
        ]);
    }

    public function detailBarang($id){
        $barang = listBarang::find($id);        
        return view('barang.detailbarang', compact('barang'));
    }
    
}
