@extends("layouts.nonav")

@section('content')

    <nav class="bottom-nav">
        <form action="{{url("add/keranjang/$barang->id")}}" method="POST">
        <div class="nav-list">            
                @csrf
                <div class="nav-box no-padding">
                    <input type="number" name="jumlah_barang" placeholder="Jumlah">
                </div>                
                <div class="no-padding">
                    <button class="button">TAMBAH</button>
                </div>                            
        </div>
    </form>
    </nav>
    <div class="detail-container">
        @if ($barang->diskon == NULL)
        <div class="image-box">
            {{-- <p class="diskon-detail">{{($barang->diskon/$barang->harga_barang)*100}}%</p> --}}
            <img src="{{asset($barang->img)}}" alt="" class="bg-image">
            <img src="{{asset($barang->img)}}" alt="">
        </div>

        <div class="info-box">
            <h3>{{$barang->nama_barang}}</h3>
            <div class="harga">                                
                    <p class="harga-palsu">Rp {{number_format($barang->harga_barang,2,',','.')}}</p>
            </div>                                
        </div>  
        
        <div class="deskripsi-box">
            <h4>Deskripsi Barang</h4>
            <p>{{$barang->deskripsi}}</p>
        </div>    
        @else
        <div class="image-box">
            <p class="diskon-detail">{{($barang->diskon/$barang->harga_barang)*100}}%</p>
            <img src="{{asset($barang->img)}}" alt="" class="bg-image">
            <img src="{{asset($barang->img)}}" alt="">
        </div>

        <div class="info-box">
            <h3>{{$barang->nama_barang}}</h3>
            <div class="harga">                                
                    <p class="harga-palsu">Rp {{number_format($barang->harga_barang - $barang->diskon,2,',','.')}}</p>
                    <p class="harga-asli">Rp {{number_format($barang->harga_barang,2,',','.')}}</p>
            </div>                                
        </div>  
        
        <div class="deskripsi-box">
            <h4>Deskripsi Barang</h4>
            <p>{{$barang->deskripsi}}</p>
        </div>
        @endif
    </div>
@stop

@section('link')
    {{url('/')}}
@endsection