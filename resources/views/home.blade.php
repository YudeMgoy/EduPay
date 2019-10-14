@extends('layouts.app')


@section('content')
    <div class="orange-bg">
    </div>
    <div class="header-container">
        <div class="saldo-box box">
            <div class="box-head">
                <h5>Saldo</h5>
            </div>
            <div class="box-body saldo-body">
                <h3>Rp <div class="duit">{{Auth::user()->saldo}}</div></h3>
                <a href="{{url("topup")}}" class="top-up button">TOP UP</a>
            </div>                    
        </div>
    </div>
    <div class="promo-container">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="https://i1.wp.com/www.payfazz.com/wp-content/uploads/2019/09/BLOG-Shopfazz-Kejar-Untung-Cashback.jpg?fit=1201%2C628&ssl=1" alt="First slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQu6P0UJ5b0LUnb76M_gtUbDwtRtC4hNgigh15yWz2c_6pUUj6PQA" alt="Second slide">
                </div>
                <div class="carousel-item">
                <img class="d-block w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDY6OCeHqw5PleQRCmiUVUWkQEJovZVhRabKdqQbfVwxOMguwt" alt="Third slide">
                </div>
            </div>
        </div>
    </div>

    <div class="belanja-container">
        <div class="search-box">
            <form action="" method="POST">
                <input type="text" name="search" placeholder="Ayo cari sesuatu">
                <button class="button">Search</button>                
            </form>
        </div>

        <div class="barang-container">
            <div class="barang-wrapper">
                <div class="barang-header">
                    <h4>Sembako</h4>
                    <a href="" class="lihat">Lihat Semua</a>
                </div>

                <div class="barang-list">
                    @foreach ($list as $item)
                    <div class="barang-box">
                        <a href="">
                            <div class="image-box">
                                <img src="" alt="">
                            </div>
                            <h3>{{$item->nama_barang}}</h3>
                            <p>Rp {{$item->harga_barang}},00</p>
                        </a>                
                    </div>
                    @endforeach
                </div>                
            </div>            
            <div class="barang-wrapper">
                <div class="barang-header">
                    <h4>Sembako</h4>
                    <a href="" class="lihat">Lihat Semua</a>
                </div>

                <div class="barang-list">
                    <div class="barang-box">
                        <a href="">
                            <div class="image-box">
                                <img src="" alt="">
                            </div>
            
                            <h3>Nama</h3>
                            <p>Rp 3.000,00</p>
                        </a>                
                    </div>

                    <div class="barang-box">
                        <a href="">
                            <div class="image-box">
                                <img src="" alt="">
                            </div>
            
                            <h3>Nama</h3>
                            <p>Rp 3.000,00</p>
                        </a>                
                    </div>

                    <div class="barang-box">
                        <a href="">
                            <div class="image-box">
                                <img src="" alt="">
                            </div>
            
                            <h3>Nama</h3>
                            <p>Rp 3.000,00</p>
                        </a>                
                    </div>

                    <div class="barang-box">
                        <a href="">
                            <div class="image-box">
                                <img src="" alt="">
                            </div>
            
                            <h3>Nama</h3>
                            <p>Rp 3.000,00</p>
                        </a>                
                    </div>

                    <div class="barang-box">
                        <a href="">
                            <div class="image-box">
                                <img src="" alt="">
                            </div>
            
                            <h3>Nama</h3>
                            <p>Rp 3.000,00</p>
                        </a>                
                    </div>
                </div>                
            </div> 

            <div class="barang-wrapper">
                <div class="barang-header">
                    <h4>Sembako</h4>
                    <a href="" class="lihat">Lihat Semua</a>
                </div>

                <div class="barang-list">
                    <div class="barang-box">
                        <a href="">
                            <div class="image-box">
                                <img src="" alt="">
                            </div>
            
                            <h3>Nama</h3>
                            <p>Rp 3.000,00</p>
                        </a>                
                    </div>

                    <div class="barang-box">
                        <a href="">
                            <div class="image-box">
                                <img src="" alt="">
                            </div>
            
                            <h3>Nama</h3>
                            <p>Rp 3.000,00</p>
                        </a>                
                    </div>

                    <div class="barang-box">
                        <a href="">
                            <div class="image-box">
                                <img src="" alt="">
                            </div>
            
                            <h3>Nama</h3>
                            <p>Rp 3.000,00</p>
                        </a>                
                    </div>

                    <div class="barang-box">
                        <a href="">
                            <div class="image-box">
                                <img src="" alt="">
                            </div>
            
                            <h3>Nama</h3>
                            <p>Rp 3.000,00</p>
                        </a>                
                    </div>

                    <div class="barang-box">
                        <a href="">
                            <div class="image-box">
                                <img src="" alt="">
                            </div>
            
                            <h3>Nama</h3>
                            <p>Rp 3.000,00</p>
                        </a>                
                    </div>
                </div>                
            </div> 
        </div>            
    </div>
@endsection
