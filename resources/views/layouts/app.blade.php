<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/list.css')}}">  
    <title>{{ config('app.name', 'Edu-PayM') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/keranjang.css')}}">
    <link rel="stylesheet" href="{{asset('css/profil.css')}}">
</head>
<body>
    @include('layouts.error')
    
        <nav class="bottom-nav">
            <div class="nav-list">
                @if (Auth::user()->role == 1)
                <div class="nav-box @yield('home')">
                    <a href="{{url('/')}}">
                        <img src="{{asset("img/home.png")}}" alt="">
                        <p>Home</p>
                    </a>
                </div>

                <div class="nav-box @yield('barang')">
                    <a href="{{url('view/all/barang')}}">
                        <img src="{{asset("img/keranjang.png")}}" alt="">
                        <p>Kelola Barang</p>
                    </a>                    
                </div>

                <div class="nav-box @yield('akun')">
                    <a href="{{url('akun')}}">
                        <img src="{{asset("img/akun.png")}}" alt="">
                        <p>Akun</p>
                    </a>
                </div>
                @else
                @if (Auth::user()->role == 2)
                <div class="nav-box @yield('home')">
                    <a href="{{url('/')}}">
                        <img src="{{asset("img/home.png")}}" alt="">
                        <p>Home</p>
                    </a>
                </div>

                <div class="nav-box @yield('riwayat')">
                    <a href="{{url('riwayat')}}">
                        <img src="{{asset("img/history.png")}}" alt="">
                        <p>Riwayat</p>
                    </a>                    
                </div>
                
                <div class="nav-box @yield('keranjang')">
                    <a href="{{url('keranjang')}}">
                        <img src="{{asset("img/keranjang.png")}}" alt="">
                        <p>Keranjang</p>
                    </a>                    
                </div>

                <div class="nav-box @yield('akun')">
                    <a href="{{url('akun')}}">
                        <img src="{{asset("img/akun.png")}}" alt="">
                        <p>Akun</p>
                    </a>
                </div>
                @else
                <div class="nav-box @yield('home')">
                    <a href="{{url('/')}}">
                        <img src="{{asset("img/home.png")}}" alt="">
                        <p>Home</p>
                    </a>
                </div>
                <div class="nav-box @yield('pesanan')">
                    <a href="{{url('gudang/list')}}">
                        <img src="{{asset("img/history.png")}}" alt="">
                        <p>List Pesanan</p>
                    </a>                    
                </div>

                <div class="nav-box @yield('akun')">
                    <a href="{{url('akun')}}">
                        <img src="{{asset("img/akun.png")}}" alt="">
                        <p>Akun</p>
                    </a>
                </div>
                @endif
                @endif
            </div>
        </nav>

        <div class="content">
            @yield('content')
        </div>

        

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>