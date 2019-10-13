@extends('layouts.app')
@section('content')
    <h3>Section List Barang gudang</h3>
    <div class="conteiner-fluid">
    <table class="table">
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{session('status')}}
                    </div>                        
                @endif
        <thead class="thead-dark">
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
                <a href="{{url('edit/view')}}/{{$item->id}}">edit</a>
                <a href="{{url('delete/item')}}/{{$item->id}}">hapus</a>
            </td>
            </tr>
            @endforeach
        </tbody>
        </table>
        <a class="btn btn-outline-primary" href="{{url('add/list')}}" role="button">tambah</a>
        </div>
@endsection