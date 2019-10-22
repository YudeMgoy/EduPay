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
                <div class="carousel-item active">
                    <a href="{{url('promo/1')}}"><img class="d-block w-100" src="https://i1.wp.com/www.payfazz.com/wp-content/uploads/2019/09/BLOG-Shopfazz-Kejar-Untung-Cashback.jpg?fit=1201%2C628&ssl=1" alt="First slide"></a>
                </div>
                <div class="carousel-item">
                    <a href="{{url('promo/1')}}"><img class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu6P0UJ5b0LUnb76M_gtUbDwtRtC4hNgigh15yWz2c_6pUUj6PQA" alt="Second slide"></a>
                </div>
                <div class="carousel-item">
                    <a href="{{url('promo/1')}}"><img class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDY6OCeHqw5PleQRCmiUVUWkQEJovZVhRabKdqQbfVwxOMguwt" alt="Third slide"></a>
                </div>
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
                    <div class="barang-box">
                        <a href="{{url("detail/barang/$item->id")}}">                                                        
                            <div class="image-box">
                                <p class="diskon">50%</p>
                                <img src="{{asset($item->img)}}" alt="">
                            </div>
                            <h3>{{str_limit($item->nama_barang,16)}}</h3>
                            <div class="harga">                                
                                <p class="harga-palsu">Rp {{number_format($item->harga_barang/2,2,',','.')}}</p>
                                <p class="harga-asli">Rp {{number_format($item->harga_barang,2,',','.')}}</p>
                            </div>                            
                        </a>                
                    </div>
                    @endforeach
                </div>                
            </div>            
            @foreach ($kategori as $row)
            <div class="barang-wrapper">
                <div class="barang-header">
                    <h4>{{$row->kategori}}</h4>
                    <a href="{{url('list/barang')}}/{{$row->int}}" class="lihat">Lihat Semua</a>
                </div>

                <div class="barang-list">
                    @foreach ($row->get_barang_data as $data)
                        
                    <div class="barang-box">
                        <a href="{{url('detail/barang')}}/{{$data->id}}">
                            <div class="image-box">
                                <img src="{{asset($data->img)}}" alt="" class="bg-image">
                                <img src="{{asset($data->img)}}" alt="">
                            </div>
            
                            <h3>{{str_limit($data->nama_barang,16)}}</h3>
                            <div class="harga">
                                    <p class="harga-palsu">Rp {{number_format($item->harga_barang/2,2,',','.')}}</p>
                                    <p class="harga-asli">Rp {{number_format($item->harga_barang,2,',','.')}}</p>
                            </div>
                        </a>                
                    </div>
                    @endforeach
                </div>                
            </div>
            @endforeach 
        </div>            
    </div>
@endsection
