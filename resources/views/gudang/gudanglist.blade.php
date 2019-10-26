@extends('layouts.app')

@section('pesanan')
    active
@stop

@section('keranjang')
    active
@stop

@section('link')
    {{url('/')}}
@stop

@section('content')
<div class="container">
    <h4 class="title">
            Daftar Pesanan
    </h4>
    <div class="list-pesanan">
        @if (session()->has('status'))
            <div class="alert alert-success">
                <strong>Sukses!</strong> {{session('status')}}
            </div>                        
        @endif
        {{-- <div class="search-box">
            <form action="{{url('search/barang')}}" method="POST">
                @csrf
                <input type="text" name="search" placeholder="Cari pesanan">
                <button class="button">Search</button>                
            </form>
        </div> --}}
        @php
            $index =0;
        @endphp                    
        @foreach ($transaksis as $transaksi)        
            <div class="pesanan-box">                
                <div class="pesanan-header" onclick="showBody(<?php echo $index ?>)">
                    <h4>{{$transaksi->get_barang->name}} : {{$transaksi->id_transaksi}}</h4>
                    <i class="fa fa-caret-down"></i>
                    <span class="fa fa-caret-down"></span>
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
                                <p>{{number_format(($keranjang->get_barang->harga_barang-$keranjang->get_barang->diskon), 2, ',','.')}} ({{$keranjang->jumlah_barang}})</p>
                                @if ($transaksi->status == 1)
                                @if ($keranjang->jumlah_barang == 1)
                                 <a href="{{url('barang/kosong')}}/{{$keranjang->id}}" class="orange">Kosong</a>
                                @else
                                <div class="form modul" id="beli-modul">            
                                    <div class="layout" onclick="showModul()"></div>
                                    <form action="{{url('edit/stock')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_keranjang" value="{{$keranjang->id}}">
                                        <div class="form-title">
                                            <h4>edit</h4>
                                            <a class="x" href="#" onclick="showModul()" style="color: white !important;">X</a>
                                        </div>
                                        <div class="form-box cod">
                                            <label for="">Jumlah yang tersedia</label>
                                            <input type="number" name="jumlah_stock" id="">
                                        </div>
                                        <div class="form-box">
                                                <button class="button">Edit</button>
                                        </div>                
                                    </form>
                                </div>
                                <a href="#" class="orange" onclick="showModul()">edit</a>   
                                @endif
                                @else
                                @endif
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
                    <div class="status">
                        <p>WA : {{ $transaksi->no_wa }}</p>
                    </div>
                    <div class="status">
                        <p>Tempat : {{ $transaksi->alamat_kelas}}</p>
                    </div>                                        
                    <div class="status" style="margin-bottoM: 10px;">
                        <h6>Total Bayar</h6>
                        <h6>Rp {{number_format($transaksi->total_harga, 2, ',','.')}} </h6>                                                
                    </div>                   
                    @if ($transaksi->status == 1)
                        <a href="{{url('dikirim')}}/{{$transaksi->id}}" class="text-secondary">Kirim</a>   
                    @elseif ($transaksi->status ==3)
                        <a href="#" class="text-success">Selesai</a>   
                    @elseif($transaksi->status == 4)
                        <a href="{{url('dikemas')}}/{{$transaksi->id}}" class="text-danger">Hapus</a>
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
<script>
modul = document.getElementById("beli-modul");

function showModul(){
    modul.classList.toggle("modul-active");
}
</script>
@endsection