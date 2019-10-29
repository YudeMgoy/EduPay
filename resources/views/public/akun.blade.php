@extends('layouts.app')

@section('akun')
    active
@stop

@section('title')
    Profile
@endsection
@section('content')
    <div class="top-container">
        <div class="img-box">
            <img src="{{asset(Auth::user()->img)}}" alt="" class="bg-image">
            <img src="{{asset(Auth::user()->img)}}" alt="">
        </div>

        <h4>{{Auth::user()->name}}</h4>
        <p><span STYLE="font-size: 0.8em;">ID : </span> {{Auth::user()->id_user}}</p>
        {{-- <p>ID: {{Auth::user()->id_user}}</p> --}}
    </div>

    <div class="bottom-container">
        @if (Auth::user()->role == 1)
        <div class="bottom-box">
            <a href="{{url('promosi')}}">Promo</a>       
        </div>
        <div class="bottom-box">
            <a href="{{url('kategori/view')}}">Kategori</a>       
        </div>
        <div class="bottom-box">
            <a href="#" onclick="showModul()">Top Up</a>       
        </div>
        @else
            @if (Auth::user()->role == 2)
        <div class="bottom-box">
            <a href="{{url('topup')}}">Saldo</a>
            <p>Rp.{{Auth::user()->saldo}}</p>
        </div>
        <div class="bottom-box">
            <a href="{{url('riwayat')}}">Pesanan</a>       
        </div> 
            @else
                
            @endif
        @endif
        <div class="bottom-box">
            <a href="{{url('pengaturan')}}">Pengaturan</a>            
        </div>
        <div class="bottom-box">
            <a class="orange" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <div class="form modul" id="beli-modul">            
        <div class="layout" onclick="showModul()"></div>
        <form action="{{url('topup/prosess')}}" method="POST">
            @csrf
            <div class="form-title">
                <h4>Top Up User!</h4>
                <a class="x" href="#" onclick="showModul()" style="color: white !important;">X</a>
            </div>

            <div class="form-box cod">
                <label for="">ID User</label>
                <input type="text" name="id" id="">
            </div>

            <div class="form-box cod">
                <label for="">Jumlah</label>
                <input type="number" name="nominal" id="">
            </div>
            <div class="form-box">
                    <button class="button">TOP UP</button>
            </div>                
        </form>
    </div>    

<script>
modul = document.getElementById("beli-modul");

function showModul(){
    modul.classList.toggle("modul-active");
}
</script>
<br>
@endsection