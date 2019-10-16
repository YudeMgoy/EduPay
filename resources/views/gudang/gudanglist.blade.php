@extends('layouts.nonav')
@section('content')
<div class="container">
    <h4 class="title">
            Daftar Pesanan
    </h4>
    <div class="list-pesanan">
        @foreach ($transaksis as $transaksi)
            <div class="pesanan-box">
                <div class="pesanan-header">
                    <h4>Pembeli: {{$transaksi->get_barang->name}}</h4>
                </div>
                <div class="pesanan-body"> 
                    <p class="orange">List barang yang di beli <i class="fas fa-chevron-down"></i></p>
                    <div class="barang-list">
                        @foreach ($transaksi->get_keranjang as $keranjang)
                            <div class="barang-box">
                                <h4>{{ $keranjang->get_barang->nama_barang }}</h4>                                
                                <p>{{ $keranjang->get_barang->harga_barang }}/kg ({{ $keranjang->jumlah_barang }})</p>
                            </div>                                                        
                        @endforeach
                    </div>                                    
                </div>

                <div class="pesanan-footer">
                    <h6>Metode Bayar : {{ $transaksi->get_pay->pay }}</h6>                                        
                    <h6>Status : {{ $transaksi->get_status->status }}</h6>                                                                                
                    <h6>
                        Total Bayar :   {{$transaksi->total_harga}}
                    </h6>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection