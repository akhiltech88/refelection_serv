@extends('layouts.layout')

@section('main-content')
<div class="container">
        <h3 class="title">Create a memorial</h3>
        <ul class="stepper linear" data-method="GET">
            <li class="step active">

<form id="memorialForm" enctype="multipart/form-data">
    <input type="hidden" id="cm_memorial" name="memorial_id" value="0">
                <div class="step-title waves-effect waves-dark">Memorial Details</div>
                <div class="step-content">
                    <div class="title-3">Personal Details</div>
                    <div class="row">
                        <div class="col s12 m4 input-field">
                            <input  type="text" name="first_name" class="validate reg_click" required="" aria-required="true">
                            <label class="no-click" for="">First Name</label>
                        </div>
                        <div class="col s12 m4 input-field">
                            <input  type="text" name="firstmiddle_name_name" class="validate reg_click">
                            <label class="no-click" for="">Middle Name</label>
                        </div>
                        <div class="col s12 m4 input-field">
                            <input  type="text" name="last_name" class="validate reg_click" required="" aria-required="true">
                            <label class="no-click" for="">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m4 input-field">
                            <input class="datepicker"  type="text" name="dob" class="validate reg_click" required="" aria-required="true">
                            <label class="no-click" for="">Date of Birth</label>
                        </div>
                        <div class="col s12 m4 input-field">
                            <select name="birth_country" class="validate reg_click" required="" aria-required="true">
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
                            <input  type="text" name="birth_city" class="validate reg_click" required="" aria-required="true">
                            <label class="no-click" for="">City of birth</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m4 input-field">
                            <input class="datepicker"  type="text" name="passed_date" class="validate reg_click" required="" aria-required="true">
                            <label class="no-click" for="">Date of Deceases</label>
                        </div>
                        <div class="col s12 m4 input-field">
                            <select type="text" name="passed_country" class="validate reg_click" required="" aria-required="true">
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
                            <input  type="text" name="passed_city" class="validate" required="" aria-required="true">
                            <label class="no-click" for="">City of Deceases</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m4 input-field">
                            <select name="gender" class="validate" required="" aria-required="true">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                                <option value="3">Others</option>
                            </select>
                            <label class="no-click" for="">Gender</label>
                        </div>
                        <div class="col s12 m4 file-field input-field">
                            <div class="btn"><span>File</span>
                                <input type="file" id="file" name="file" accept="image/*" class="validate" required="" aria-required="true">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate"  type="text" name="photo" placeholder="Personal Photograph">
                            </div>
                        </div>
                    </div>
                    <div class="title-3 mt-25">Family Details</div>
                    <div class="row" id="more_relation">
                        <div class="col s12 m6 input-field">
                            <input  type="text" name="relations_name[]" class="reg_click">
                            <label class="no-click" for="">Name</label>
                        </div>
                        <div class="col s12 m6 input-field with-control">
                            <select name="relations_id[]" class="reg_click">
                                @foreach ($relations as $relation)
                                <option value="{{$relation->id}}" source="{{$relation->name}}"
                                @if(old('relations_id') == $relation->id)
                                selected
                                @endif>{{$relation->name}}</option>
                                @endforeach
                            </select>
                            <label class="no-click" for="">Relation</label>
                            <div class="remove" onclick="family_remove()" style="cursor: pointer;"><i class="material-icons">close</i></div>
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
                            <input  type="text" class="reg_click" name="course_name[]">
                            <label class="no-click" for="">Course Completed</label>
                        </div>
                        <div class="col s12 m6 input-field with-control">
                            <select name="course_id[]" class="reg_click">
                                @foreach ($courses as $course)
                                <option value="{{$course->id}}" source="{{$course->name}}"
                                @if(old('course_id') == $course->id)
                                selected
                                @endif>{{$course->name}}</option>
                                @endforeach
                            </select>
                            <label class="no-click" for="">Course Completed</label>
                            <div class="remove" onclick="education_remove()" style="cursor: pointer;"><i class="material-icons">close</i></div>
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
                            <input class="organisation reg_click" type="text" name="organisation[]">
                            <label class="no-click" for="">Organization</label>
                        </div>
                        <div class="col s12 m6 input-field with-control">
                            <input class="position reg_click" type="text" name="position[]">
                            <label class="no-click" for="">Position</label>
                            <div class="remove" onclick="employment_remove()" style="cursor: pointer;"><i class="material-icons">close</i></div>
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
                            <textarea name="hobbies" class="auto-init materialize-textarea reg_click"></textarea>
                            <label class="no-click" for="">Hobbies &amp; Pastimes</label>
                        </div>
                    </div>
                    <div class="title-3 mt-25">Personal Phrase about the deceased( 1000 Words Max)</div>
                    <div class="row">
                        <div class="col s12 m12 input-field">
                            <textarea name="personal_phrase" class="auto-init materialize-textarea reg_click"></textarea>
                            <label class="no-click" for="">Personal Phrase about the deceased</label>
                        </div>
                    </div>
                    <div class="title-3 mt-25">Back Ground Music</div>
                    <div class="row">
                        <div class="col s12 m6 input-field">
                            <select id="music_id" name="music_id" class="reg_click">
                                @foreach ($musics as $music)
                                <option value="{{$music->id}}" source="{{$music->media_url}}"
                                @if(old('music_id') == $music->id)
                                selected
                                @endif>{{$music->name}}</option>
                                @endforeach
                            </select>
                            <label class="no-click" for="">Select memorial page background music</label>
                        </div>
                        <div class="col s12 m6 input-field">
                            <audio id="player" controls="controls">
                              <source id="mp3_src" src="" type="audio/mp3" />
                              Your browser does not support the audio element.
                            </audio>
                            <!-- <button class="waves-effect waves-light btn brown darken-4"><i class="material-icons left">play_arrow</i> Play</button> -->
                        </div>
                    </div>
                    <div class="title-3 mt-25">Memorial Page</div>
                    <div class="row">
                        <div class="col s12">
                            <label class="form-label">Select memorial page header background</label>
                            <div class="theme-chooser">
                                @foreach ($themes as $theme)
                                <div class="item">
                                    <label>
                                        <img src="{{$theme->theme_img}}" alt="" style="width: 100%;height: 100%"> 
                                        <input name="theme_id" type="radio" class="browser-default" value="{{$theme->id}}"></label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- <div class="hr-dotted mb-25 mt-15"></div> -->
                    <div class="title-3 mt-25">Relation</div>
                    <div class="row">
                        <div class="col s12 m6 input-field">
                            <select name="relation_id">
                                @foreach ($relations as $relation)
                                <option value="{{$relation->id}}" source="{{$relation->name}}"
                                @if(old('relation_id') == $relation->id)
                                selected
                                @endif>{{$relation->name}}</option>
                                @endforeach
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
                            @foreach ($packages as $package)
                            <p>
                                <label>
                                    <input name="package_id" type="radio" value="{{$package->id}}" checked=""  required="" aria-required="true"><span>Price : £ {{$package->price}} + vat , Duration : {{$package->years}} Years</span>
                                </label>
                            </p>
                            @endforeach
                        </div>
                    </div>
                    <div class="p-10"></div>
                    <div class="step-actions">
                          <input type="submit" name="submit" class="btn-large brown darken-3 white-text" value="Continue"/>
                        <!-- <button type="submit" class="waves-effect waves-dark btn brown darken-3 next-step" data-feedback="saveContinue">Continue</button> -->
                    </div>
                </div>
            </form>
            </li>
            <li class="step">
                <div class="step-title waves-effect waves-dark" id="step2">Memorial Gallery</div>
                <div class="step-content">
                    <div class="title-3">Add Photos</div>
                    <div class="row">
                        <form id="imageForm" enctype="multipart/form-data">
                            <input type="hidden" id="im_memorial" name="memorial_id" value="1">
                        <div class="col s12 m4 file-field input-field">
                            <div class="btn"><span>File</span>
                                <input type="file" id="userImage" name="userImage" accept="image/*">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" id="imageTxt"  type="text" placeholder="Select Photos">
                            </div>
                        </div>
                        <div class="col m2">
                            <button class="btn brown darken-3 mt-15" type="submit"><i class="material-icons">add</i></button>
                        </div>
                        </form>
                        <div class="col s12" id="showImages" style="display: none;">
                            <label class="form-label">Gallery Images</label>
                            <div class="theme-chooser" id="image_prepend">

                            </div>
                        </div>
                    </div>
                    <div id="vid_aud">
                    <div class="hr-dotted mb-25 mt-15"></div>
                    <div class="title-3">Add Videos</div>
                    <div class="row">
                        <form id="videoForm" enctype="multipart/form-data">
                        <input type="hidden" id="vid_memorial" name="memorial_id" value="1">
                        <div class="col s12 m6 input-field">
                            <input type="text" name="video_url">
                            <label class="no-click" for="">Video Url</label>
                        </div>
                        <div class="col m2">
                            <button class="btn brown darken-3 mt-15" type="submit"><i class="material-icons">add</i></button>
                        </div>
                        </form>
                    </div>
                    <div class="hr-dotted mb-25 mt-15"></div>
                    <div class="title-3">Add Audios</div>
                    <div class="row">
                        <form id="audioForm" enctype="multipart/form-data">
                            <input type="hidden" id="aud_memorial" name="memorial_id" value="1">
                        <div class="col s12 m4 file-field input-field">
                            <div class="btn"><span>File</span>
                                <input type="file" id="userAudio" id="au_memorial" name="userAudio" type="audio/mp3" accept="audio/*">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate"  type="text" name="first_name" placeholder="Select Audios">
                            </div>
                        </div>
                        <div class="col m2">
                            <button class="btn brown darken-3 mt-15" type="submit"><i class="material-icons">add</i></button>
                        </div>
                    </form>
                    </div>
                </div>
                <form method="post" action="{{ url('payments') }}">
                    <div class="hr-dotted mb-25 mt-15"></div>
                    <div class="step-actions">
                        <button class="waves-effect waves-dark btn-flat previous-step">BACK</button>
                        <button id="payment" class="waves-effect waves-dark btn brown darken-3 next-step">PAYMENT</button>
                    </div>
                </form>
                </div>
            </li>
        </ul>
        <div class="p-25"></div>
    </div>
    <script>
