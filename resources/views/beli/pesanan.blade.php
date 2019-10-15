@extends('layouts.new')
@section('content')
<h3>Pesanan anda</h3>
@foreach ($pesanan as $item)
    <h6>Pesanan anda</h6>
    <div class="card">
        <div class="card-header">
            Pembeli : {{Auth::user()->name}}
            <br>
            dipesan pada : {{$item->created_at}}
            <br>
            Status       : {{$item->get_status->status}}
            <br>
            <a href="{{url('detail/pesanan')}}/{{$item->id}}">Lihat Detail</a>
        </div>
    <div class="card-body">
    </div>
    </div>
@endforeach
@endsection