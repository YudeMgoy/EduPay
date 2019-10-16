@extends('layouts.nonav')

@section('content')

<nav class="bottom-nav">
    <div class="nav-list">
        <div class="nav-box biaya">
            <h4>Total {{$harga}}</h4>
            <p></p>
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
                        <img src="{{asset($collection->get_barang->img)}}" alt="">
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
            <h5>Oops keranjang kosong lurr! <a  class=" orange"href="{{url('/list/barang')}}">Ayo belanja!</a></h5>
        @endforelse    
        </div>  

        <div class="form modul" id="beli-modul">            
            <div class="layout" onclick="beliModul()"></div>
            <form action="{{url('prosess/beli')}}" method="POST">
                @csrf
                <div class="form-title">
                    <h4>Ayo Beli Lurr!</h4>
                </div>
                <div class="form-box">
                    <label for="">Metode</label>
                    <select name="pay" id="metode">
                        @foreach ($pay as $i)
                            <option value="{{$i->int}}">{{$i->pay}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-box saldo" id="saldo">
                    <label for="">Saldo Kamu</label>
                    <p class="saldo-text">Rp {{Auth::user()->saldo}}</p>
                </div>

                <div class="form-box cod" id="cod">
                    <label for="">Ketemuan Dimana</label>
                    <textarea name="alamat_kelas" id=""></textarea>
                </div>
                <div class="form-box cod" id="cod">
                    <label for="">No Whatsapp mu</label>
                    <input type="number" name="no_wa" id="">
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
        if ( this.value == '1')      
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
