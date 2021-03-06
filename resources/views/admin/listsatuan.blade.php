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
            <th scope="col">Satuan</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($satuan as $item)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$item->satuan}}</td>
                    <td>
                        <a href="{{url("satuan/edit/$item->id")}}"class="orange">Edit</a>
                        <a href="{{url('satuan/hapus')}}/{{$item->id}}" class="orange">Hapus</a>
                    </td>
                </tr>
            @endforeach                     
        </tbody>
            <td colspan="3" onclick="showModul()" style="text-align:center"><a class="btn button" href="#">+ TAMBAH SATUAN</a></td>    
        </table>        
    </div>

    <div class="form modul" id="beli-modul">            
        <div class="layout" onclick="showModul()"></div>
        <form action="{{url('add/satuan')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-container">
                <div class="form-title">
                    <h4>Tambah Kategori</h4>
                    <a class="x" href="#" onclick="showModul()" style="color: white !important;">X</a>
                </div>
    
                <div class="form-box">
                    <label for="">Nama</label>
                    <input type="text" name="satuan" id="" placeholder="Satuan" required>
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