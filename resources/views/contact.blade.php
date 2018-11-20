@extends('layouts.layout')

@section('main-content')
<div class="container">
        <h3 class="title">Contact Us</h3>
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="row">
                    <div class="col s12 input-field">
                        <input type="text">
                        <label class="no-click" for="">Your Name</label>
                    </div>
                    <div class="col s12 input-field">
                        <input type="text">
                        <label class="no-click" for="">Phone No</label>
                    </div>
                    <div class="col s12 input-field">
                        <input type="text">
                        <label class="no-click" for="">Email</label>
                    </div>
                    <div class="col s12 input-field">
                        <textarea class="auto-init materialize-textarea"></textarea>
                        <label class="no-click" for="">Your Message</label>
                    </div>
                    <div class="col s12 center-align">
                        <button class="btn brown darken-3 btn-large">SEND</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection