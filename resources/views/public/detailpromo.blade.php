@extends('layouts.nonav')

@section('link')
    {{url('/home')}}
@stop

@section('content')
    <div class="banner-box">
        <img src="{{asset($data->cover)}}" alt="" class="bg-image">
        <img src="{{asset($data->cover)}}" alt="">
        <div class="layout"></div>
        <h4>{{$data->judul}}</h4>
    </div>

    <div class="deskripsi-box">
        <h4>Deksripsi</h4>
        <p>{{$data->isi}}</p>
    </div>

    <p class="date-promo">Berakhir pada {{$data->tanggal_berakhir}}</p>
@stop