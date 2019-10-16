<?php

namespace App\Http\Controllers;
use App\listBarang;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\kategori;

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
        $list = listBarang::all();
        return view('admin.listbarang',[
            'barang' => $list
        ]);
    }
    public function create(Request $req){
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
        
        $list = new listBarang();
        $list->nama_barang = $req->nama;
        $list->kategori = $req->kategori;
        $list->img = $dir.$newName;
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
            // Get image file
            $image = $req->img;
            // Make a image name based on user name and current timestamp
            $name = str_slug($req->nama).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);

            $list = listBarang::find($req->id);
            $list->nama_barang = $req->nama;
            $list->kategori = $req->kategori;
            $list->img = $filePath;
            $list->harga_barang = $req->harga;
            $list->update();
            session()->flash('status', 'Berhasil Update Barang');
            return redirect()->back();
        }
            $list = listBarang::find($req->id);
            $list->nama_barang = $req->nama;
            $list->kategori = $req->kategori;
            $list->harga_barang = $req->harga;
            $list->save();
            session()->flash('status', 'Berhasil Update Barang');
            return redirect()->back();
    }
    public function editview($id){
        $data = listBarang::find($id);
        $option = kategori::all(); 
        return view('admin.edit',[
            'collection'=> $option,
            'data' => $data
        ]);
    }
}
