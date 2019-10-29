<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\satuan;

class SatuanController extends Controller
{
    public function index(){
        $satuan = satuan::all();

        return view('admin.listsatuan',compact('satuan'));
    }

    public function add(Request $req){
        $satuan = new satuan();
        $satuan->satuan = $req->satuan;
        $satuan->save();

        return redirect()->back();
    }
    public function delete($id){
        $satuan = satuan::findOrFail($id);
        $satuan->delete();

        return redirect()->back();
    }
    public function editview($id){
        $satuan = satuan::findOrFail($id);

        return view('admin.editsatuan',compact('satuan'));
    }
    public function edit(Request $req){
        $satuan = satuan::findOrFail($req->id);

        $satuan->satuan = $req->satuan;
        $satuan->update();

        return redirect(url('satuan/all'));

    }
}
