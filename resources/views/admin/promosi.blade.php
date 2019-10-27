@extends('layouts.app')
@section('content')
    {{-- <div class="form modul modul-active" id="edit-modul">            
        <div class="layout" ></div>
        <form action="{{route('editbarang')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-title">
                <h4>Tambah Barang</h4>
                <a class="x" href="#" style="color: white !important;">X</a>
            </div>
            <div class="form-box cod">
                <label for="">Nama</label>
                <input type="text" name="nama" id="" placeholder="Nama/Merk Barang" value="{{$data->nama_barang}}">
            </div>
            <div class="form-box cod">
                <label for="">Kategori</label>
                <select name="kategori" id="">
                    @foreach ($collection as $i)
                        <option value="{{$i->int}}">{{$i->kategori}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-box cod">
                <label for="">Deskripsi Barang</label>
                <textarea name="des" id="">{{$data->deskripsi}}</textarea>
            </div>

            <div class="form-box cod">
                <label for="">Gambar</label>
                <input type="file" name="img">
            </div>

            <div class="form-box cod">
                <label for="">Harga / Satuan</label>
                <div class="multiform">
                    <input class="input" type="number" value="{{$data->harga_barang}}" placeholder="Rp 10.000,00" name="harga">
                    <select class="input" name="satuan" id="">
                        @foreach ($satuan as $d)
                            <option value="{{$d->id}}">{{$d->satuan}}</option>
                        @endforeach
                    </select>
                </div>                
            </div>
            
            <div class="form-box cod">
                <label for="">Diskon/Pengurangan Harga</label>                
                <input class="input" type="number" placeholder="Rp 10.000,00 boleh kosong kok" name="diskon" value="{{$data->diskon}}">                
            </div>
            <div class="form-box">
                    <button class="button" type="submit">EDIT</button>
            </div>                
        </form>
    </div> --}}

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

                    <form method="POST" action="{{ route('editbarang') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Barang') }}</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ $data->nama_barang }}" required autocomplete="nama" autofocus>
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="exampleFormControlSelect1" name="kategori">
                                    <option>--------Pilih Kategori---------</option>
                                    @foreach ($collection as $item)
                                        <option value="{{$item->id}}"@if ($item->id == $data->kategori))
                                        selected="selected"
                                            @endif>{{$item->kategori}}</option>
                                    @endforeach
                                </select>

                                @error('kategori')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="img" class="col-md-4 col-form-label text-md-right">{{ __('Gambar') }}</label>
                            <div class="col-md-6">
                                <input id="img" type="file" class="form-control @error('img') is-invalid @enderror" name="img" value="{{ old('img') }}" autocomplete="img" autofocus>
                                @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Harga Barang / Satuan') }}</label>

                            <div class="col-md-6">
                                <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" required autocomplete="harga" value="{{$data->harga_barang}}">

                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Diskon') }}</label>

                            <div class="col-md-6">
                                <input id="harga" type="number" class="form-control @error('diskon') is-invalid @enderror" name="diskon" required autocomplete="diskon" value="{{$data->diskon}}">

                                @error('diskon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="harga" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>

                            <div class="col-md-6">
                                <textarea name="des" id="" cols="20" rows="5" class="form-control @error('des') is-invalid @enderror">{{$data->deskripsi}}</textarea>
                                @error('des')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kategori" class="col-md-4 col-form-label text-md-right">{{ __('Satuan') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" id="exampleFormControlSelect1" name="satuan">
                                    <option>--------Pilih Kategori---------</option>
                                    @foreach ($satuan as $satuans)
                                        <option value="{{$satuans->id}}"@if ($satuans->id == $data->satuan))
                                        selected="selected"
                                            @endif>{{$satuans->satuan}}</option>
                                    @endforeach
                                </select>

                                @error('satuan')
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