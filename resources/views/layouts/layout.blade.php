<!DOCTYPE html>
<html lan="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Quiet-Reflections</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700|Roboto:300,400,500,700">
    <link rel="stylesheet" href="{{ asset('css/materialize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stepper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/materialize.min.js') }}"></script>
    <script src="{{ asset('js/mosaic.js') }}"></script>
    <script src="{{ asset('js/stepper.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</head>

<body>
    <div class="nav-control-bar white">
        <div class="container">
            <div class="search-box ml-auto">
                <input class="browser-default" type="text" placeholder="Search">
            </div><a id="log_name1" class="orange-text">Login</a> <a id="login_btn" class="orange-text">Login</a>
        </div>
    </div>
    <nav class="white" role="navigation">
        <div class="nav-wrapper container"><a class="brand-logo" id="logo-container" href="#"> <img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ url('/') }}">HOME</a></li>
                <li><a href="{{ url('about-us') }}">ABOUT</a></li>
                <li><a href="{{ url('price') }}">PRICE &amp; FEATURES</a></li>
                <li><a href="{{ url('create-memorials') }}">CREATE MEMORIAL</a></li>
                <li><a href="{{ url('memorial-wall') }}">MEMORIAL WALL</a></li>
                <li><a href="{{ url('contact') }}">CONTACT</a></li>
            </ul>
            <ul class="sidenav" id="nav-mobile">
                <li><a href="{{ url('/') }}">HOME</a></li>
                <li><a href="{{ url('about-us') }}">ABOUT</a></li>
                <li><a href="{{ url('price') }}">PRICE &amp; FEATURES</a></li>
                <li><a href="{{ url('create-memorials') }}">CREATE MEMORIAL</a></li>
                <li><a href="{{ url('memorial-wall') }}">MEMORIAL WALL</a></li>
                <li><a href="{{ url('contact') }}">CONTACT</a></li>
            </ul><a class="sidenav-trigger" href="#" data-target="nav-mobile"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    @yield('main-content')
    <div class="modal" id="auth_model">
        <div class="modal-content auth-box">
            <div class="row mb-0">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s6"><a class="active" href="#login-box">LOGIN</a></li>
                        <li class="tab col s6"><a class="active" href="#register-box">REGISTER</a></li>
                    </ul>
                </div>
                <div class="col s12" id="login-box">
                    <form id="loginForm">
                    <div class="row mb-0">
                        <div class="input-field col s12"><i class="material-icons prefix">mail_outline</i>
                            <input class="validate" id="login_email" type="email" name="email">
                            <label for="login_email">Email</label>
                        </div>
                        <div class="input-field col s12"><i class="material-icons prefix">lock</i>
                            <input class="validate" id="login_pass" type="password" name="password">
                            <label for="login_pass">Password</label>
                        </div>
                        <div class="col s12 text-center mt-10">
                            <button class="btn btn-large block brown darken-3">LOGIN</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="col s12" id="register-box">
                    <form id="registerForm">
                    <div class="row mb-0">
                        <div class="input-field col s12"><i class="material-icons prefix">account_circle</i>
                            <input class="validate" id="name" name="name" type="text">
                            <label for="r_first_name">Name</label>
                        </div>
                        <div class="input-field col s12"><i class="material-icons prefix">mail_outline</i>
                            <input class="validate" id="email" type="email" name="email">
                            <label for="r_email">Email</label>
                        </div>
                        <div class="input-field col s12"><i class="material-icons prefix">lock</i>
                            <input class="validate" id="password" type="password" name="password">
                            <label for="r_pass">Password</label>
                        </div>
                        <div class="input-field col s12"><i class="material-icons prefix">lock</i>
                            <input class="validate" id="c_password" type="password" name="c_password">
                            <label for="r_c_pass">Confirm Password</label>
                        </div>
                        <div class="col s12 text-center mt-10">
                            <button class="btn btn-large block brown darken-3">REGISTER</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <footer class="page-footer white">
        <div class="container">
            <div class="row">
                <div class="col s12 l4">
                    <div class="footer-logo"><img src="{{ asset('images/logo.png') }}" alt="Logo"></div>
                    <div class="p-10"></div>
                </div>
                <div class="col s12 l4 center"><a class="btn-large brown darken-4 white-text" href="{{ url('memorial-wall') }}">Browse Memorials</a>
                    <div class="p-10"></div>
                </div>
                <div class="col s12 l4 right-align">
                    <div class="brown-text text-darken-3">enquiry@quiet-­reflections.com</div>
                    <div class="brown-text text-darken-3">+44 ­ (0)11 22334455</div>
                </div>
            </div>
        </div>
        <div class="footer-copyright brown darken-4">
            <div class="container">
                <div class="row">
                    <div class="col m6">© 2019 Quiet­Reflections 2018</div>
                    <div class="col m6 right-align"><a class="grey-text text-lighten-4" href="#!">Privacy Policy </a><a class="grey-text text-lighten-4" href="#!">Terms of Use</a></div>
                </div>
            </div>
        </div>
    </footer>
    <script>
        login_check();
    $(document).ready(function(e){
        $("#registerForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ url('register') }}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
               // $('.submitBtn').attr("disabled","disabled");
               // $('#memorialForm').css("opacity",".5");
            },
            success: function(msg){
                if(msg.success){
                    localStorage.setItem("token", msg.data.api_token);
                    localStorage.setItem("user_name", msg.data.name);
                    localStorage.setItem("users_id", msg.data.id);
                    login_check();
                }
            }
        });
        
    });  
    });
    $(document).ready(function(e){
        $("#loginForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ url('login') }}",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
               // $('.submitBtn').attr("disabled","disabled");
               // $('#memorialForm').css("opacity",".5");
            },
            success: function(msg){
                if(msg.success){
                    localStorage.setItem("token", msg.data.api_token);
                    localStorage.setItem("user_name", msg.data.name);
                    localStorage.setItem("users_id", msg.data.id);
                    login_check();                    
                }
            }
        });
        
    });  
    });
    function login_check(){
        $('#log_name1').hide();
        $('#login_btn').hide();
        var name = localStorage.getItem("user_name");
        if (name!=null) {
            $('#log_name1').show();
            $('#log_name1').html(name);
            var elem = document.getElementById('auth_model');
            var auth_model_model = M.Modal.init(elem, {});
            auth_model_model.close();
        } else {
            $('#login_btn').show();
        }
    }
    $(function()  {
        var elem = document.getElementById('auth_model');
        var auth_model_model = M.Modal.init(elem, {});
        $('#login_btn').click(function() {
            auth_model_model.open();
        })
    })
    </script>
</body>

</html>