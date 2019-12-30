<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hotel Teranga</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('app-assets/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/aos.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/jquery.timepicker.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/resources/demos/style.css')}}">
    <link rel="stylesheet" href="{{asset('app-assets/css/lay.css')}}">
</head>
<body style="padding-top: 50px">
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="html">Hotel<span>Teranga</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.html" class="nav-link">Accueil</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Reservation chambre</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Reservation evenement</a></li>
                <li class="nav-item"><a href="a-propos" class="nav-link">A propos</a></li>
                <li class="nav-item"><a href="services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
<div class="container" style="padding-top: 20px">
@yield('content')
</div>
<!-- Start footer -->
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5 d-flex">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">A PROPOS</h2>
                    <p>Nous somme une chaine d'hotel 5 étoiles présent au Sénégal: Dakar, Thies, Saint-louis et Cap skiring. </p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">SERVICES</h2>
                    <ul class="list-unstyled">
                        <li><a href="#cuc">Chercher une chambre</a></li>
                        <li><a href="services.html">Salle de Conference</a></li>
                        <li><a href="services.html">Salon de beauté</a></li>
                        <li><a href="services.html">Pressing</a></li>
                        <li><a href="services.html">Restaurant</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">LIENS</h2>
                    <ul class="list-unstyled">
                        <li><a href="#cuc">Reservation Hebergement</a></li>
                        <li><a href="#ccr">Catégories recommandées</a></li>
                        <li><a href="#tcvv">Tendances chambres vip en vogue</a></li>
                        <li><a href="#">Terms &amp; Conditions</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">VOS QUESTIONS ?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">122 Cite millionnaire, Grand Yoff, Dakar, SENEGAL</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">+221 77 594 59 24</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope"></span><span class="text">azouone@gmail.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> TOUS DROITS RESERVES | Ce site web est cree avec <i class="icon-heart" aria-hidden="true"></i> par Al Assane BA avec <a href="https://galimatech.com" target="_blank">Galima Tech</a></p>
            </div>
        </div>
    </div>
</footer>

<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
        <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
        <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" /></svg></div>

<script src="{{asset('app-assets/js/jquery.min.js')}}"></script>
<script src="{{asset('app-assets/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('app-assets/js/popper.min.js')}}"></script>
<script src="{{asset('app-assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('app-assets/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('app-assets/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('app-assets/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('app-assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('app-assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('app-assets/js/aos.js')}}"></script>
<script src="{{asset('app-assets/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('app-assets/js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('app-assets/js/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('app-assets/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('app-assets/js/google-map.js')}}"></script>
<script src="{{asset('app-assets/js/main.js')}}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>$( function() {$( "#datepicker" ).datepicker();} );</script>

</body>

</html>
