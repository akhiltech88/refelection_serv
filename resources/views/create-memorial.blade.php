@extends('layouts.layout')

@section('main-content')
<div class="container">
        <h3 class="title">Create a memorial</h3>
        <ul class="stepper linear" data-method="GET">
            <li class="step active">

<form id="memorialForm" enctype="multipart/form-data">
                <div class="step-title waves-effect waves-dark">Memorial Details</div>
                <div class="step-content">
                    <div class="title-3">Personal Details</div>
                    <div class="row">
                        <div class="col s12 m4 input-field">
                            <input  type="text" name="first_name">
                            <label class="no-click" for="">First Name</label>
                        </div>
                        <div class="col s12 m4 input-field">
                            <input  type="text" name="firstmiddle_name_name">
                            <label class="no-click" for="">Middle Name</label>
                        </div>
                        <div class="col s12 m4 input-field">
                            <input  type="text" name="last_name">
                            <label class="no-click" for="">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m4 input-field">
                            <input class="datepicker"  type="text" name="dob">
                            <label class="no-click" for="">Date of Birth</label>
                        </div>
                        <div class="col s12 m4 input-field">
                            <select name="birth_country">
                                @foreach ($countries as $country)
                                <option value="{{$country->id}}" source="{{$country->name}}"
                                @if(old('birth_country') == $country->id)
                                selected
                                @endif>{{$country->name}}</option>
                                @endforeach
                            </select>
                            <label class="no-click" for="">Country of birth</label>
                        </div>
                        <div class="col s12 m4 input-field">
                            <input  type="text" name="birth_city">
                            <label class="no-click" for="">City of birth</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m4 input-field">
                            <input class="datepicker"  type="text" name="passed_date">
                            <label class="no-click" for="">Date of Deceases</label>
                        </div>
                        <div class="col s12 m4 input-field">
                            <select type="text" name="passed_country">
                                @foreach ($countries as $country)
                                <option value="{{$country->id}}" source="{{$country->name}}"
                                @if(old('passed_country') == $country->id)
                                selected
                                @endif>{{$country->name}}</option>
                                @endforeach
                            </select>
                            <label class="no-click" for="">Country of Deceases</label>
                        </div>
                        <div class="col s12 m4 input-field">
                            <input  type="text" name="passed_city">
                            <label class="no-click" for="">City of Deceases</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m4 input-field">
                            <select name="gender">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Others</option>
                            </select>
                            <label class="no-click" for="">Gender</label>
                        </div>
                        <div class="col s12 m4 file-field input-field">
                            <div class="btn"><span>File</span>
                                <input type="file" type="text" id="file" name="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate"  type="text" name="photo" placeholder="Personal Photograph">
                            </div>
                        </div>
                    </div>
                    <div class="title-3 mt-25">Family Details</div>
                    <div class="row" id="more_relation">
                        <div class="col s12 m6 input-field">
                            <input  type="text" name="relations_name[]">
                            <label class="no-click" for="">Name</label>
                        </div>
                        <div class="col s12 m6 input-field with-control">
                            <select name="relations_id[]">
                                @foreach ($relations as $relation)
                                <option value="{{$relation->id}}" source="{{$relation->name}}"
                                @if(old('relations_id') == $relation->id)
                                selected
                                @endif>{{$relation->name}}</option>
                                @endforeach
                            </select>
                            <label class="no-click" for="">Relation</label>
                            <div class="remove"><i class="material-icons">close</i></div>
                        </div>
                    </div>
                    <div class="more_relation"></div>
                    <div class="row">
                        <div class="col s12 m12 right-align">
                            <button id="relation" class="btn brown darken-3" type="button"><i class="material-icons">add</i></button>
                        </div>
                    </div>
                    <div class="title-3 mt-25">Education</div>
                    <div class="row" id="more_education">
                        <div class="col s12 m6 input-field">
                            <input  type="text" name="course_name[]">
                            <label class="no-click" for="">Course Completed</label>
                        </div>
                        <div class="col s12 m6 input-field with-control">
                            <select name="course_id[]">
                                <option value="1">School</option>
                                <option value="2">College</option>
                                <option value="3">PG</option>
                            </select>
                            <label class="no-click" for="">Course Completed</label>
                            <div class="remove"><i class="material-icons">close</i></div>
                        </div>
                    </div>
                    <div class="more_education"></div>
                    <div class="row">
                        <div class="col s12 m12 right-align">
                            <button id="education" class="btn brown darken-3" type="button"><i class="material-icons">add</i></button>
                        </div>
                    </div>
                    <div class="title-3 mt-25">Employment</div>
                    <div class="row" id="more_employment">
                        <div class="col s12 m6 input-field">
                            <input  type="text" name="organisation[]">
                            <label class="no-click" for="">Organization</label>
                        </div>
                        <div class="col s12 m6 input-field with-control">
                            <select name="positions_id[]">
                                <option value="1">Major</option>
                                <option value="2">Manager</option>
                                <option value="3">Teacher</option>
                            </select>
                            <label class="no-click" for="">Position</label>
                            <div class="remove"><i class="material-icons">close</i></div>
                        </div>
                    </div>
                    <div class="more_employment"></div>
                    <div class="row">
                        <div class="col s12 m12 right-align">
                            <button id="employment" class="btn brown darken-3" type="button"><i class="material-icons">add</i></button>
                        </div>
                    </div>
                    <div class="title-3 mt-25">Hobbies &amp; Pastimes (100 Words Max)</div>
                    <div class="row">
                        <div class="col s12 m12 input-field">
                            <textarea name="hobbies" class="auto-init materialize-textarea"></textarea>
                            <label class="no-click" for="">Hobbies &amp; Pastimes</label>
                        </div>
                    </div>
                    <div class="title-3 mt-25">Personal Phrase about the deceased( 1000 Words Max)</div>
                    <div class="row">
                        <div class="col s12 m12 input-field">
                            <textarea name="personal_phrase" class="auto-init materialize-textarea"></textarea>
                            <label class="no-click" for="">Personal Phrase about the deceased</label>
                        </div>
                    </div>
                    <div class="title-3 mt-25">Memorial Page</div>
                    <div class="row">
                        <div class="col s12 m6 input-field">
                            <select name="music_id">
                                <option value="1">Song 1</option>
                                <option value="2">Song 2</option>
                                <option value="3">Song 3</option>
                            </select>
                            <label class="no-click" for="">Select memorial page background music</label>
                        </div>
                        <div class="col s12 m6 input-field">
                            <button class="waves-effect waves-light btn brown darken-4"><i class="material-icons left">play_arrow</i> Play</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <label class="form-label">Select memorial page header background</label>
                            <div class="theme-chooser">
                                <div class="item active"><img src="https://placeimg.com/300/150/nature/1" alt=""></div>
                                <div class="item"><img src="https://placeimg.com/300/150/nature/2" alt=""></div>
                                <div class="item"><img src="https://placeimg.com/300/150/nature/3" alt=""></div>
                                <div class="item"><img src="https://placeimg.com/300/150/nature/4" alt=""></div>
                                <div class="item"><img src="https://placeimg.com/300/150/nature/5" alt=""></div>
                                <div class="item"><img src="https://placeimg.com/300/150/nature/6" alt=""></div>
                            </div>
                        </div>
                    </div>
                    <div class="hr-dotted mb-25 mt-15"></div>
                    <div class="row">
                        <div class="col s12 m6 offset-m3 input-field">
                            <select name="relation_id">
                                <option value="1">Brother</option>
                                <option value="2">Sister</option>
                                <option value="2">Son</option>
                                <option value="2">Daughter</option>
                            </select>
                            <label class="no-click" for="">Submitter's relationship with the deceased</label>
                        </div>
                        <div class="col s12 m6 offset-m3 center-align">
                            <label>
                                <input class="filled-in" type="checkbox" checked="checked"><span>Agree with <a href="#">Terms and Conditions</a></span>
                            </label>
                        </div>
                    </div>
                    <div class="hr-dotted mb-25"></div>
                    <div class="title-3">Memorial Options</div>
                    <div class="row">
                        <div class="col s12">
                            <div class="mb-10">
                                <label class="form-label">Choose any one of option form below</label>
                            </div>
                            <p>
                                <label>
                                    <input name="plan" type="radio" checked=""><span>Price : £ 299 (£ 1.92 per week), Duration : 3 Years</span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input name="plan" type="radio"><span>Price : £405 (£1.56 per week), Duration: 5 Years</span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input name="plan" type="radio"><span>Price : £520 (£1 per week), Duration : 10 Year</span>
                                </label>
                            </p>
                        </div>
                    </div>
                    <div class="p-10"></div>
                    <div class="step-actions">
                        <input type="submit" name="submit" class="btn btn-danger submitBtn" value="SAVE"/>
                        <button type="submit" class="waves-effect waves-dark btn brown darken-3 next-step" data-feedback="anyThing">Continue</button>
                    </div>
                </div>
            </form>
            </li>
            <li class="step">
                <div class="step-title waves-effect waves-dark">Memorial Gallery</div>
                <div class="step-content">
                    <div class="title-3">Add Photos</div>
                    <div class="row">
                        <div class="col s12 m4 file-field input-field">
                            <div class="btn"><span>File</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate"  type="text" name="first_name" placeholder="Select Photos">
                            </div>
                        </div>
                        <div class="col m2">
                            <button class="btn brown darken-3 mt-15"><i class="material-icons">add</i></button>
                        </div>
                    </div>
                    <div class="hr-dotted mb-25 mt-15"></div>
                    <div class="title-3">Add Videos</div>
                    <div class="row">
                        <div class="col s12 m4 file-field input-field">
                            <div class="btn"><span>File</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate"  type="text" name="first_name" placeholder="Select Videos">
                            </div>
                        </div>
                    </div>
                    <div class="hr-dotted mb-25 mt-15"></div>
                    <div class="title-3">Add Audios</div>
                    <div class="row">
                        <div class="col s12 m4 file-field input-field">
                            <div class="btn"><span>File</span>
                                <input type="file">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate"  type="text" name="first_name" placeholder="Select Audios">
                            </div>
                        </div>
                    </div>
                    <div class="hr-dotted mb-25 mt-15"></div>
                    <div class="step-actions">
                        <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                        <button class="waves-effect waves-dark btn brown darken-3 next-step">PAYMENT</button>
                    </div>
                </div>
            </li>
        </ul>
        <div class="p-25"></div>
    </div>
    <div class="modal modal-fixed-footer" id="register">
        <div class="modal-content">
            <h4>Register</h4>
            <p>Please register to continue</p>
            <div class="row">
                <div class="input-field col s12"><i class="material-icons prefix">account_circle</i>
                    <input class="validate" id="first_name"  type="text" name="first_name">
                    <label for="first_name">Name</label>
                </div>
                <div class="input-field col s12"><i class="material-icons prefix">mail_outline</i>
                    <input class="validate" id="email" type="email">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12"><i class="material-icons prefix">lock</i>
                    <input class="validate" id="pass" type="password">
                    <label for="pass">Password</label>
                </div>
                <div class="input-field col s12"><i class="material-icons prefix">lock</i>
                    <input class="validate" id="c_pass" type="password">
                    <label for="c_pass">Confirm Password</label>
                </div>
            </div>
        </div>
        <div class="modal-footer"><a class="modal-close waves-effect waves-green btn-flat" href="#!">SEND</a></div>
    </div>
    <script>
        $(function() {
            var elems = document.getElementById('register');
            var register_model = M.Modal.init(elems, {});
            $('#save_btn').click(function() {
                register_model.open();
            })
        })
    </script>
    <script>
