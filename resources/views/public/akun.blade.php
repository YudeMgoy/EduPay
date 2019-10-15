@extends('layouts.app')
@section('title')
    Profile
@endsection
@section('content')
<h3>Profile</h3>

<a href="{{url('logout')}}">Logout</a>
<br>
<a href="{{url('list/pesanan')}}">list Pesanan mu</a>
@endsection