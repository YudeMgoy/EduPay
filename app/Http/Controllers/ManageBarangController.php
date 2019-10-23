<?php

namespace App\Http\Controllers;
use App\listBarang;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\kategori;
use App\satuan;

class ManageBarangController extends Controller
{
    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : str_random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

    public function add(){
        $kategori = kategori::all();
        return view('management.add',[
            'collection' => $kategori
        ]);
    }
    public function index(){
        $data = kategori::all();
        $list = listBarang::all();
        $satuan = satuan::all();
        return view('admin.listbarang',[
            'barang' => $list,
            'kategori'=> $data,
            'satuan' => $satuan
        ]);
    }

    public function create(Request $req){
        $this->validate($req, [
            'img' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'satuan' => 'required'
        ],[
            'Gambar Harus Terisi',
            'Kategori Harus Terisi',
            'Harga Harus Terisi',
            'satuan harus terisi'
        ]);
        

        $file = $req->file('img');     
        $extension = $file->getClientOriginalExtension();          
        $newName = uniqid().'.'.$extension;
        $dir = "upload/img/";
        $upload = $file->move($dir, $newName);
        
        $list = new listBarang();
        $list->nama_barang = $req->nama;
        $list->kategori = $req->kategori;
        $list->img = $dir.$newName;
        $list->deskripsi = $req->des;
        $list->diskon = $req->diskon;
        $list->satuan = $req->satuan;
        $list->harga_barang = $req->harga;
        $list->save();
        session()->flash('status', 'Berhasil Insert Barang');
        return redirect()->back();
    }

    public function hapus($id){

        $data = listBarang::find($id);

        $data->delete();
        session()->flash('status', 'Barang berhasil di hapus');
        return redirect(url('view/all/barang'));
        
    }
    public function edit(Request $req){
        if ($req->img) {

        $this->validate($req, [
            'img' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
        ],[
            'Gambar Harus Terisi',
            'Kategori Harus Terisi',
            'Harga Harus Terisi',
        ]);

        $file = $req->file('img');     
        $extension = $file->getClientOriginalExtension();          
        $newName = uniqid().'.'.$extension;
        $dir = "upload/img/";
        $upload = $file->move($dir, $newName);
        
            $list = listBarang::find($req->id);
            $list->nama_barang = $req->nama;
            $list->kategori = $req->kategori;
            $list->img = $dir.$newName;
            $list->harga_barang = $req->harga;
            $list->diskon = $req->diskon;
            $list->deskripsi = $req->des;
            $list->satuan = $req->satuan;
            $list->update();
            session()->flash('status', 'Berhasil Update Barang');
            return redirect()->back();
        }
            $list = listBarang::find($req->id);
            $list->nama_barang = $req->nama;
            $list->kategori = $req->kategori;
            $list->harga_barang = $req->harga;
            $list->diskon = $req->diskon;
            $list->deskripsi = $req->des;
            $list->satuan = $req->satuan;
            $list->save();
            session()->flash('status', 'Berhasil Update Barang');
            return redirect()->back();
    }
    public function editview($id){
        $data = listBarang::find($id);
        $option = kategori::all();
        $satuan = satuan::all(); 
        return view('admin.edit',[
            'collection'=> $option,
            'data' => $data,
            'satuan' => $satuan
        ]);
    }
}