$(document).ready(function(e){
    $("#memorialForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ url('memorials') }}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
               // $('.submitBtn').attr("disabled","disabled");
               // $('#memorialForm').css("opacity",".5");
            },
            success: function(msg){
                $('.statusMsg').html('');
                if(msg == 'ok'){
                    $('#memorialForm')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                }
                $('#memorialForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });

    $("#relation").click(function(){
        var clone = $("#more_relation").clone();
        var select = clone.find('select').clone();
        clone.find('.select-wrapper').replaceWith(select);
        $('.more_relation').append(clone);
        clone.find('select').formSelect();
    });
    $("#education").click(function(){
        var clone = $("#more_education").clone();
        var select = clone.find('select').clone();
        clone.find('.select-wrapper').replaceWith(select);
        $('.more_education').append(clone);
        clone.find('select').formSelect();
    });
    $("#employment").click(function(){
        var clone = $("#more_employment").clone();
        var select = clone.find('select').clone();
        clone.find('.select-wrapper').replaceWith(select);
        $('.more_employment').append(clone);
        clone.find('select').formSelect();
    });
    
    //file type validation
    $("#file").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('Please select a valid image file (JPEG/JPG/PNG).');
            $("#file").val('');
            return false;
        }
    });
});
</script>
@endsection