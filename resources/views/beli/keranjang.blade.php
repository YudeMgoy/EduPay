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
                <strong>Success!</strong> {{session('status')}}
            </div>                        
        @endif
        @forelse ($item as $collection)
            <div class="row">
                <div class="card">
                    <div class="card-body">
                    <form method="POST" action="{{url('edit/keranjang')}}">
                        @csrf
                        <h3>{{$collection->get_barang->nama_barang}}</h3>
                        <input type="number" name="jumlah_barang" id="" value="{{$collection->jumlah_barang}}">
                        <input type="hidden" name="id" value="{{$collection->id}}">
                        <input type="hidden">
                        <p>{{$collection->harga_barang}}<p>
                            <button type="submit">edit</button>
                            <a href="{{url('hapus/barang')}}/{{$collection->id}}">Hapus</a>
                    </form>
                    </div>
                </div>
            </div>
        @empty
            <h5>Oops keranjang kosong lurr! <a  class=" orange"href="{{url('/')}}">Ayo belanja!</a></h5>
        @endforelse    

        <div class="form modul" id="beli-modul">            
            <div class="layout" onclick="beliModul()"></div>
            <form action="">
                <div class="form-title">
                    <h4>Ayo Beli Lurr!</h4>
                </div>
                <div class="form-box">
                    <label for="">Metode</label>
                    <select name="metode" id="">
                        <option value="Saldo">Saldo</option>
                        <option value="COD">COD</option>
                    </select>
                </div>

                <div class="form-box saldo">
                    <label for="">Saldo Kamu</label>
                    <p class="saldo-text">Rp 50.000,00</p>
                </div>

                <div class="form-box cod">
                    <label for="">Ketemuan Dimana</label>
                    <textarea name="" id=""></textarea>
                </div>
                <div class="form-box">
                        <button class="button">BELI</button>
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
@endsection