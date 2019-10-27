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
            <th scope="col">Promo judul</th>
            <th  scope="col">Banner</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banner as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->judul}}</td>
                    <td><img src="{{asset($item->cover)}}" alt="" style="height:50px;width:70px;"></td>
                    <td>
                        <a href="{{url("promo/edit/$item->id")}}"class="orange">Edit</a>
                        <a href="{{url('promo/hapus')}}/{{$item->id}}" class="orange">Hapus</a>
                    </td>
                </tr>
            @endforeach                    
        </tbody>

            <td colspan="3" onclick="showModul()" style="text-align:center"><a class="btn button" href="#">+ TAMBAH BANNER</a></td>    
        </table>         
    </div>

    <div class="form modul" id="beli-modul">            
        <div class="layout" onclick="showModul()"></div>
        <form action="{{url('promo/add')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-container">
                <div class="form-title">
                    <h4>Tambah Banner</h4>
                    <a class="x" href="#" onclick="showModul()" style="color: white !important;">X</a>
                </div>
    
                <div class="form-box">
                    <label for="">Judul Promo</label>
                    <input type="text" name="judul" id="" placeholder="Judul">
                </div>

                <div class="form-box">
                    <label for="">Banner</label>
                    <input type="file" name="banner" id="" placeholder="">
                </div>
                <div class="form-box">
                    <label for="">Isi</label>
                    <textarea name="isi" id="" cols="10" rows="5">

                    </textarea>
                </div>

                <div class="form-box">
                    <label for="">Kode Promo</label>
                    <input type="text" name="kode_promo" id="" placeholder="Kode Promo">
                </div>
                <div class="form-box">
                    <label for="">Nominal Promo</label>
                    <input type="number" name="nominal" id="" placeholder="nominal">
                </div>
                <div class="form-box">
                    <label for="">Tanggal Berakhir</label>
                    <input type="date" name="tanggal_berakhir" id="" placeholder="">
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