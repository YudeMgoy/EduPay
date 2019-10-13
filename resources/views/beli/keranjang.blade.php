@extends('layouts.app')
@section('content')
    <h3>
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
    <h3>Opps Kosong</h3>
    @endforelse
@foreach ($item as $collection)
@endforeach
<form method="post" action="{{url('prosess/beli')}}">
    @csrf
    <select name="paymen" id="">
        <option value="1">Saldo</option>
        <option value="2">Cod</option>
    </select>
    <br>
    <label for="textarea">Kelas</label>
    <textarea name="alamat_kelas" id="" cols="30" rows="10"></textarea>
    
<button type="submit" href="*">Beli</button>
</form>
<form method="get" action="{{url('hapus/keranjang/list')}}">
<button type="submit" href="*">Cencel</button>
</form>
@endsection