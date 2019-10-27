<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Promo;
use Auth;
class PromosiController extends Controller
{
    public function index(){
        $banner = Promo::all();

        return view('admin.listpromo',compact('banner'));
    }
    public function add(Request $req){
        $this->validate($req, [
            'banner' => 'required',
            'isi' => 'required',
            'judul' => 'required',
            'tanggal_berakhir' => 'required'
        ],[
            'Banner Harus Terisi',
            'isi Harus Terisi',
            'judul Harus Terisi',
            'tanggal_berakhir harus terisi'
        ]);
        

        $file = $req->file('banner');     
        $extension = $file->getClientOriginalExtension();          
        $newName = uniqid().'.'.$extension;
        $dir = "upload/img/";
        $upload = $file->move($dir, $newName);

        $promos = new Promo();
        $promos->cover = $dir.$newName;
        $promos->judul = $req->judul;
        $promos->user_id = Auth::user()->id;
        $promos->isi = $req->isi;
        $promos->kode_promo = $req->kode_promo;
        $promos->nominal_promo = $req->nominal;
        $promos->tanggal_berakhir = $req->tanggal_berakhir;
        $promos->save(); 

        return redirect()->back()->with('status','Berhasil Menambahkan Promosi');


    }
    public function show($id){
        $promo = Promo::findOrfail($id);

        return view('admin.editpromo',compact('promo'));
    }

    public function delete($id){

        $data = promo::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('status','Berhasil Hapus');
    }
    public function edit(Request $req){
        $promos = promo::findOrFail($req->id);
        if($req->file('banner')){
        $file = $req->file('banner');     
        $extension = $file->getClientOriginalExtension();          
        $newName = uniqid().'.'.$extension;
        $dir = "upload/img/";
        $upload = $file->move($dir, $newName);
        $promos->cover = $dir.$newName;
        }
        $promos->judul = $req->judul;
        $promos->user_id = Auth::user()->id;
        $promos->isi = $req->isi;
        $promos->kode_promo = $req->kode_promo;
        $promos->nominal_promo = $req->nominal;
        $promos->tanggal_berakhir = $req->tanggal_berakhir;
        $promos->save(); 

        return redirect(url('promosi'))->with('status','Berhasil edit Promosi');

    }
    public function detail($id){
        $data = promo::findOrFail($id);

        return view('public.detailpromo',[
            'data'=>$data
        ]);

    }
}

