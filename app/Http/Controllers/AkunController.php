<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;
class AkunController extends Controller
{
    public function ganti_profil(Request $req){
        if ($req->img) {
        $this->validate($req, [
            'img' => 'required',
        ],[
            'Gambar Harus Terisi',
        ]);
        $file = $req->file('img');     
        $extension = $file->getClientOriginalExtension();          
        $newName = uniqid().'.'.$extension;
        $dir = "upload/img/";
        $upload = $file->move($dir, $newName);


        $user = Auth::user();
        $user->img = $dir.$newName;
        $user->save();

            session()->flash('status', 'Berhasil ganti foto profil');
        return redirect()->back();
        }
        $user = Auth::user();
        $user->img = $req->img;
        $user->save();
    }
    public function changePassword(Request $request){
        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Password lama Tidak sesuai");
        }

        if(strcmp($request->get('old_password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Jangan Pakai Password yang Sama");
        }

        $this->validate($request, [
            'old_password'     => 'required',
            'new_password'     => 'required|min:6',
            'confirm_password' => 'required|same:new_password',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        return redirect()->back()->with("status","Password changed successfully !");

    }

    public function gantiNama(Request $req){
        $this->validate($req,[
            'new_name' => 'required',
        ],[
            'Nama Tidak Boleh Kosong'
        ]);
        $user = Auth::user();
        $user->name = $req->new_name;
        $user->save();
        session()->flash('status', 'Berhasil ganti Nama');
        return redirect()->back();
    }
}
