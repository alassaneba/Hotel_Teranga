<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hotel Teranga</title>
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('app-assets/resources/demos/style.css')}}">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="home">Hotel<span>Teranga</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="home" class="nav-link">Accueil</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reservation</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="reservationchambre">Chambre</a>
                        <a class="dropdown-item" href="reservationevenement">Evenement</a>
                    </div>
                </li>
                <li class="nav-item"><a href="a-propos" class="nav-link">A propos</a></li>
                <li class="nav-item"><a href="services" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="contact" class="nav-link">Contact</a></li>
                @can('admin')<li class="nav-item"><a href="/admin/">Back Office</a></li>@endcan
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Se connecter') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
                                {{ __('Deconnecter') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
<section class="hero-wrap d-flex js-fullheight" style="background:url({{asset('app-assets/images/renai.jpg')}});height: 639px;background-position: top;background-size: cover;">
    <div class="overlay"></div>
    <div class="forth js-fullheight d-flex align-items-center">
        <div class="text text-center">
            <span class="subheading">Bienvenu chez Hotel Teranga</span>
            <h1>Un sejour agreable vous est offert chez nous !</h1>
            <h2 class="mb-5">Nous sommes une chaine d'hotel present au Senegal</h2>
            <p><a href="contact" class="btn-custom py-3 pr-2">Contactez-Nous</a></p>
        </div>
    </div>
    <div class="third about-img js-fullheight">
    </div>
</section>

<section id="cuc" class="ftco-consult bg-primary align-text-center">
    <div class="container-fluid px-md-4">
        <div class="row align-items-center">
            <div class="col-lg-2 text-lg-center">
                <h3 class="mb-4 mb-lg-0 align-text-center">Chercher une chambre</h3>
            </div>
            <div class="col-lg-10">
                <form action="{{route('recherche')}}" method="get" class="consult-form">
                    <div class="d-lg-flex align-items-md-end">
                        <div class="form-group mb-3 mb-lg-0 mr-4">
                            <div class="form-field">
                                <div class="select-wrap text-center">
                                    Date d'arriver
                                    <input type="date" name="Date_arriver" id="da" class="btn btn-light py-3 px-4">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 mb-lg-0 mr-4">
                            <div class="form-field">
                                <div class="select-wrap text-center">
                                    Date depart
                                    <input type="date" name="Date_depart" id="dd" class="btn btn-light py-3 px-4">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 mb-lg-0 mr-4">
                            <div class="form-field">
                                <div class="select-wrap text-center">
                                    Chambre
                                    <select id="selection" name="Type_chambre" class="btn btn-light py-3 px-4">
                                        <option value="Unique_simple">Unique_simple</option>
                                        <option value="Unique_confort">Unique_confort</option>
                                        <option value="Double_simple">Double_simple</option>
                                        <option value="Double_confort">Double_confort</option>
                                        <option value="Deluxe_simple">Deluxe_simple</option>
                                        <option value="Deluxe_royal">Deluxe_royal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 mb-lg-0 mr-4">
                            <div class="form-field">
                                <div class="select-wrap text-center">
                                    <form> Adulte
                                        <input type="number" name="Nombre_adulte" id="ad" min="1" class="btn btn-light py-3 px-4"> </form>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 mb-lg-0 mr-4">
                            <div class="form-field">
                                <div class="select-wrap text-center">
                                    Enfant
                                    <input type="number" name="Nombre_enfant" id="ad" min="0" class="btn btn-light py-3 px-4">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Recherche" class="btn btn-primary py-3 px-4">
                        </div>
                    </div>
                </form>
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
                        <h3 class="heading"><a href="reservationchambre">Hebergement</a></h3>
                        <p>Nous disposons des chambres propres modernes adaptees a vos besoins.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span> <image src="{{asset('app-assets/images/conf1.png')}}"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading"><a href="reservationevenement">Evenementiel</a></h3>
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
                        <h3 class="heading"><a href="services">Restauration</a></h3>
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
                        <h3 class="heading"><a href="services">Pressing</a></h3>
                        <p>Un service de lavage professionnelle rapide equiper de machine moderne pour vous servir.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="ccr" class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Catégories recommandées</span>
                <h2 class="mb-4">Chambres</h2>
                <p>Voici une liste des meilleurs chambres disponible de notre catalogue.</p>
            </div>
        </div>
    </div>
    <div class="container-fluid px-md-0">
        <div class="row no-gutters">
            <div class="col-md-4">
                <div class="model img d-flex align-items-end" style="background-image: url({{asset('app-assets/images/unique1.jpg')}});">
                    <div class="desc w-100 px-4">
                        <div class="info w-100 mb-4">
                            <ul>
                                <li><span>Prix TTC:</span><span>10.000 FR/Nuité</span></li>
                                <li><span>Bureau:</span><span>oui</span></li>
                                <li><span>Chaine Télé cablé:</span><span>oui</span></li>
                                <li><span>Balcon:</span><span>oui</span></li>
                                <li><span>Salle de bain:</span><span>oui</span></li>
                            </ul>
                        </div>
                        <div class="text w-100 mb-3">
                            <h2><a href="reservationchambre">Chambre<br>Unique simple</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="model img d-flex align-items-end" style="background-image: url({{asset('app-assets/images/double2.jpg')}});">
                    <div class="desc w-100 px-4">
                        <div class="info w-100 mb-4">
                            <ul>
                                <li><span>Prix TTC:</span><span>20.000 FR/Nuité</span></li>
                                <li><span>Chaine Télé cablé:</span><span>oui</span></li>
                            </ul>
                        </div>
                        <div class="text w-100 mb-3">
                            <h2><a href="reservationchambre">Chambre<br>Double simple</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="model img d-flex align-items-end" style="background-image: url({{asset('app-assets/images/deluxe3.jpg')}});">
                    <div class="desc w-100 px-4">
                        <div class="info w-100 mb-4">
                            <ul>
                                <li><span>Prix TTC:</span><span>30.000 FR/Nuité</span></li>
                                <li><span>Bureau:</span><span>oui</span></li>
                            </ul>
                        </div>
                        <div class="text w-100 mb-3">
                            <h2><a href="reservationchambre">Chambre <br>Deluxe Simple</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="model img d-flex align-items-end" style="background-image: url({{asset('app-assets/images/unique4.jpg')}});">
                    <div class="desc w-100 px-4">
                        <div class="info w-100 mb-4">
                            <ul>
                                <li><span>Prix TTC:</span><span>15.000 FR/Nuité</span></li>
                                <li><span>Bureau:</span><span>oui</span></li>
                                <li><span>Chaine Télé cablé:</span><span>oui</span></li>
                                <li><span>Balcon:</span><span>oui</span></li>
                                <li><span>Salle de bain:</span><span>oui</span></li>
                            </ul>
                        </div>
                        <div class="text w-100 mb-3">
                            <h2><a href="model-single.html">Chambre <br>Unique confort</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="model img d-flex align-items-end" style="background-image: url({{asset('app-assets/images/double3.jpg')}});">
                    <div class="desc w-100 px-4">
                        <div class="info w-100 mb-4">
                            <ul>
                                <li><span>Prix TTC:</span><span>25.000 FR/Nuité</span></li>
                                <li><span>Bureau:</span><span>oui</span></li>
                                <li><span>Chaine Télé cablé:</span><span>oui</span></li>
                            </ul>
                        </div>
                        <div class="text w-100 mb-3">
                            <h2><a href="reservationchambre">Chambre <br>Double confort</a></h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="model img d-flex align-items-end" style="background-image: url({{asset('app-assets/images/deluxe4.jpg')}});">
                    <div class="desc w-100 px-4">
                        <div class="info w-100 mb-4">
                            <ul>
                                <li><span>Prix TTC:</span><span>35.000 FR/Nuité</span></li>
                                <li><span>Bureau:</span><span>oui</span></li>
                                <li><span>Chaine Télé cablé:</span><span>oui</span></li>
                                <li><span>Balcon:</span><span>oui</span></li>
                                <li><span>Salle de bain:</span><span>oui</span></li>
                            </ul>
                        </div>
                        <div class="text w-100 mb-3">
                            <h2><a href="reservationchambre">Chambre <br>Deluxe royal</a></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="tcvv" class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Evenementiel</span>
                <h2 class="mb-4">Salles et Espaces</h2>
                <p>Nous disposons des salles modernes et des espaces adaptes a vos besoins.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry">
                    <a href="#" class="block-20" style="background-image: url('{{asset('app-assets/images/resto1.jpg')}}');">
                    </a>
                    <div class="text py-4">
                        <div class="meta mb-3">
                            <div><a href="#">Prix TTC= 15.000 FR/Nuité</a></div>
                            <div><a href="#"> Chambre Unique confort</a></div>

                        </div>
                        <div class="desc">
                            <h3 class="heading"><a href="#">Une chambre tres agreable utile pour le voyageur busness seule, au style classique europeen avec une vue sur la mer panoramique.</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry" data-aos-delay="100">
                    <a href="#" class="block-20" style="background-image: url('{{asset('app-assets/images/resto2.jpg')}}');">
                    </a>
                    <div class="text py-4">
                        <div class="meta mb-3">
                            <div><a href="#">Prix TTC= 25.000 FR/Nuité</a></div>
                            <div><a href="#"> Chambre Double confort</a></div>
                        </div>
                        <div class="desc">
                            <h3 class="heading"><a href="#">une chambre tres agreable utile pour le voyageur seule avec une vue panoramique sur la mer.</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry" data-aos-delay="200">
                    <a href="#" class="block-20" style="background-image: url('{{asset('app-assets/images/resto3.jpg')}}');">
                    </a>
                    <div class="text py-4">
                        <div class="meta mb-3">
                            <div><a href="#">Prix TTC= 35.000 FR/Nuité</a></div>
                            <div><a href="#"> Chambre Deluxe royal</a></div>
                        </div>
                        <div class="desc">
                            <h3 class="heading"><a href="#">une chambre de luxe vip tres agreable utile pour les hommes d'affaire, artiste, haut fonctionnaire, en couple ou non au style moderne americain </a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry">
                    <a href="#" class="block-20" style="background-image: url('{{asset('app-assets/images/sara.jpg')}}');">
                    </a>
                    <div class="text py-4">
                        <div class="meta mb-3">
                            <div><a href="#">Prix TTC= 15.000 FR/Nuité</a></div>
                            <div><a href="#"> Chambre Unique confort</a></div>

                        </div>
                        <div class="desc">
                            <h3 class="heading"><a href="#">Une chambre tres agreable utile pour le voyageur busness seule, au style classique europeen avec une vue sur la mer panoramique.</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry" data-aos-delay="100">
                    <a href="#" class="block-20" style="background-image: url('{{asset('app-assets/images/sara.jpg')}}');">
                    </a>
                    <div class="text py-4">
                        <div class="meta mb-3">
                            <div><a href="#">Prix TTC= 25.000 FR/Nuité</a></div>
                            <div><a href="#"> Chambre Double confort</a></div>
                        </div>
                        <div class="desc">
                            <h3 class="heading"><a href="#">une chambre tres agreable utile pour le voyageur seule avec une vue panoramique sur la mer.</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry" data-aos-delay="200">
                    <a href="#" class="block-20" style="background-image: url('{{asset('app-assets/images/sara.jpg')}}');">
                    </a>
                    <div class="text py-4">
                        <div class="meta mb-3">
                            <div><a href="#">Prix TTC= 35.000 FR/Nuité</a></div>
                            <div><a href="#"> Chambre Deluxe royal</a></div>
                        </div>
                        <div class="desc">
                            <h3 class="heading"><a href="#">une chambre de luxe vip tres agreable utile pour les hommes d'affaire, artiste, haut fonctionnaire, en couple ou non au style moderne americain </a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('app-assets/images/deluxe3.jpg')}});">
            </div>
            <div class="col-md-7 wrap-about pt-md-5 ftco-animate">
                <div class="heading-section mb-5 pt-5 pl-md-5">
                    <span class="subheading">Hotel Teranga</span>
                    <h2 class="mb-4">Notre mission vous satisfaire</h2>
                </div>
                <div class="pr-md-3 pr-lg-5 pl-md-5 mr-md-5 mb-5">
                    <div class="services-wrap d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span><image src="{{asset('app-assets/images/Sleep.png')}}"></span>
                        </div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Hebergement</h3>
                            <p>Nous disposons des chambres propres modernes adaptees a vos besoins.</p>
                        </div>
                    </div>
                    <div class="services-wrap d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span><image src="{{asset('app-assets/images/conf1.png')}}"></span>
                        </div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Evenementiel</h3>
                            <p>Nous disposons des salles modernes et des espaces adaptes a vos besoins.</p>
                        </div>
                    </div>
                    <div class="services-wrap d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span><image src="{{asset('app-assets/images/resto1.png')}}"></span>
                        </div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Restauration</h3>
                            <p> Un menu avec une alimentation saine et varies pour vous donner le gout de nos plats appetissants.</p>
                        </div>
                    </div>
                    <div class="services-wrap d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-fashion"></span>
                        </div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Pressing</h3>
                            <p>Un service de lavage professionnelle rapide equiper de machine moderne pour vous servir.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('app-assets/images/unique5.jpg')}});">
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <iframe width="100%" height="500" src="https://www.youtube.com/embed/INYuGHqXvUI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="" data-toggle="modal" data-target="#exampleModal" class="icon d-flex justify-content-center align-items-center"> <span class="icon-play"></span>
                </a>
            </div>
            <div class="col-md-6 py-5 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section pt-md-5">
                    <span class="subheading">SENEGAL</span>
                    <h2 class="mb-4">Geographie et climat</h2>
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
</section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Temoignages</span>
                <h2 class="mb-4">Quelques mots de nos clients</h2>
                <p> Voici les derniers avis laisser sur nos livres par nos clients apres leur sejours chez nous.</p>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5 text-center">
                            <div class="user-img mb-5" style="background-image: url({{asset('app-assets/images/person_1.jpg')}})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">Agent</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5 text-center">
                            <div class="user-img mb-5" style="background-image: url({{asset('app-assets/images/person_2.jpg')}})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">Model</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5 text-center">
                            <div class="user-img mb-5" style="background-image: url({{asset('app-assets/images/person_3.jpg')}})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">Model</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5 text-center">
                            <div class="user-img mb-5" style="background-image: url({{asset('app-assets/images/person_1.jpg')}})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">Agent</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5 text-center">
                            <div class="user-img mb-5" style="background-image: url({{asset('app-assets/images/person_1.jpg')}})">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <p class="name">Garreth Smith</p>
                                <span class="position">Businessman</span>
                            </div>
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
                        <li><a href="reservationchambre">Reserver une chambre</a></li>
                        <li><a href="reservationevenement">Reserver un evenement</a></li>
                        <li><a href="services">Restauration</a></li>
                        <li><a href="services">Pressing</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">LIENS</h2>
                    <ul class="list-unstyled">
                        <li><a href="#ccr">Catégories recommandées</a></li>
                        <li><a href="#tcvv">Evenementiel</a></li>
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
<script src="{{asset('app-assets/js/jquery.timepicker.min.js')}}"></script>
<script src="{{asset('app-assets/js/scrollax.min.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="{{asset('app-assets/js/google-map.js')}}"></script>
<script src="{{asset('app-assets/js/main.js')}}"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );

</script>

</body>

</html>
