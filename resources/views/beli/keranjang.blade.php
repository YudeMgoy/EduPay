@extends('layouts.nonav')

@section('content')

<nav class="bottom-nav">
    <div class="nav-list">
        <div class="nav-box biaya">
            <h4>Total</h4>
            <p>Rp 50.000,00</p>
        </div>        
        <a href="#" onclick="beliModul()" class="beli-button button">BELI</a>        
    </div>
</nav>
<div class="container">
    <h3 class="title">
            Keranjang
        </h3>
        @if (session()->has('status'))
            <div class="alert alert-success">
                <strong>Sukses!</strong> {{session('status')}}
            </div>                        
        @endif
        <div class="keranjang-container">
        @forelse ($item as $collection)            
            <div class="keranjang-box">
                <a class="x" href="{{url('hapus/barang')}}/{{$collection->id}}">X</a>
                <div class="keranjang-body">
                    <div class="img-box">
                        <img src="https://cf.shopee.co.id/file/1a0c7b4e1ab64fb01a4eb0ffc7eef194" alt="">
                    </div>

                    <div class="right-box">
                        <h4>{{$collection->get_barang->nama_barang}}</h4>
                        <form method="POST" action="{{url('edit/keranjang')}}">
                            @csrf                        
                            <input type="number" name="jumlah_barang" id="" value="{{$collection->jumlah_barang}}">
                            <input type="hidden" name="id" value="{{$collection->id}}">                            
                            <button type="submit" class="button">Edit</button>                                
                        </form>
                        <p>Total Harga : {{$collection->harga_barang}}<p>
                    </div>                                        
                </div>
            </div>            
        @empty
            <h5>Oops keranjang kosong lurr! <a  class=" orange"href="{{url('/')}}">Ayo belanja!</a></h5>
        @endforelse    
        </div>  

        <div class="form modul" id="beli-modul">            
            <div class="layout" onclick="beliModul()"></div>
            <form action="">
                <div class="form-title">
                    <h4>Ayo Beli Lurr!</h4>
                </div>
                <div class="form-box">
                    <label for="">Metode</label>
                    <select name="metode" id="metode">
                        <option value="Saldo">Saldo</option>
                        <option value="COD">COD</option>
                    </select>
                </div>

                <div class="form-box saldo" id="saldo">
                    <label for="">Saldo Kamu</label>
                    <p class="saldo-text">Rp 50.000,00</p>
                </div>

                <div class="form-box cod" id="cod">
                    <label for="">Ketemuan Dimana</label>
                    <textarea name="" id=""></textarea>
                </div>
                <div class="form-box">
                        <button class="button">BAYAR</button>
                </div>                
            </form>
        </div>
</div>

<script>
modul = document.getElementById("beli-modul");

function beliModul(){
    modul.classList.toggle("modul-active");
}
</script>

<script>
$("#saldo").show();
$("#cod").hide();
$(document).ready(function(){    
    $('#metode').on('change', function() {
        if ( this.value == 'Saldo')      
        {
            $("#saldo").show();
            $("#cod").hide();
        }
        else
        {
            $("#saldo").hide();
            $("#cod").show();
        }
    });
});                    

</script>
@endsection
