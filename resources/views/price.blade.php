@extends('layouts.layout')

@section('main-content')
<div class="bg-2">
        <div class="p-15"></div>
        <h3 class="title">Price &amp; Features</h3>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card-3 center-align">Create everlasting memories<a class="orange-text ml-10" href="{{ url('create-memorials') }}">Click here</a></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($packages as $package)
                <div class="col s12 m4">
                    <div class="price-card">
                        <div class="price-card-title">{{$package->name}}</div>
                        <div class="price-tag">
                            <div class="price">Price : £ {{$package->price}} + vat</div>
                            <div class="duration">Duration : {{$package->years}} Years</div>
                        </div>
                        <ul>
                            <li>Attach up to {{$package->package_features->value}} Photographs</li>
                            <li class="no-bullet">@if(3 == $package->package_features->package_id) Attach Video Clip @else &nbsp; @endif</li>
                            <li class="no-bullet">@if(3 == $package->package_features->package_id) Attach Sound Clip @else &nbsp; @endif</li>
                        </ul>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="box-1 white-theme">
                        <div class="box-1-title">Standard Features</div>
                        <div class="row">
                            <div class="col m6">
                                <ul>
                                    <li>Share Memories of Key Events</li>
                                    <li>Create a Personalised Biography</li>
                                    <li>Accessible from Home or Graveside</li>
                                    <li>Choice of Templates and Designs</li>
                                    <li>Accessible Through Smartphones &amp; PCs</li>
                                </ul>
                            </div>
                            <div class="col m6">
                                <ul>
                                    <li>Feedback Tributes From Family and Friends</li>
                                    <li>Display in Global Memorial Wall</li>
                                    <li>Personalized Private and Public Access</li>
                                    <li>Anniversary Date Highlighted Globally</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-15"></div>
    </div>
@endsection