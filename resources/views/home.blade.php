@extends('layouts.layout')

@section('main-content')

<div class="banner">
        <div class="container">
            <div class="banner-logo">
                <div class="logo"><img src="{{ asset('images/logo.png') }}" alt="Logo"></div>
            </div>
            <div class="qr-code"><img src="{{ asset('images/qr-image.png') }}"><a class="btn waves-effect waves-light white orange-text text-darken-3" href="{{ url('about-us') }}">ENTER</a></div>
        </div>
    </div>

@endsection