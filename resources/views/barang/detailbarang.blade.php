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
        <div class="image-box">
            <p class="diskon-detail">50%</p>
            <img src="https://cf.shopee.co.id/file/1a0c7b4e1ab64fb01a4eb0ffc7eef194" alt="">
        </div>

        <div class="info-box">
            <h3>{{$barang->nama_barang}}</h3>
            <div class="harga">                                
                <p class="harga-palsu">Rp {{$barang->harga_barang/2}},00</p>
                <p class="harga-asli">Rp {{$barang->harga_barang}},00</p>
            </div>                                
        </div>  
        
        <div class="deskripsi-box">
            <h4>Deskripsi Barang</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur, quisquam maxime sed praesentium eum tempora ea hic mollitia ipsa fugiat provident earum labore fugit libero quas facilis molestias voluptas voluptatibus?</p>
        </div>
        
    </div>
@stop