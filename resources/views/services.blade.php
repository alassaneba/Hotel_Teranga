<!DOCTYPE html>
<html lang="en">

<head>
    <title>Services - Hotel Teranga</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT:400,700&display=swap" rel="stylesheet">

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
</head>

<body>
<!--Debut nav-->
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">Hotel<span>Teranga</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="home" class="nav-link">Accueil</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reservation</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="reservationchambre">Chambre</a>
                        <a class="dropdown-item" href="reservationevenement">Evenement</a>
                    </div>
                </li>
                <li class="nav-item"><a href="a-propos" class="nav-link">A propos</a></li>
                <li class="nav-item active"><a href="services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
<section class="hero-wrap hero-wrap-2" style="background-image:url({{asset('app-assets/images/renai.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row slider-text justify-content-center align-items-center">
            <div class="col-md-7 col-sm-12 text-center ftco-animate">
                <h1 class="mb-3 mt-5 bread"> Services supplementaires </h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-services">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-lg-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span><img src="{{asset('app-assets/images/Sleep.png')}}"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading"><a href="services.html">Hebergement</a></h3>
                        <p>Nous disposons des chambres propres modernes adaptees a vos besoins.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span> <image src="{{asset('app-assets/images/conf1.png')}}">  </span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading"><a href="services.html">Evenementiel</a></h3>
                        <p>Nous disposons des salles modernes et des espaces adaptes a vos besoins.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span><image src="{{asset('app-assets/images/resto1.png')}}"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading"><a href="services.html">Restauration</a></h3>
                        <p> Un menu avec une alimentation saine et varies pour vous donner le gout de nos plats appetissants.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-fashion"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading"><a href="services.html">Pressing</a></h3>
                        <p>Un service de lavage professionnelle rapide equiper de machine moderne pour vous servir.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-7 heading-section ftco-animate text-center">
            <h1 class="mb-4">RESTAURATION</h1>
            <p>Voici une liste des meilleurs chambres disponible de notre catalogue.</p>
        </div>
    </div>
