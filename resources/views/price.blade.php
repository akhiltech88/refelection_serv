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
                <div class="col s12 m4">
                    <div class="price-card">
                        <div class="price-card-title">Option One</div>
                        <div class="price-tag">
                            <div class="price">Price : £ 299 </div>
                            <div class="duration">Duration : 3 Years</div>
                        </div>
                        <ul>
                            <li>Attach up to Five Photographs</li>
                            <li class="no-bullet">&nbsp;</li>
                            <li class="no-bullet">&nbsp;</li>
                        </ul>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="price-card">
                        <div class="price-card-title">Option Two</div>
                        <div class="price-tag">
                            <div class="price">Price : £405 </div>
                            <div class="duration">Duration : 5 Years</div>
                        </div>
                        <ul>
                            <li>Attach up to Ten Photographs</li>
                            <li class="no-bullet">&nbsp;</li>
                            <li class="no-bullet">&nbsp;</li>
                        </ul>
                    </div>
                </div>
                <div class="col s12 m4">
                    <div class="price-card">
                        <div class="price-card-title">Option Three</div>
                        <div class="price-tag">
                            <div class="price">Price : £520 </div>
                            <div class="duration">Duration : 10 Years</div>
                        </div>
                        <ul>
                            <li>Attach up to Fifteen Photographs</li>
                            <li>Attach Video Clip</li>
                            <li>Attach Sound Clip</li>
                        </ul>
                    </div>
                </div>
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