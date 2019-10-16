@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('content')
    <div class="top-container">
        <div class="img-box">
            <img src="https://s1.buzzwav.com/2019/06/Chloe/05.jpg" alt="" class="bg-image">
            <img src="https://s1.buzzwav.com/2019/06/Chloe/05.jpg" alt="">
        </div>

        <h4>{{Auth::user()->name}}</h4>
        <p>NIS/ID: {{Auth::user()->nis}}</p>
        {{-- <p>ID: {{Auth::user()->id_user}}</p> --}}
    </div>

    <div class="bottom-container">
        @if (Auth::user()->role == 1)
        <div class="bottom-box">
            <a href="{{url('list/pesanan')}}">Promo</a>       
        </div>
        @else
            @if (Auth::user()->role == 2)
        <div class="bottom-box">
            <a href="">Saldo</a>
            <p>Rp.{{Auth::user()->saldo}}</p>
        </div>
        <div class="bottom-box">
            <a href="{{url('list/pesanan')}}">Pesanan</a>       
        </div> 
            @else
                
            @endif
        @endif
        <div class="bottom-box">
            <a href="">Pengaturan</a>            
        </div>
        <div class="bottom-box">
            <a class="orange" href="{{url('logout')}}">Keluar</a>
        </div>
    </div>

<br>
@endsection