</div>
<div class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('app-assets/images/resto1.jpg')}});"></div>
            <div class="col-md-6 py-5 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section pt-md-5">
                    <span class="subheading text-center">RESTAURATION</span>
                    <h1 class="mb-4 text-center">Geographie et climat</h1>
                </div>
                <div class="pb-md-5">
                    <P>Hotel Teranga est une chaine d'hotel 5 étoiles présent au Sénégal: Dakar, Thies, Saint-louis et Cap skiring.</P>
                    <p>Le Sénégal est un pays situé sur la côte ouest de l'Afrique et doté d'un héritage colonial français et de nombreuses attractions naturelles.<br></P>
                    <p>Dakar, la capitale, comprend le quartier historique de la Médina et le célèbre musée Théodore Monod, exposant des œuvres d'art africain. Elle est également réputée pour sa vie nocturne, centrée sur la musique mbalax, originaire du Sénégal. l'île de Gorée accueille le musée et mémorial de « la Maison des Esclaves ». Cette petite île a un charme fou avec ses maisons pastel, ses  resto, mais ce refuge de détente nous rappelle le rôle de Gorée dans le passé et les souffrances de la traite des noirs. Une visite guidée de cette maison des esclaves, vous plonge directement dans l'histoire déplorable de la traite négrière.<br></P>
                    <p>Thies sur la route de Saint-Louis, à 70 km au nord-est de Dakar en passant dans une magnifique forêt d'anacardiers ou en empruntant la nouvelle route à péage, Thiès est la capitale de la région ouest, voire de tout le Centre-Ouest - et la deuxième ville du Sénégal. Sur la côte en direction de la réserve de biosphère du parc national du delta du Saloum se trouvent les stations balnéaires de la Petite-Côte.<br></P>
                    <P>Saint-Louis, ancienne capitale de l'Afrique-Occidentale française, abrite une vieille ville à l'architecture coloniale. La région est idéale pour les amoureux de la nature et des oiseaux. La biodiversité du Delta du fleuve Sénégal suggère des excursions étonnantes. Le parc national des oiseaux du Djoudj, sanctuaire de terres humides abritant flamands roses, pélicans et oiseaux migrateurs sur la zone de Thiolene et rives du Lampsar. Le Saint-Louis Jazz (dates variables, mai/juin) est un festival de jazz international de longue date.<br></p>
                    <P>Le Cap Skirring est un cap à l'extrémité sud-ouest du Sénégal dans le département d'Oussouye et la région de Ziguinchor, en Casamance. C'est également un village situé à proximité immédiate du cap et à environ 70 km de Ziguinchor. Il fait partie de la communauté rurale de Diembéring, dans l'arrondissement de Kabrousse, le département d'Oussouye et la région de Ziguinchor.</P>
                    <p>Les températures sont chaudes toute l'année, avec un temps caniculaire, venteux et humide pendant la saison des pluies (juin-oct).</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">PRESSING</h2>
                <p>Un service de lavage professionnelle rapide equiper de machine moderne pour vous servir.</p>
            </div>
        </div>
        <div class="ftco-section ftco-no-pb ftco-no-pt bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('app-assets/images/pressing.jpg')}});"></div>
                    <div class="col-md-6 py-5 wrap-about pb-md-5 ftco-animate">
                        <div class="heading-section pt-md-5">
                            <span class="subheading text-center">PRESSING</span>
                            <h1 class="mb-4 text-center">Geographie et climat</h1>
                        </div>
                        <div class="pb-md-5">
                            <P>Hotel Teranga est une chaine d'hotel 5 étoiles présent au Sénégal: Dakar, Thies, Saint-louis et Cap skiring.</P>
                            <p>Le Sénégal est un pays situé sur la côte ouest de l'Afrique et doté d'un héritage colonial français et de nombreuses attractions naturelles.<br></P>
                            <p>Dakar, la capitale, comprend le quartier historique de la Médina et le célèbre musée Théodore Monod, exposant des œuvres d'art africain. Elle est également réputée pour sa vie nocturne, centrée sur la musique mbalax, originaire du Sénégal. l'île de Gorée accueille le musée et mémorial de « la Maison des Esclaves ». Cette petite île a un charme fou avec ses maisons pastel, ses  resto, mais ce refuge de détente nous rappelle le rôle de Gorée dans le passé et les souffrances de la traite des noirs. Une visite guidée de cette maison des esclaves, vous plonge directement dans l'histoire déplorable de la traite négrière.<br></P>
                            <p>Thies sur la route de Saint-Louis, à 70 km au nord-est de Dakar en passant dans une magnifique forêt d'anacardiers ou en empruntant la nouvelle route à péage, Thiès est la capitale de la région ouest, voire de tout le Centre-Ouest - et la deuxième ville du Sénégal. Sur la côte en direction de la réserve de biosphère du parc national du delta du Saloum se trouvent les stations balnéaires de la Petite-Côte.<br></P>
                            <P>Saint-Louis, ancienne capitale de l'Afrique-Occidentale française, abrite une vieille ville à l'architecture coloniale. La région est idéale pour les amoureux de la nature et des oiseaux. La biodiversité du Delta du fleuve Sénégal suggère des excursions étonnantes. Le parc national des oiseaux du Djoudj, sanctuaire de terres humides abritant flamands roses, pélicans et oiseaux migrateurs sur la zone de Thiolene et rives du Lampsar. Le Saint-Louis Jazz (dates variables, mai/juin) est un festival de jazz international de longue date.<br></p>
                            <P>Le Cap Skirring est un cap à l'extrémité sud-ouest du Sénégal dans le département d'Oussouye et la région de Ziguinchor, en Casamance. C'est également un village situé à proximité immédiate du cap et à environ 70 km de Ziguinchor. Il fait partie de la communauté rurale de Diembéring, dans l'arrondissement de Kabrousse, le département d'Oussouye et la région de Ziguinchor.</P>
                            <p>Les températures sont chaudes toute l'année, avec un temps caniculaire, venteux et humide pendant la saison des pluies (juin-oct).</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
                        <li><a href="/reservationchambre">Reserver une chambre</a></li>
                        <li><a href="/reservationevenement">Reserver un evenement</a></li>
                        <li><a href="/services">Restauration</a></li>
                        <li><a href="/services">Pressing</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">LIENS</h2>
                    <ul class="list-unstyled">
                        <li><a href="/home#ccr">Catégories recommandées</a></li>
                        <li><a href="/home#tcvv">Evenementiel</a></li>
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

                <p>

                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());

                    </script> TOUS DROITS RESERVES | Ce site web est cree avec <i class="icon-heart" aria-hidden="true"></i> par Al Assane BA avec <a href="https://galimatech.com" target="_blank">Galima Tech</a>

                </p>
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
<script src="{{asset('app-assets/js/scrollax.min.js')}}"></script>
<script src="{{asset('app-assets/js/main.js')}}"></script>

</body>

</html>
