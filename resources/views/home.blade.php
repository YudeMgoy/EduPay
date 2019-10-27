@extends('layouts.app')

@section('home')
    active
@stop


@section('content')
    <div class="orange-bg">
    </div>
    <div class="header-container">
        <div class="saldo-box box">
            <div class="box-head">
                <h5>Saldo</h5>
            </div>
            <div class="box-body saldo-body">
                <h3>Rp <div class="duit">{{number_format(Auth::user()->saldo,2,',','.')}}</div></h3>
                <a href="{{url("topup")}}" class="top-up button">TOP UP</a>
            </div>                    
        </div>
    </div>
    <div class="promo-container">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($promos as $promo)
                <div class="carousel-item active">
                    <a href="{{url('promo')}}/{{$promo->id}}"><img class="d-block w-100" src="{{asset($promo->cover)}}" alt="First slide"></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="belanja-container">
        <div class="search-box">
            <form action="{{url('search/barang')}}" method="POST">
                @csrf
                <input type="text" name="search" placeholder="Ayo cari sesuatu">
                <button class="button">Search</button>                
            </form>
        </div>

        <div class="barang-container">
            <div class="barang-wrapper">
                <div class="barang-header">
                    <h4>Rekomendasi</h4>
                    <a href="{{url('list/barang')}}" class="lihat">Lihat Semua</a>
                </div>

                <div class="barang-list">
                    @foreach ($list as $item)
                    @if ($item->diskon == NULL)
                    <div class="barang-box">
                        <a href="{{url('detail/barang')}}/{{$item->id}}">
                            <div class="image-box">
                                <img src="{{asset($item->img)}}" alt="" class="bg-image">
                                <img src="{{asset($item->img)}}" alt="">
                            </div>
            
                            <h3>{{str_limit($item->nama_barang,16)}}</h3>
                            <div class="harga">
                                    <p class="harga-palsu">Rp {{number_format($item->harga_barang,2,',','.')}}</p>
                                    {{-- <p class="harga-asli">Rp {{number_format($item->harga_barang,2,',','.')}}</p> --}}
                            </div>
                        </a>                
                    </div>
                    @else
                    <div class="barang-box">
                        <a href="{{url("detail/barang/$item->id")}}">                                                        
                            <div class="image-box">
                                <p class="diskon">{{($item->diskon/$item->harga_barang)*100}}%</p>
                                <img src="{{asset($item->img)}}" alt="">
                            </div>
                            <h3>{{str_limit($item->nama_barang,16)}}</h3>
                            <div class="harga">                                
                                <p class="harga-palsu">Rp {{number_format($item->harga_barang - $item->diskon,2,',','.')}}</p>
                                <p class="harga-asli">Rp {{number_format($item->harga_barang,2,',','.')}}</p>
                            </div>                            
                        </a>                
                    </div>    
                    @endif
                    @endforeach
                </div>                
            </div>            
            @foreach ($kategori as $row)
            <div class="barang-wrapper">
                <div class="barang-header">
                    <h4>{{$row->kategori}}</h4>
                    <a href="{{url('list/barang')}}/{{$row->id}}" class="lihat">Lihat Semua</a>
                </div>
                <div class="barang-list">
                    @foreach ($row->get_barang_data->take(5) as $data)
                        
                    @if ($data->diskon == NULL)
                    <div class="barang-box">
                        <a href="{{url('detail/barang')}}/{{$data->id}}">
                            <div class="image-box">
                                <img src="{{asset($data->img)}}" alt="" class="bg-image">
                                <img src="{{asset($data->img)}}" alt="">
                            </div>
            
                            <h3>{{str_limit($data->nama_barang,16)}}</h3>
                            <div class="harga">
                                    <p class="harga-palsu">Rp {{number_format($data->harga_barang,2,',','.')}}</p>
                                    {{-- <p class="harga-asli">Rp {{number_format($data->harga_barang,2,',','.')}}</p> --}}
                            </div>
                        </a>                
                    </div>
                    @else
                    <div class="barang-box">
                        <a href="{{url("detail/barang/$data->id")}}">                                                        
                            <div class="image-box">
                                <p class="diskon">{{($data->diskon/$data->harga_barang)*100}}%</p>
                                <img src="{{asset($data->img)}}" alt="">
                            </div>
                            <h3>{{str_limit($data->nama_barang,16)}}</h3>
                            <div class="harga">                                
                                <p class="harga-palsu">Rp {{number_format($data->harga_barang - $data->diskon,2,',','.')}}</p>
                                <p class="harga-asli">Rp {{number_format($data->harga_barang,2,',','.')}}</p>
                            </div>                            
                        </a>                
                    </div>    
                    @endif
                    @endforeach
                </div>                
            </div>
            @endforeach 
        </div>            
    </div>
@endsection
