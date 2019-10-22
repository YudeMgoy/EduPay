@extends('layouts.nonav')

@section('link')
    {{url('riwayat')}}
@stop

@section('content')
<nav class="bottom-nav">
    <div class="nav-list">
        <div class="nav-box biaya">
            <h4>Total Rp {{$detail->total_harga}},00</h4>            
        </div>
        @if ($detail->status == 2 || $detail->status == 1)
            <a href="{{url('terima/barang')}}/{{$detail->id}}" class="beli-button button">Terima</a>
            <a href="{{url('batal/beli')}}/{{$detail->id}}" class="beli-button button">Batal</a>
        @elseif($detail->status == 4 || $detail->status == 3)        
            <a href="#" class="beli-button button" disabled>Hapus</a>       
        @endif        
    </div>
</nav>
<div class="container">
    <h3 class="title">
        Transaksi
    </h3>
    <div class="keranjang-container">
        @foreach ($detail->get_keranjang as $data)
        <div class="keranjang-box">            
            <div class="keranjang-body">
                <div class="img-box">
                    <img src="{{asset($data->get_barang->img)}}" alt="">
                </div>
                <div class="right-box">
                    <h4>{{$data->get_barang->nama_barang}} x ({{$data->jumlah_barang}})</h4>
                    <div class="bayar-box" style="margin-top: 5px;">
                        <p style="font-size: 0.9em">Harga</p>
                        <p style="margin: auto !important;margin-right: 0 !important;font-size: 0.9em;">Rp {{$data->get_barang->harga_barang - $data->get_barang->diskon}},00<p>
                    </div>                        
                </div>                                        
            </div>
        </div> 
        @endforeach     
    </div>  
</div>
@endsection