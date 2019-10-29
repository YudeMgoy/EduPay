@extends('layouts.nonav')

@section('link')
    {{url('akun')}}
@stop

@section('content')
    <div class="container">
        <h3 class="title">Pengaturan</h3>
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        <strong>error!</strong> {{session('error')}}
                    </div>                        
                @endif
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{session('status')}}
                    </div>                        
                @endif
        <div class="bottom-container">    
            <div class="bottom-box" onclick="showFoto()">
                <a href="#">Foto Profil</a>               
            </div>
            <div class="bottom-box" onclick="showNama()">
                <a href="#">Ganti Nama</a>               
            </div>
            <div class="bottom-box" onclick="showPassword()">
                <a href="#">Ubah Password</a>               
            </div>
        </div>
    </div>    


    <div class="form modul" id="foto-modul">            
        <div class="layout" onclick="showFoto()"></div>        
        <form action="{{url('ganti/foto')}}" method="POST" enctype="multipart/form-data">
            @csrf            
            <div class="form-title">
                <h4>Ganti Foto Profil</h4>
                <a class="x" href="#" onclick="showFoto()" style="color: white !important;">X</a>
            </div>

            <div class="profil-box">
                <img src="{{asset(Auth::user()->img)}}" alt="" class="bg-image">
                <img src="{{asset(Auth::user()->img)}}" alt="">
            </div>

            <div class="form-box cod">
                <label for="">Pilih Foto</label>
                <input type="file" name="img" id="">
            </div>
                        
            <div class="form-box">
                    <button class="button">GANTI</button>
            </div>                
        </form>
    </div>    

    <div class="form modul" id="password-modul">            
        <div class="layout" onclick="showPassword()"></div>        
        <form action="{{url('ganti/password')}}" method="POST">
            @csrf            
            <div class="form-title">
                <h4>Ganti Password</h4>
                <a class="x" href="#" onclick="showPassword()" style="color: white !important;">X</a>
            </div>

            <div class="form-box cod">
                <label for="">Password Lama</label>
                <input type="password" name="old_password" id="">
            </div>

            <div class="form-box cod">
                <label for="">Password Baru</label>
                <input type="password" name="new_password" id="">
            </div>

            <div class="form-box cod">
                <label for="">Confirmasi Password</label>
                <input type="password" name="confirm_password" id="">
            </div>
                        
            <div class="form-box">
                    <button class="button">GANTI</button>
            </div>                
        </form>
    </div>  
    
    <div class="form modul" id="nama-modul">            
        <div class="layout" onclick="showNama()"></div>        
        <form action="{{url('ganti/nama')}}" method="POST">
            @csrf            
            <div class="form-title">
                <h4>Ganti Nama</h4>
                <a class="x" href="#" onclick="showNama()" style="color: white !important;">X</a>
            </div>

            <div class="form-box cod">
                <label for="">Nama Baru</label>
                <input type="text" name="new_name" id="">
            </div>
                        
            <div class="form-box">
                    <button class="button">GANTI</button>
            </div>                
        </form>
    </div>    

    <script>
        foto = document.getElementById("foto-modul");
        password = document.getElementById("password-modul");
        nama = document.getElementById('nama-modul');
        
        function showFoto(){
            foto.classList.toggle("modul-active");
        }

        function showPassword(){
            password.classList.toggle("modul-active");
        }

        function showNama(){
            nama.classList.toggle('modul-active');
        }
    </script>
@stop