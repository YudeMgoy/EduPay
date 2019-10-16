<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\listBarang;

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
        $sembako = ListBarang::where('kategori',1)->paginate(5);
        if (Auth::user()) {
            return view('home',[
                'list'=> $data,
                'sembako'=> $sembako
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
