@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="title">
        Riwayat
    </h3>
    
    <div class="keranjang-container">            
        <div class="keranjang-box">     
            <a href="{{url('transaksi')}}">
                <div class="keranjang-body">                
                    <div class="full-box">
                        <h4 class="text-danger">Dibatalkan</h4>
                        <div class="bayar-box" style="margin-top: 5px;">
                            <p style="font-size: 0.9em">Total</p>
                            <p style="margin: auto !important;margin-right: 0 !important;font-size: 0.9em;">Rp 10.000<p>
                        </div>       
                        <p class="date">20 Mar 2019</p>                 
                    </div>                                        
                </div>
            </a>                   
        </div>

        <div class="keranjang-box">     
            <a href="{{url('transaksi')}}">
                <div class="keranjang-body">                
                    <div class="full-box">
                        <h4 class="text-primary">Dalam Perjalanan</h4>
                        <div class="bayar-box" style="margin-top: 5px;">
                            <p style="font-size: 0.9em">Total</p>
                            <p style="margin: auto !important;margin-right: 0 !important;font-size: 0.9em;">Rp 30.000<p>
                        </div>       
                        <p class="date">19 Jan 2019</p>                 
                    </div>                                        
                </div>
            </a>                   
        </div>

        <div class="keranjang-box">     
            <a href="{{url('transaksi')}}">
                <div class="keranjang-body">                
                    <div class="full-box">
                        <h4 class="text-success">Diterima</h4>
                        <div class="bayar-box" style="margin-top: 5px;">
                            <p style="font-size: 0.9em">Total</p>
                            <p style="margin: auto !important;margin-right: 0 !important;font-size: 0.9em;">Rp 10.000<p>
                        </div>       
                        <p class="date">20 Mar 2019</p>                 
                    </div>                                        
                </div>
            </a>                   
        </div>
    </div>      
</div>


@stop