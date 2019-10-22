@extends('layouts.nonav')

@section('link')
    {{url('home')}}
@stop

@section('content')

<div class="container">  
    @if(!count($item))  
        <div class="belum-box">
            <img src="{{asset('img/belanja.png')}}" alt="">
            <h6>Oops keranjang kosong lurr!</h6>            
            <p>Ayo belanja barang - barang pakai DIMON untuk harga yang lebih murah</p>
            <a  class=" button"href="{{url('/list/barang')}}">MULAI BELANJA!</a>
        </div>        
    @else
        <nav class="bottom-nav">
            <div class="nav-list">
                <div class="nav-box biaya">
                    <h4>Total Rp {{number_format($harga,2,',','.')}}</h4>            
                </div>        
                <a href="#" onclick="beliModul()" class="beli-button button">BELI</a>        
            </div>
        </nav>
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
        @foreach ($item as $collection)            
            <div class="keranjang-box">
                <a class="x orange" href="{{url('hapus/barang')}}/{{$collection->id}}">X</a>
                <div class="keranjang-body">
                    <div class="img-box">
                        <img src="{{asset($collection->get_barang->img)}}" alt="" class="bg-image">
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
        @endforeach 
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
                    <label for="">No Whatsapp mu</label>
                    <input type="number" name="no_wa" id="">
                </div>
                
                <div class="form-box bayar">
                    {{-- <div class="bayar-box harga">
                        <p>Harga</p>
                        <p>Rp {{number_format($harga,2,',','.')}}</p>
                    </div>
                    <div class="bayar-box diskon">
                        <p>Jumlah</p>
                        <p>- Rp 5.000,00</p>
                    </div> --}}
                    <div class="bayar-box  total">
                        <p>Total</p>
                        <p>Rp {{number_format($harga,2,',','.')}}</p>
                    </div>
                </div>
                <div class="form-box">
                        <button class="button">BAYAR</button>
                </div>                
            </form>
        </div>
    @endif
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
