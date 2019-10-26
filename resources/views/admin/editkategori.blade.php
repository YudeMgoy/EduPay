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

                    <form method="POST" action="{{ route('editkategori') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$kategori->id}}">
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>
                            <div class="col-md-6">
                                <input id="kategori" type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" value="{{ $kategori->kategori }}" required autocomplete="nama" autofocus>
                                @error('kategori')
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