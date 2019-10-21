@extends('layouts.app')

@section('riwayat')
    active
@stop

@section('content')
<div class="container">
    <h3 class="title">
        Riwayat
    </h3>
    
    <div class="keranjang-container">
        @foreach ($collection as $item)
        <div class="keranjang-box">     
            <a href="{{url('detail/pesanan')}}/{{$item->id}}">
                <div class="keranjang-body">                
                    <div class="full-box">
                        <h4 class="text-danger">{{$item->get_status->status}}</h4>
                        <div class="bayar-box" style="margin-top: 5px;">
                            <p style="font-size: 0.9em">Total</p>
                            <p style="margin: auto !important;margin-right: 0 !important;font-size: 0.9em;">Rp {{$item->total_harga}}<p>
                        </div>
                        <p class="date">{{$item->created_at->diffForHumans()}}</p>                 
                    </div>                                        
                </div>
            </a>                   
        </div>
        @endforeach

    </div>      
</div>


@stop