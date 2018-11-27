@extends('layouts.layout')

@section('main-content')
<div id="memorial-page">
        <div class="memorial-header parallax-container">
            <div class="parallax"><img src="{{url($memorial->theme->theme_img)}}" alt=""></div>
        </div>
    </div>
    <div class="white">
        <div class="container">
            <div class="profile">
                <div class="row">
                    <div class="col s12 m4">
                        <div class="profile-box">
                            <div class="thumbnail"><img src="{{url($memorial->photo)}}" alt="" style="width: 100%;height: 100%"></div>
                            <div class="bar-code"><img src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAAV4AAAFeCAIAAABCSeBNAAAFnklEQVR4nO3dQW7jMBAAwcTY/z/Z2PMCnayA0MxQrnqALYlOQwdO+Pl8Pj8A/vX47QsAJpIGIEgDEKQBCNIABGkAgjQAQRqAIA1AkAYgSAMQpAEI0gAEaQCCNABBGoAgDUCQBiBIAxCkAQjSAARpAII0AEEagCANQJAGIEgDEKQBCNIABGkAgjQAQRqAIA1AkAYgSAMQpAEI0gAEaQCCNABBGoAgDUCQBiBIAxCkAQjSAARpAII0AEEagPDnty8gPB7vG6zn87nkc648wyvftWotdn7XiVat+0LvuxjAN6QBCNIABGkAgjQAQRqAIA1AkAYgSAMQpAEI0gCEiTMUVwzcc/5fq2YEps0a7FyLd173zY68aODVpAEI0gAEaQCCNABBGoAgDUCQBiBIAxCkAQjSAIRTZyiu2Ll3/cS9/VesOj9i5/Ox7kt4awCCNABBGoAgDUCQBiBIAxCkAQjSAARpAII0AEEagHDnGYq7WjXXcMW0+Qi28dYABGkAgjQAQRqAIA1AkAYgSAMQpAEI0gAEaQCCNADBDMV5ds41nHgOBUt4awCCNABBGoAgDUCQBiBIAxCkAQjSAARpAII0AEEagHDnGQr79n9u1XkWO1n3Jc5beGADaQCCNABBGoAgDUCQBiBIAxCkAQjSAARpAII0AOHUGYoT9/ZPs+r8iJ1rYd238aCBIA1AkAYgSAMQpAEI0gAEaQCCNABBGoAgDUCQBiB8+qf9xzlxjsDP7Djn/ciADaQBCNIABGkAgjQAQRqAIA1AkAYgSAMQpAEI0gCEiedQrJoRWHWGwqr9/9Pua9V3rbJzNuSuz3Ahbw1AkAYgSAMQpAEI0gAEaQCCNABBGoAgDUCQBiBIAxBOPYdi2v72VbMY0+5rp2nzLCd+10LeGoAgDUCQBiBIAxCkAQjSAARpAII0AEEagCANQJAGIEw8h2KnnWcf3HU+4q73dcXO389mt70x4CekAQjSAARpAII0AEEagCANQJAGIEgDEKQBCNIAhInnUOw802Hn5+y0c2//tHtnCW8NQJAGIEgDEKQBCNIABGkAgjQAQRqAIA1AkAYgSAMQ7nwOxc69/dNmFqbd+7SZlytWPcMTZ3A+vDUASRqAIA1AkAYgSAMQpAEI0gAEaQCCNABBGoAgDUCYeA4F39s5IzBt//+0WZVp8xoLeWsAgjQAQRqAIA1AkAYgSAMQpAEI0gAEaQCCNABBGoAw8RyKnfvkp5k2j3DiWQw7n+HA2YdV3vePEPiGNABBGoAgDUCQBiBIAxCkAQjSAARpAII0AEEagDBxhuKKE/eun3hmwYnzLNOe87SzPC46b+GBDaQBCNIABGkAgjQAQRqAIA1AkAYgSAMQpAEI0gCEU2corti5/3/aHvgTz32Ytl4nzo8s9NY3D3xFGoAgDUCQBiBIAxCkAQjSAARpAII0AEEagCANQLjzDMVdrZqPmDYj4HyNUTwgIEgDEKQBCNIABGkAgjQAQRqAIA1AkAYgSAMQpAEIZijOs3M+YtV3TZuPmHY9Ax150cCrSQMQpAEI0gAEaQCCNABBGoAgDUCQBiBIAxCkAQh3nqHYuU9+p53zEas+Z9o1X7FqFuPQ36G3BiBIAxCkAQjSAARpAII0AEEagCANQJAGIEgDEKQBCKfOUBz6v/23WbVv/8TZhytW3de0My8W8gcGBGkAgjQAQRqAIA1AkAYgSAMQpAEI0gAEaQCCNADh89AN3sBLeWsAgjQAQRqAIA1AkAYgSAMQpAEI0gAEaQCCNABBGoAgDUCQBiBIAxCkAQjSAARpAII0AEEagCANQJAGIEgDEKQBCNIABGkAgjQAQRqAIA1AkAYgSAMQpAEI0gAEaQCCNABBGoAgDUCQBiBIAxCkAQjSAARpAII0AEEagCANQJAGIEgDEKQBCNIAhL+LOfujjTKM6wAAAABJRU5ErkJggg==" alt=""></div>
                            <div class="view-count deep-orange lighten-5">Views <span>1289</span></div>
                            <button class="block btn-large orange darken-3 white-text">Feedback</button>
                        </div>
                    </div>
                    <div class="col s12 m8">
                        <div class="profile-details">
                            <div class="name">{{$memorial->first_name}} {{$memorial->middle_name}} {{$memorial->last_name}}</div>
                            <div class="sub-text">{{$memorial->birth_city}}, {{$memorial->by_birth->name}}</div>
                            <div class="born">Born {{$memorial->dob}}</div>
                            <div class="deceased">Decreased {{$memorial->passed_date}}</div>
                        </div>
                        <div class="row">
                            <div class="col s12">
                                <ul class="tabs">
                                    <li class="tab col s3"><a href="#profile-about">ABOUT</a></li>
                                    <li class="tab col s3"><a class="active" href="#profile-photos">PHOTOS</a></li>
                                    <li class="tab col s3"><a href="#profile-videos">VIDEOS</a></li>
                                    <li class="tab col s3"><a href="#profile-audio">AUDIO</a></li>
                                </ul>
                            </div>
                            <div class="col s12" id="profile-about">
                                <div class="about-block">
                                    <p>{{$memorial->personal_phrase}}</p>
                                    <div class="title-3">Family Details</div>
                                    @foreach ($memorial->family as $family)
                                    <div class="details-block">
                                        <div class="d-title">{{$family->mem_relation->name}}</div>
                                        <div class="text">{{$family->name}}</div>
                                    </div>
                                    @endforeach
                                    <div class="title-3">Educations</div>
                                    @foreach ($memorial->education as $education)
                                    <div class="details-block">
                                        <div class="d-title">{{$education->mem_course->name}}</div>
                                        <div class="text">{{$education->stream}}</div>
                                    </div>
                                    @endforeach
                                    <div class="title-3">Employment</div>
                                    @foreach ($memorial->position as $position)
                                    <div class="details-block">
                                        <div class="d-title">{{$position->positions}}</div>
                                        <div class="text">{{$position->organisation}}</div>
                                    </div>
                                    @endforeach
                                </div>
                                <hr class="hr-dashed mt-25">
                                <div class="tribute-block">
                                    <div class="heading">Light a candle</div>
                                    <div class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
                                </div>
                                <div class="tribute-form brown lighten-5">
                                    <div class="title-3">Right a tribute</div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <select>
                                                <option value="">Light a candle</option>
                                                <option value="">Lay a flower</option>
                                                <option value="">Leave a note</option>
                                            </select>
                                            <label>Tribute</label>
                                        </div>
                                        <div class="input-field col s12">
                                            <textarea class="materialize-textarea"></textarea>
                                            <label for="">Message</label>
                                        </div>
                                        <div class="col s12">
                                            <button class="btn brown darken-4 white-text">Send</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12" id="profile-photos">
                                <div class="p-10"></div>
                                <div id="imgGrid">
                                    <ul style="display: none">                                        
                                    @foreach ($memorial->photos as $photo)
                                    <li data-thumb="{{url($photo->media_url)}}" data-full="{{url($photo->media_url)}}"></li>
                                    <p>{{$photo->media_url}}</p>
                                    @endforeach
                                    </ul>
                                </div>
                                <div class="modal" id="modal1">
                                    <div class="modal-content"><img id="model-img" src=""></div>
                                </div>
                            </div>
                            <div class="col s12" id="profile-videos">
                                <div class="p-10"></div>
                                <iframe width="560" height="315" src="https://www.youtube.com/embed/zay7xGo4PYQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                            </div>
                            <div class="col s12" id="profile-audio"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-5"></div>
    </div>
    @endsection