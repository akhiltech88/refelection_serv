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
    <link rel="stylesheet" href="css/materialize.css">
    <link rel="stylesheet" href="css/stepper.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/materialize.min.js"></script>
    <script src="js/mosaic.js"></script>
    <script src="js/stepper.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/script.js"></script>
</head>

<body>
    <div class="nav-control-bar white">
        <div class="container">
            <div class="search-box ml-auto">
                <input class="browser-default" type="text" placeholder="Search">
            </div><a class="orange-text">Login</a>
        </div>
    </div>
    <nav class="white" role="navigation">
        <div class="nav-wrapper container"><a class="brand-logo" id="logo-container" href="#"> <img src="images/logo.png" alt="Logo"></a>
            <ul class="right hide-on-med-and-down">
                <li><a href="index.html">HOME</a></li>
                <li><a href="about-us.html">ABOUT</a></li>
                <li><a href="price.html">PRICE &amp; FEATURES</a></li>
                <li><a href="{{ url('create-memorials') }}">CREATE MEMORIAL</a></li>
                <li><a href="memorial-wall.html">MEMORIAL WALL</a></li>
                <li><a href="contact.html">CONTACT</a></li>
            </ul>
            <ul class="sidenav" id="nav-mobile">
                <li><a href="index.html">HOME</a></li>
                <li><a href="about-us.html">ABOUT</a></li>
                <li><a href="price.html">PRICE &amp; FEATURES</a></li>
                <li><a href="create.html">CREATE MEMORIAL</a></li>
                <li><a href="memorial-wall.html">MEMORIAL WALL</a></li>
                <li><a href="contact.html">CONTACT</a></li>
            </ul><a class="sidenav-trigger" href="#" data-target="nav-mobile"><i class="material-icons">menu</i></a>
        </div>
    </nav>
    @yield('main-content')
    <footer class="page-footer white">
        <div class="container">
            <div class="row">
                <div class="col s12 l4">
                    <div class="footer-logo"><img src="images/logo.png" alt="Logo"></div>
                    <div class="p-10"></div>
                </div>
                <div class="col s12 l4 center"><a class="btn-large brown darken-4 white-text" href="memorial-wall.html">Browse Memorials</a>
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
</body>

</html>