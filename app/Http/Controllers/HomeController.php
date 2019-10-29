<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\listBarang;
use App\kategori;
use App\promo;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = listBarang::paginate(5);
        $kategori = kategori::all(); 
        $sembako = ListBarang::where('kategori',1)->paginate(5);
        $promos = promo::all();
        if (Auth::user()) {
            if(Auth::user()->role==1){
                return redirect('view/all/barang');
            }

            if(Auth::user()->role == 3){
                return redirect('gudang/list');
            }

            return view('home',[
                'list'=> $data,
                'sembako'=> $sembako,
                'kategori'=> $kategori,
                'promos'=> $promos
            ]);            
        } else {
            return view('auth.login');
        }
        
    }
    public function akun(){

        return view('public.akun');
    }
    public function logout(){
        Auth::logout();
        return view('auth.login');
    }

}
