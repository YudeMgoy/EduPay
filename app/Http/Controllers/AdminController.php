<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\keranjang;


class AdminController extends Controller
{
    public function index(){

        $kerangjang = keranjang::all();
        return view('admin.listbarang');
    }
}
