<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;

class KategoriController extends Controller
{
    public function index(){
        $kategori = Kategori::all();

        return view('admin.listkategori',compact('kategori'));
    }

    public function add(Request $req){
        $kategori = new kategori();
        $kategori->kategori = $req->kategori;
        $kategori->save();

        return redirect()->back();
    }
    public function delete($id){
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->back();
    }
    public function editview($id){
        $kategori = Kategori::findOrFail($id);

        return view('admin.editkategori',compact('kategori'));
    }
    public function edit(Request $req){
        $kategori = Kategori::findOrFail($req->id);

        $kategori->kategori = $req->kategori;
        $kategori->update();

        return redirect(url('kategori/view'));

    }
}
