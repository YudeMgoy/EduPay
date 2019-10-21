@extends('layouts.app')

@section('barang')
    active
@stop

@section('content')    
    <div class="conteiner-fluid">
    <table class="table">
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{session('status')}}
                    </div>                        
                @endif
        <thead class="bg-orange">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($barang as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->nama_barang}}</td>
                    <td>
                        <a href="{{url('edit/view')}}/{{$item->id}}" class="orange">Edit</a>
                        <a href="{{url('delete/item')}}/{{$item->id}}" class="orange">Hapus</a>
                    </td>
                </tr>
            @endforeach                     
        </tbody>
            <td colspan="3" onclick="showModul()" style="text-align:center"><a class="btn button" href="#">+ TAMBAH BARANG</a></td>    
        </table>        
    </div>

    <div class="form modul" id="beli-modul">            
        <div class="layout" onclick="showModul()"></div>
        <form action="{{url('prosess/beli')}}" method="POST">
            @csrf
            <div class="form-title">
                <h4>Tambah Barang</h4>
                <a class="x" href="#" onclick="showModul()" style="color: white !important;">X</a>
            </div>

            <div class="form-box cod">
                <label for="">Nama</label>
                <input type="text" name="nama" id="" placeholder="Sabun Colek">
            </div>

            <div class="form-box cod">
                <label for="">Kategori</label>
                <select name="kategori" id="">
                    <option value="">Sembako</option>
                    <option value="">Sabun</option>
                    <option value="">Narkoba</option>
                </select>
            </div>

            <div class="form-box cod">
                <label for="">Gambar</label>
                <input type="file">
            </div>

            <div class="form-box cod">
                <label for="">Harga / Satuan</label>
                <div class="multiform">
                    <input class="input" type="number" placeholder="Rp 10.000,00">
                    <select class="input" name="satuan" id="">
                        <option value="">Kg</option>
                        <option value="">Lt</option>
                        <option value="">Pcs</option>
                    </select>
                </div>                
            </div>
                        
            <div class="form-box">
                    <button class="button">TOP UP</button>
            </div>                
        </form>
    </div>    
    
    <script>
    modul = document.getElementById("beli-modul");
    
    function showModul(){
        modul.classList.toggle("modul-active");
    }
    </script>
@endsection