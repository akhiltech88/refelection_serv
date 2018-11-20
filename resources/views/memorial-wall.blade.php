@extends('layouts.layout')

@section('main-content')
<div class="p-25"></div>
    <h3 class="title">Memorials</h3>
    <div class="container">
        <div class="row">
            @foreach ($memorials as $memorial)
            <div class="col s12 m6 l3"><a class="card-profile" href="{{ url('memorial-page/'.$memorial->id) }}">
                    <div class="thumbnail"><img src="{{$memorial->photo}}" alt="Kevin Brooks" style="width: 100%;height: 100%"></div>
                    <div class="captions">
                        <div class="name">{{$memorial->first_name}} {{$memorial->middle_name}} {{$memorial->last_name}}</div>
                        <div class="description">{{$memorial->birth_city}}, {{$memorial->by_birth->name}}</div>
                        <div class="born">Born {{$memorial->dob}}</div>
                        <div class="deceased">Deceased {{$memorial->passed_date}}</div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="p-20 center-align">
        <ul class="pagination">
            <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
            <li class="active orange darken-3"><a href="#!">1</a></li>
            <li class="waves-effect"><a href="#!">2</a></li>
            <li class="waves-effect"><a href="#!">3</a></li>
            <li class="waves-effect"><a href="#!">4</a></li>
            <li class="waves-effect disabled"><a href="#!">...</a></li>
            <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
        </ul>
    </div>
@endsection