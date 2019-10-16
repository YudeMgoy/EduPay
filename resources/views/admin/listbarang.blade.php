@extends('layouts.app')
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
            <td colspan="3" style="text-align:center"><a class="btn button" href="{{url('add/list')}}" role="button">+ TAMBAH BARANG</a></td>    
        </table>        
        </div>
@endsection