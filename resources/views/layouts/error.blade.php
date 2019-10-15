@if (count($errors))
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            <strong>Gagal!</strong> {{$error}}
        </div>      
    @endforeach
@endif