<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromosiController extends Controller
{
    public function index(){
        $banner = Promo::all();

        return view('admin.listpromo',compact('banner'));
    }
    public function add(Request $req){

        

    }
}
