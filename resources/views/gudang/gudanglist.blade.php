@extends('layouts.nonav')
@section('content')
<div class="container">
    <h4 class="title">
            Daftar Pesanan
    </h4>
    <div class="list-pesanan">
        @php
            $index =0;
        @endphp
        @foreach ($transaksis as $transaksi)        
            <div class="pesanan-box">
                <div class="pesanan-header" onclick="showBody(<?php echo $index ?>)">
                    <h4>{{$transaksi->get_barang->name}}</h4>
                    <i class="fa fa-caret-down"></i>
                </div>
                <div class="pesanan-body">                     
                    <div class="barang-pesanan-list">
                        {{-- @foreach ($transaksi->get_keranjang as $keranjang)
                            <div class="barang-box">
                                <h4>{{ $keranjang->get_barang->nama_barang }}</h4>                                
                                <p>{{ $keranjang->get_barang->harga_barang }}/kg ({{ $keranjang->jumlah_barang }})</p>
                            </div>                                                        
                        @endforeach --}}
                        @foreach ($transaksi->get_keranjang as $keranjang)
                        <div class="barang-pesanan-box">
                            <h4>{{$keranjang->get_barang->nama_barang}}</h4>
                            <div class="bottom">
                                <p>{{number_format($keranjang->get_barang->harga_barang, 2, ',','.')}} ({{$keranjang->jumlah_barang}})</p>
                                <a href="#" class="orange">Kosong</a>
                            </div>                                                            
                        </div>
                        @endforeach
                    </div>                                    
                </div>

                <div class="pesanan-footer">
                    <div class="status">
                        <p>Metode : {{ $transaksi->get_pay->pay }}</p>
                        <p class="{{$transaksi->get_status->style}}">{{ $transaksi->get_status->status }}</p>
                    </div>                    
                    <div class="bayar">
                        <h6>Total Bayar :  </h6>
                        <h6>Rp {{number_format($transaksi->total_harga, 2, ',','.')}} </h6>
                    </div>                    
                </div>
            </div>
            @php
                $index++;
            @endphp
        @endforeach
    </div>
</div>

<script>
    bodies = document.getElementsByClassName("pesanan-body");

    function showBody(index){        
        bodies[index].classList.toggle('pesanan-body-active');
    }
</script>
@endsection