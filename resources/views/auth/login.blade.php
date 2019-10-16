@extends('layouts.new')
@section('title')
    
@endsection
@section('content')
<div class="container">
    <div class="login-box">                
        <div class="main-title">
            <h3>E-PAIMAN</h3>
            <p>Belanja sambil duduk</p>
        </div>
        <div class="login-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('NIS') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="number" class="form-control @error('nis') is-invalid @enderror" name="nis" value="{{ old('nis') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row forgot-box">                    
                    <button type="submit" class="btn button">
                        {{ __('Login') }}
                    </button>

                    <div class="forgot">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Lupa Kata Sandi?') }}
                            </a>
                        @endif
                    </div>                                            
                </div>

                <div class="form-group col-md-6 row mb-0 no-account">                    
                    <a href="{{route('register')}}">Belum punya akun? Daftar yuk!</a>
                </div>
            </form>
        </div>
    </div>            
</div>
@endsection
