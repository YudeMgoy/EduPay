@extends('layouts.app')
@section('content')
<h3>
    Gudang
</h3>
<div class="list-Barang">
    @foreach ($list as $item)
    <div class="card">
        <div class="card-header">
            </div>
        <div class="body">
            <h4>Pembeli: {{$item->get_barang->name}}</h4>
            <div class="barang">
                <h6>List barang yang di beli</h6>
                @foreach ($item->get_keranjang as $data)
                {{
                    $data->get_barang->nama_barang
                }}
                {{
                    $data->get_barang->harga_barang
                }}
                /kg
                <br>
                <h6>Metode Bayar :</h6>
                {{
                    $item->get_pay->pay
                }}
                <br>
                <h6>Status :</h6>
                {{
                    $item->get_status->status
                }}
                <br>
                <h6>
                    Jumlah Barang : {{
                        $data->jumlah_barang
                    }}
                </h6>
                <br>
                @endforeach
                <h6>
                    Total Bayar :   {{$item->total_harga}}
                </h6>
            </div>
        </div>
        <div class="action">
            <a href="http://">Dikemas</a>
            <a href="http://">Di \Antar</a>
        </div>
    </div>
    @endforeach
</div>
@endsection