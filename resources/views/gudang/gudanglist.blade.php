@extends('layouts.nonav')

@section('link')
    {{url('/')}}
@stop

@section('content')
<div class="container">
    <h4 class="title">
            Daftar Pesanan
    </h4>
    <div class="list-pesanan">
        <div class="search-box">
            <form action="{{url('search/barang')}}" method="POST">
                @csrf
                <input type="text" name="search" placeholder="Cari pesanan">
                <button class="button">Search</button>                
            </form>
        </div>
        @php
            $index =0;
        @endphp
                    @if (session()->has('status'))
                    <div class="alert alert-success">
                        <strong>Sukses!</strong> {{session('status')}}
                    </div>                        
                    @endif
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
                    <div class="status" style="margin-bottoM: 10px;">
                        <h6>Total Bayar</h6>
                        <h6>Rp {{number_format($transaksi->total_harga, 2, ',','.')}} </h6>                                                
                    </div>                    
                    @if ($transaksi->status == 1)
                        <a href="{{url('dikemas')}}/{{$transaksi->id}}" class="text-secondary">Kemas</a>   
                    @elseif($transaksi->status == 2)
                        <a href="{{url('dikirim')}}/{{$transaksi->id}}" class="text-primary">Kirim</a>
                    @else
                        <a href="{{url('dikirim')}}/{{$transaksi->id}}" class="text-danger">Hapus</a>
                    @endif
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