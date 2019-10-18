@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('TopUp') }}</div>
                <div class="card-body">
                    @if (session()->has('error'))
                    <div class="alert alert-danger">
                        <strong>Oopps!!!</strong> {{session('error')}}
                    </div>                        
                    @endif 
                    @if (session()->has('status'))
                    <div class="alert alert-success">
                        <strong>Sukses!</strong> {{session('status')}}
                    </div>                        
                    @endif

                    <form method="POST" action="{{ route('topup') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('ID User') }}</label>
                            <div class="col-md-6">
                                <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id" autofocus>
                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Nominal') }}</label>

                            <div class="col-md-6">
                                <input id="nominal" type="number" class="form-control @error('Nominal') is-invalid @enderror" name="nominal" required autocomplete="nominal">

                                @error('nominal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('TopUp') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection