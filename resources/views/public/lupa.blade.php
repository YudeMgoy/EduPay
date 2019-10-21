@extends('layouts.nonav')

@section('content')
    <div class="container-top-up">
        <h5>
            Wahh lupa password-mu ya?
        </h5>
        <p> Yuk ikuti petunjuk di bawah,</p>
        <ul>
            <li>Pergi ke admin di Edumart</li>
            <li>Meminta untuk reset password</li>
            <li>Masukan NIS untuk password sementara</li>              
        </ul>

        <img class="lupa"src="{{asset('img/lupa.png')}}" alt="" class="top-up-bg">
    </div>    
@stop

@section('link')
    {{url('/')}}
@endsection