$(document).ready(function(e){
    $("#vid_aud").hide();
    //$("#continue").hide();
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
            headers: {
                users_id:localStorage.getItem("users_id"),
                access_token:localStorage.getItem("token")
            },
            success: function(msg){
                if(msg.success){
                    $( "#step2" ).trigger( "click" );
                    $("#cm_memorial").val(msg.memorial_id);
                    $("#im_memorial").val(msg.memorial_id);
                    $("#aud_memorial").val(msg.memorial_id);
                    $("#vid_memorial").val(msg.memorial_id);
                    if(msg.data==3){
                        $("#vid_aud").show();
                        $("#au_memorial").val(msg.memorial_id);
                    }else{
                        $("#vid_aud").hide();
                    }
                }
                /*$('.statusMsg').html('');
                if(msg == 'ok'){console.log(msg);
                    destroyFeedback(true);
                    $('#memorialForm')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                }
                $('#memorialForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");*/
            }
        });
        
    });
      
    $("#imageForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ url('image_upload') }}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
               // $('.submitBtn').attr("disabled","disabled");
               // $('#memorialForm').css("opacity",".5");
            },
            success: function(msg){
                if(msg.success=='true'){
                $("#showImages").show();
                $("#image_prepend").prepend(msg.data);
                $('#imageTxt').val("");
                $('#userImage').val("");
                }else{
                    alert(msg.message);
                }
            }
        });
    });
    $("#videoForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ url('video_upload') }}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
               // $('.submitBtn').attr("disabled","disabled");
               // $('#memorialForm').css("opacity",".5");
            },
            success: function(msg){
                if(msg.success=='false'){
                    alert(msg.message);
                }else{
                    
                }
            }
        });
    });
    $("#audioForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ url('audio_upload') }}",
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
                    $('#audioForm')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                }
                $('#audioForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
            }
        });
    });

    $("#payment").on('click', function(e){
    window.open('http://quiet-reflections.com/public/memorial-wall','_self');
    });

    $("#relation").click(function(){
        var clone = $("#more_relation").clone();
        var input= '<input  type="text" name="relations_name[]">';
        var select = clone.find('select').clone();
        clone.find('input').replaceWith(input);
        clone.find('.select-wrapper').replaceWith(select);
        $('.more_relation').append(clone);
        clone.find('select').formSelect();
    });
    $("#education").click(function(){
        var clone = $("#more_education").clone();
        var select = clone.find('select').clone();
        var input= '<input  type="text" name="course_name[]">';
        clone.find('input').replaceWith(input);
        clone.find('.select-wrapper').replaceWith(select);
        $('.more_education').append(clone);
        clone.find('select').formSelect();
    });
    $("#employment").click(function(){
        var clone = $("#more_employment").clone();
        //var select = clone.find('select').clone();
        var input= '<input class="organisation" type="text" name="organisation[]">';
        var input2= '<input class="position" type="text" name="position[]">';
        clone.find('.organisation').replaceWith(input);
        clone.find('.position').replaceWith(input2);
        //clone.find('.select-wrapper').replaceWith(select);
        $('.more_employment').append(clone);
        //clone.find('select').formSelect();
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
    change( $('#music_id option:selected').attr('source'));
    $('#music_id').on('change', function(){
        change( $('#music_id option:selected').attr('source'));
    });
    function change(sourceUrl) {
        var audio = document.getElementById("player"),
                source = document.getElementById("mp3_src");
        source.src = sourceUrl;
        audio.pause();
        audio.load();
        // audio.play();
     }
     $(".reg_click").click(function(){
        var name = localStorage.getItem("user_name");
        if (!name) {
        var elem = document.getElementById('auth_model');
        var auth_model_model = M.Modal.init(elem, {});
        auth_model_model.open();
        } 
     });
});
function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}
function employment_remove(){
    var in_length = $("[name='organisation[]']").length;
    if(in_length>1){
        $(event.target).closest("#more_employment").remove();       
    }else{
        alert("Need Minimum Fields!!");
    }
}
function education_remove(){
    var in_length = $("[name='course_name[]']").length;
    if(in_length>1){
        $(event.target).closest("#more_education").remove();       
    }else{
        alert("Need Minimum Fields!!");
    }
}
function family_remove(){
    var in_length = $("[name='relations_name[]']").length;
    if(in_length>1){
        $(event.target).closest("#more_relation").remove();
    }else{
        alert("Need Minimum Fields!!");
    }
}


function saveContinue(destroyFeedback) {
    /*$("#memorialForm").on('submit', function(e){
        e.preventDefault();alert(2);*/
        var $form = $("#memorialForm");
var data = getFormData($form);
        console.log(data);
    $.ajax({
            type: "POST",
            url: "{{ url('memorials') }}",
            data: $("#memorialForm").serialize(),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
               // $('.submitBtn').attr("disabled","disabled");
               // $('#memorialForm').css("opacity",".5");
            },
            success: function(msg){console.log(msg);
                /*$('.statusMsg').html('');
                if(msg == 'ok'){console.log(msg);
                    destroyFeedback(true);
                    $('#memorialForm')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Form data submitted successfully.</span>');
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Some problem occurred, please try again.</span>');
                }
                $('#memorialForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");*/
            }
        });
//});
}
</script>
@endsection