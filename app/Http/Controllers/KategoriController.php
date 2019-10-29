<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\kategori;

class KategoriController extends Controller
{
    public function index(){
        $kategori = kategori::all();

        return view('admin.listkategori',compact('kategori'));
    }

    public function add(Request $req){
        $kategori = new kategori();
        $kategori->kategori = $req->kategori;
        $kategori->save();

        return redirect()->back();
    }
    public function delete($id){
        $kategori = kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->back();
    }
    public function editview($id){
        $kategori = kategori::findOrFail($id);

        return view('admin.editkategori',compact('kategori'));
    }
    public function edit(Request $req){
        $kategori = kategori::findOrFail($req->id);

        $kategori->kategori = $req->kategori;
        $kategori->update();

        return redirect(url('kategori/view'));

    }
}
