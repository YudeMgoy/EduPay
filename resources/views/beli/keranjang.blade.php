@extends('layouts.nonav')

@section('content')

<nav class="bottom-nav">
    <div class="nav-list">
        <div class="nav-box biaya">
            <h4>Total Rp {{number_format($harga,2,',','.')}}</h4>
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
        @if (session()->has('error'))
            <div class="alert alert-danger">
                <strong>Oopss!!</strong> {{session('error')}}
            </div>                        
        @endif
        <div class="keranjang-container">
        @forelse ($item as $collection)            
            <div class="keranjang-box">
                <a class="x orange" href="{{url('hapus/barang')}}/{{$collection->id}}">X</a>
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
                        <div class="bayar-box" style="margin-top: 5px;">
                            <p style="font-size: 0.9em">Harga</p>
                            <p style="margin: auto !important;margin-right: 0 !important;font-size: 0.9em;">Rp {{number_format($collection->harga_barang,2,',','.')}}<p>
                        </div>                        
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
                    <a class="x" href="#" onclick="beliModul()" style="color: white !important;">X</a>
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
                    <p style="margin-bottom:0" class="saldo-text">Rp {{Auth::user()->saldo}}</p>
                </div>

                <div class="form-box cod" id="cod">
                    <label for="">Ketemuan Dimana</label>
                    <textarea name="alamat_kelas" id=""></textarea>
                </div>

                <div class="form-box cod">
                    <label for="">Kode Promo</label>
                    <input type="text" name="kode_promo" id="">
                </div>
                <div class="form-box cod">
                    <label for="">No Whatsapp mu</label>
                    <input type="number" name="no_wa" id="">
                </div>
                
                <div class="form-box bayar">
                    <div class="bayar-box harga">
                        <p>Harga</p>
                        <p>Rp {{number_format($harga,2,',','.')}}</p>
                    </div>
                    <div class="bayar-box diskon">
                        <p>Promo</p>
                        <p>- Rp 5.000,00</p>
                    </div>
                    <div class="bayar-box  total">
                        <p>Total</p>
                        <p>Rp {{number_format(($harga-5000),2,',','.')}}</p>
                    </div>
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
$(document).ready(function(){    
    $('#metode').on('change', function() {
        if ( this.value == '1')      
        {
            $("#saldo").show();
            $("#cod").show();
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
