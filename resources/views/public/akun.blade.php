@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('content')
    <div class="top-container">
        <div class="img-box">
            <img src="https://asset-a.grid.id/crop/0x0:0x0/700x465/photo/2019/02/01/3554994050.jpeg" alt="" class="bg-image">
            <img src="https://asset-a.grid.id/crop/0x0:0x0/700x465/photo/2019/02/01/3554994050.jpeg" alt="">
        </div>

        <h4>{{Auth::user()->name}}</h4>
        <p>{{Auth::user()->nis}}</p>
    </div>

    <div class="bottom-container">
        <div class="bottom-box">
            <a href="">Pengaturan</a>            
        </div>

        <div class="bottom-box">
            <a href="">Saldo</a>            
        </div>

        <div class="bottom-box">
            <a href="{{url('list/pesanan')}}">Pesanan</a>       
        </div>

        <div class="bottom-box">
            <a href="{{url('list/pesanan')}}">Promo</a>       
        </div>

        <div class="bottom-box">
            <a class="orange" href="{{url('logout')}}">Keluar</a>
        </div>
    </div>

<br>
@endsection