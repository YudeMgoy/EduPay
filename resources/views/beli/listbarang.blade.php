@extends('layouts.app')
@section('title')
    List Barang
@endsection
@section('content')
<div class="container">
        <h3 class="h3">Edumart</h3>
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{session('status')}}
                    </div>                        
                @endif
    <div class="row">
        @foreach ($lists as $item)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid">
                <div class="product-image">
                    <a >
                        <img class="pic-1" src="{{  asset('storage')  }}{{$item->img}}">
                        <img class="pic-2" src="{{  asset('storage')  }}{{$item->img}} ">
                    </a>
                    <form method="POST" action="{{url('add/keranjang')}}">
                        @csrf
                    <ul class="social">
                        {{-- <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                        <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li> --}}
                    </ul>
                    <span class="product-new-label">Beli</span>
                    <span class="product-discount-label">20%</span>
                </div>
                <ul class="rating">
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star"></li>
                    <li class="fa fa-star disable"></li>
                </ul>
                <div class="product-content">
                    <h3 class="title"><a href="">{{$item->nama_barang}}</a></h3>
                    <div class="price">Rp.{{$item->harga_barang}}
                        <span>$20.00</span>
                    </div>
                    <input type="hidden" name="id" value="{{$item->id}}">
                    <input type="number" name="jumlah_barang" id="" placeholder="Masukan Jumalah Barang">
                    <input type="submit" value="+ add to Cart" class="add-to-cart btn btn-primary">
                </form>
                </div>
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