@extends('layouts.nonav')

@section('content')
    <div class="container-top-up">
        <h5>
            Yukk pergi ke EDU Mart untuk top up saldo!
        </h5>
        <p>Ini nih syaratnya : </p>
        <ul>
            <li>Minimal top up Rp 10.000,00</li>
            <li>Datang ke Edu Mart dan bilang ke kasir</li>
            <li>Tunjukin ID User kalian</li>                        
            <li>Cek apakah saldo sudah bertambah</li>
            <li>Pastikan pakai duit punya kalian sendiri</li>            
        </ul>

        <img src="{{asset('img/topupbg.png')}}" alt="" class="top-up-bg">
    </div>    
@stop