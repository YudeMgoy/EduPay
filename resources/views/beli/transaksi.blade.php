@extends('layouts.nonav')

@section('link')
    {{url('riwayat')}}
@stop

@section('content')
<nav class="bottom-nav">
    <div class="nav-list">
        <div class="nav-box biaya">
            <h4>Total Rp 100.000,00</h4>            
        </div>                
        <a href="#" class="beli-button button">CANCEL</a>        
    </div>
</nav>
<div class="container">
    <h3 class="title">
        Transaksi
    </h3>
    <div class="keranjang-container">    
        <div class="keranjang-box">            
            <div class="keranjang-body">
                <div class="img-box">
                    <img src="{{asset('upload/img/5da64f7da4994.png')}}" alt="">
                </div>
                <div class="right-box">
                    <h4>Mobil</h4>
                    <div class="bayar-box" style="margin-top: 5px;">
                        <p style="font-size: 0.9em">Harga</p>
                        <p style="margin: auto !important;margin-right: 0 !important;font-size: 0.9em;">Rp 100.000,00<p>
                    </div>                        
                </div>                                        
            </div>
        </div>  
    </div>  
</div>
@endsection
