@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edu-PayM') }}</div>

                <div class="card-body">
                    @if (session()->has('status'))
                    <div class="alert alert-success">
                        <strong>Success!</strong> {{session('status')}}
                    </div>                        
                    @endif

                    <form method="POST" action="{{ route('editpromo') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$promo->id}}">
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('judul') }}</label>
                            <div class="col-md-6">
                                <input id="judul" type="text" class="form-control @error('Judul') is-invalid @enderror" name="judul" value="{{ $promo->judul }}" required autocomplete="nama" autofocus>
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Banner') }}</label>
                            <div class="col-md-6">
                                <input id="banner" type="file" class="form-control @error('Banner') is-invalid @enderror" name="banner" autocomplete="nama" autofocus>
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Isi') }}</label>
                            <div class="col-md-6">
                                <textarea name="isi" id="" cols="30" rows="5" class="form-control @error('isi') is-invalid @enderror">{{$promo->isi}}</textarea>
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Kode Promo') }}</label>
                            <div class="col-md-6">
                                <input id="kode_promo" type="text" value="{{$promo->kode_promo}}" class="form-control @error('kode_promo') is-invalid @enderror" name="kode_promo"  autocomplete="kode_promo" autofocus>
                                @error('kode_promo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nominal') }}</label>
                            <div class="col-md-6">
                                <input id="nominal" type="number" value="{{$promo->nominal_promo}}" class="form-control @error('nominal') is-invalid @enderror" name="nominal" autocomplete="nominal" autofocus>
                                @error('nominal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Berakhir') }}</label>
                            <div class="col-md-6">
                                <input id="tanggal_berakhir" type="date" value="{{$promo->tanggal_berakhir}}" class="form-control @error('tanggal_berakhir') is-invalid @enderror" name="tanggal_berakhir" required autocomplete="tanggal_berakhir" autofocus>
                                @error('judul')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
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