@extends('layouts.nonav')

@section('link')
    {{url('akun')}}
@stop

@section('content')
    <div class="container">
        <h3 class="title">Pengaturan</h3>
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
        <form action="{{url('prosess/beli')}}" method="POST">
            @csrf            
            <div class="form-title">
                <h4>Ganti Foto Profil</h4>
                <a class="x" href="#" onclick="showFoto()" style="color: white !important;">X</a>
            </div>

            <div class="profil-box">
                <img src="data:image/jpeg;base64,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" alt="" class="bg-image">
                <img src="data:image/jpeg;base64,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" alt="">
            </div>

            <div class="form-box cod">
                <label for="">Pilih Foto</label>
                <input type="file" name="foto" id="">
            </div>
                        
            <div class="form-box">
                    <button class="button">GANTI</button>
            </div>                
        </form>
    </div>    

    <div class="form modul" id="password-modul">            
        <div class="layout" onclick="showPassword()"></div>        
        <form action="{{url('prosess/beli')}}" method="POST">
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
                        
            <div class="form-box">
                    <button class="button">GANTI</button>
            </div>                
        </form>
    </div>  
    
    <div class="form modul" id="nama-modul">            
        <div class="layout" onclick="showNama()"></div>        
        <form action="{{url('prosess/beli')}}" method="POST">
            @csrf            
            <div class="form-title">
                <h4>Ganti Nama</h4>
                <a class="x" href="#" onclick="showNama()" style="color: white !important;">X</a>
            </div>

            <div class="form-box cod">
                <label for="">Nama Baru</label>
                <input type="text" name="new_nama" id="">
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