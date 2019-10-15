@extends('layouts.new')
@section('content')
<h2>Detail Pesanan
</h2>
<div class="card">
    <div class="card-header">
        Pesanan {{$detail->status}}
    </div>
    <div class="card-body">
            <div class="barang">
                <h6>List barang yang di beli</h6>
                @foreach ($detail->get_keranjang as $data)
                {{
                    $data->get_barang->nama_barang
                }}
                {{
                    $data->get_barang->harga_barang
                }}
                /kg
                <br>
                <h6>
                    Jumlah Barang : {{
                        $data->jumlah_barang
                    }}
                </h6>
                <br>
                @endforeach
                <h6>
                    Total Bayar :   {{$detail->total_harga}}
                </h6>
    </div>
    <a href="">Di terima</a>
</div>
@endsection