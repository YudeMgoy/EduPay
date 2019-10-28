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
                        <a href="{{url("edit/view/$item->id")}}"class="orange">Edit</a>|
                        <a href="{{url('delete/item')}}/{{$item->id}}" class="orange">Hapus</a>|
                        <a href="{{url('kosong/item')}}/{{$item->id}}" class="orange">Kosong</a>
                    </td>
                </tr>
            @endforeach                    
        </tbody>

            <td colspan="3" onclick="showModul()" style="text-align:center"><a class="btn button" href="#">+ TAMBAH BARANG</a></td>    
        </table>
        {{$barang->links()}}         
    </div>

    <table class="table">
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{session('status')}}
                    </div>                        
                @endif
            <h4>Barang yang kosong</h4>
        <thead class="bg-orange">
            <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Barang</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kosong as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->nama_barang}}</td>
                    <td>
                        <a href="{{url('ada')}}/{{$item->id}}" class="orange">Adakan Stok</a>
                    </td>
                </tr>
            @endforeach                    
        </tbody>
        </table>      
    </div>

    <div class="form modul" id="beli-modul">            
        <div class="layout" onclick="showModul()"></div>
        <form action="{{url('add/barang')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-container">
                <div class="form-title">
                    <h4>Tambah Barang</h4>
                    <a class="x" href="#" onclick="showModul()" style="color: white !important;">X</a>
                </div>
    
                <div class="form-box">
                    <label for="">Nama</label>
                    <input type="text" name="nama" id="" placeholder="Nama/Merk Barang">
                </div>
    
                <div class="form-box">
                    <label for="">Kategori</label>
                    <select name="kategori" id="">
                        @foreach ($kategori as $data)
                            <option value="{{$data->id}}">{{$data->kategori}}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-box">
                    <label for="">Deskripsi Barang</label>
                    <textarea name="des" id=""></textarea>
                </div>
    
                <div class="form-box">
                    <label for="">Gambar</label>
                    <input type="file" name="img">
                </div>
                <div class="form-box">
                    <label for="">Harga / Satuan</label>
                    <div class="multiform">
                        <input class="input" type="number" placeholder="Rp 10.000,00" name="harga">
                        <select class="input" name="satuan" id="">
                            @foreach ($satuan as $data)
                                <option value="{{$data->id}}">{{$data->satuan}}</option>
                            @endforeach
                        </select>
                    </div>                
                </div>
                <div class="form-box ">
                    <label for="">Diskon/Pengurangan Harga</label>                
                    <input class="input" type="number" placeholder="Rp 10.000,00 boleh kosong kok" name="diskon">                
                </div>
                <div class="form-box">
                        <button class="button" type="submit">TAMBAH</button>
                </div>      
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