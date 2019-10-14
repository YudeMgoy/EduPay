@extends('layouts.app')
@section('title')
    List Barang
@endsection
@section('content')
<div class="container">
    <h3 class="title">SEMBAKO</h3>
            @if (session()->has('status'))
                <div class="alert alert-success">
                    <strong>Success!</strong> {{session('status')}}
                </div>                        
            @endif
    <div class="barang-noscroll">
        @foreach ($lists as $item)
            <div class="barang-box">
                <a href="">                                                        
                    <div class="image-box">
                        <p class="diskon">50%</p>
                        <img src="" alt="">
                    </div>
                    <h3>{{str_limit($item->nama_barang,16)}}</h3>
                    <div class="harga">                                
                        <p class="harga-palsu">Rp {{$item->harga_barang/2}},00</p>
                        <p class="harga-asli">Rp {{$item->harga_barang}},00</p>
                    </div>                            
                </a>                
            </div> 
            <div class="barang-box">
                    <a href="">                                                        
                        <div class="image-box">
                            <p class="diskon">50%</p>
                            <img src="" alt="">
                        </div>
                        <h3>{{str_limit($item->nama_barang,16)}}</h3>
                        <div class="harga">                                
                            <p class="harga-palsu">Rp {{$item->harga_barang/2}},00</p>
                            <p class="harga-asli">Rp {{$item->harga_barang}},00</p>
                        </div>                            
                    </a>                
                </div> 
                <div class="barang-box">
                        <a href="">                                                        
                            <div class="image-box">
                                <p class="diskon">50%</p>
                                <img src="" alt="">
                            </div>
                            <h3>{{str_limit($item->nama_barang,16)}}</h3>
                            <div class="harga">                                
                                <p class="harga-palsu">Rp {{$item->harga_barang/2}},00</p>
                                <p class="harga-asli">Rp {{$item->harga_barang}},00</p>
                            </div>                            
                        </a>                
                    </div> 
                    <div class="barang-box">
                            <a href="">                                                        
                                <div class="image-box">
                                    <p class="diskon">50%</p>
                                    <img src="" alt="">
                                </div>
                                <h3>{{str_limit($item->nama_barang,16)}}</h3>
                                <div class="harga">                                
                                    <p class="harga-palsu">Rp {{$item->harga_barang/2}},00</p>
                                    <p class="harga-asli">Rp {{$item->harga_barang}},00</p>
                                </div>                            
                            </a>                
                        </div>    
        </div>
            {{-- <div class="product-grid">
                <div class="product-image">
                    <a href="#">
                        <img class="pic-1" src="http://bestjquery.com/tutorial/product-grid/demo9/images/img-7.jpg">
                        <img class="pic-2" src="http://bestjquery.com/tutorial/product-grid/demo9/images/img-8.jpg">
                    </a>
                    <ul class="social">
                        <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <span class="product-new-label">Sale</span>
                    <span class="product-discount-label">50%</span>
                </div>
                <ul class="rating">
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                </ul>
                <div class="product-content">
                    <h3 class="title"><a href="#">Men's Plain Tshirt</a></h3>
                    <div class="price">$5.00
                        <span>$10.00</span>
                    </div>
                    <a class="add-to-cart" href="">+ Add To Cart</a>
                </div>
            </div> --}}
        </div>
        @endforeach
    </div>
</div>
<hr>
</div>
@endsection