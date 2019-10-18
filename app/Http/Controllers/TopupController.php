<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopupController extends Controller
{
    public function topup(){

        return view('admin.Topup');

    }

    public function prosess(Request $req){
                $this->validate($req, [
                    'id' => 'required'
        ],[
            'Id tidak boleh kosong',
        ]);
        if($req->nominal < 10000){
            session()->flash('error','TopUp Minimal Rp 10.000,00' );
        return redirect()->back();
        }
        else{
            $user = User::where('id_user',$req->id)->first();
            $user->saldo += $req->nominal;
            $user->save();
            $nominal = $req->nominal;
            session()->flash('status','TopUp berhasil Sebesar Rp.'.$nominal );
            return redirect()->back();
        }
    }
}
