<!DOCTYPE html>
<html lang="en">

<head>
    <title>Hotel Teranga</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Old+Standard+TT:400,700&display=swap" rel="stylesheet">
      <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"  rel="stylesheet">
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

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">Hotel<span>Teranga</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{route('home')}}" class="nav-link">Accueil</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reservation</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('reservation/chambre')}}">Chambre</a>
                        <a class="dropdown-item" href="{{route('reservation/evenement')}}">Evenement</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{route('a-propos')}}" class="nav-link">A propos</a></li>
                <li class="nav-item"><a href="{{route('services')}}" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
                @can('admin')<li class="nav-item"><a href="{{route('admin')}}">Back Office</a></li>@endcan
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
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
            <p><a href="{{route('contact')}}" class="btn-custom py-3 pr-2">Contactez-Nous</a></p>
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
                                      <option></option>
                                  @foreach($bedrooms as $value)
                                      <option value="{{$value->Type_chambre}}">{{$value->Type_chambre}}</option>
                                  @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 mb-lg-0 mr-4">
                            <div class="form-field">
                                <div class="select-wrap text-center">
                                    <form> Adulte
                                        <input type="number" name="Nombre_adulte" id="nbradult" min="1" class="btn btn-light py-3 px-4"> </form>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-3 mb-lg-0 mr-4">
                            <div class="form-field">
                                <div class="select-wrap text-center">
                                    Enfant
                                    <input type="number" name="Nombre_enfant" id="nbrenfant" min="0" class="btn btn-light py-3 px-4">
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
            <div class="col-md-6 col-lg-3 d-flex ftco-animate">
                <div class="media block-2 services">
                    <div class="icon d-flex align-self-stretch justify-content-center align-items-center mb-4">
                        <span><img src="{{asset('app-assets/images/Sleep.png')}}"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading text-center"><a href="{{route('reservation/chambre')}}">Hebergement</a></h3>
                        <p style="text-align:justify;">Nous disposons des chambres propres modernes adaptees a vos besoins.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-2 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span> <image src="{{asset('app-assets/images/conf1.png')}}"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading text-center"><a href="{{route('reservation/evenement')}}">Evenementiel</a></h3>
                        <p style="text-align:justify;">Nous disposons des salles modernes et des espaces adaptes a vos besoins.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-2 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span><image src="{{asset('app-assets/images/resto1.png')}}"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading text-center"><a href="{{route('services')}}">Restauration</a></h3>
                        <p style="text-align:justify;"> Un menu avec une alimentation saine et varies pour vous donner le gout de nos plats appetissants.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-2 services">
                    <div class="icon d-flex justify-content-center align-items-center mb-4">
                        <span class="flaticon-fashion"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading text-center"><a href="{{route('services')}}">Pressing</a></h3>
                        <p style="text-align:justify;">Un service de lavage rapide professionnelle equiper de machine moderne pour vous servir.</p>
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
            @foreach($bedrooms as $bedroom)
                <div class="col-md-4">
                    <div class="model img d-flex align-items-end" style="background-image: url('{{$bedroom->Image}}');">
                        <div class="desc w-100 px-4">
                            <div class="info w-100 mb-4">
                                <ul>
                                    <li><span>Prix TTC:</span><span>{{$bedroom->Prix_nuite}} FR/Nuité</span></li>
                                    <li><span>Etat:</span><span>{{$bedroom->Statut}}</span></li>
                                </ul>
                            </div>
                            <div class="text w-100 mb-3">
                                <h2><a href="{{route('reservation/chambre')}}">Chambre<br>{{$bedroom->Type_chambre}}</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
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
            @foreach($rooms as $room)
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry">
                    <a href="{{route('reservation/evenement')}}" class="block-20" style="background-image: url('{{$room->Image}}');"></a>
                    <div class="text py-4">
                        <div class="meta mb-3">
                            <div><a>{{$room->Salles}}</a></div>
                            <div><a>Etat: {{$room->Statut}}</a></div>
                        </div>
                        <div class="desc">
                            <h3 style="text-align:justify;" class="heading"><a>{{$room->Description}}</a></h3>
                        </div>
                    </div>
                </div>
            </div>
              @endforeach
            <div class="col-md-4 ftco-animate">
                <div class="blog-entry" data-aos-delay="200">
                    <a href="{{route('a-propos')}}" class="block-20" style="background-image: url('{{asset('app-assets/images/Equipe.jpg')}}');">
                    </a>
                    <div class="text py-4">
                        <div class="meta mb-3">
                          <div><a href="{{route('a-propos')}}">Notre mission</a></div>
                          <div><a href="{{route('a-propos')}}"> vous satisfaire</a></div>
                        </div>
                        <div class="desc">
                            <h3 style="text-align:justify;" class="heading"><a>Une equipe d'homme de metier serviable pour vous satisfaire nuit et jours a votre service 24h/24 - 7j/7 durant toute l'annee.</a></h3>
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
                    <span class="subheading text-center">Hotel Teranga</span>
                    <h2 class="mb-4 text-center">Notre mission vous satisfaire</h2>
                </div>
                <div class="container pr-md-3 pr-lg-5 pl-md-5 mr-md-5 mb-5">
                    <div class="services-wrap d-flex justify-content-center align-content-center">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span><image src="{{asset('app-assets/images/Sleep.png')}}"></span>
                        </div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Hebergement</h3>
                            <p style="text-align:justify;">Nous disposons des chambres propres modernes adaptees a vos besoins.</p>
                        </div>
                    </div>
                    <div class="services-wrap d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span><image src="{{asset('app-assets/images/conf1.png')}}"></span>
                        </div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Evenementiel</h3>
                            <p style="text-align:justify;">Nous disposons des salles modernes et des espaces adaptes a vos besoins.</p>
                        </div>
                    </div>
                    <div class="services-wrap d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span><image src="{{asset('app-assets/images/resto1.png')}}"></span>
                        </div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Restauration</h3>
                            <p style="text-align:justify;"> Un menu avec une alimentation saine et varies pour vous donner le gout de nos plats appetissants.</p>
                        </div>
                    </div>
                    <div class="services-wrap d-flex">
                        <div class="icon d-flex justify-content-center align-items-center">
                            <span class="flaticon-fashion"></span>
                        </div>
                        <div class="media-body pl-4">
                            <h3 class="heading">Pressing</h3>
                            <p style="text-align:justify;">Un service de lavage professionnelle rapide equiper de machine moderne pour vous servir.</p>
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
                    <span class="subheading text-center">SENEGAL</span>
                    <h2 class="mb-4 text-center">Geographie et climat</h2>
                </div>
                <div class="pb-md-5">
                    <P style="text-align:justify;">Hotel Teranga est une chaine d'hotel 5 étoiles présent au Sénégal: Dakar, Thies, Saint-louis et Cap skiring.</P>
                    <p style="text-align:justify;">Le Sénégal est un pays situé sur la côte ouest de l'Afrique et doté d'un héritage colonial français et de nombreuses attractions naturelles.<br></P>
                    <p style="text-align:justify;">Dakar, la capitale, comprend le quartier historique de la Médina et le célèbre musée Théodore Monod, exposant des œuvres d'art africain. Elle est également réputée pour sa vie nocturne, centrée sur la musique mbalax, originaire du Sénégal. l'île de Gorée accueille le musée et mémorial de « la Maison des Esclaves ». Cette petite île a un charme fou avec ses maisons pastel, ses  resto, mais ce refuge de détente nous rappelle le rôle de Gorée dans le passé et les souffrances de la traite des noirs. Une visite guidée de cette maison des esclaves, vous plonge directement dans l'histoire déplorable de la traite négrière.<br></P>
                    <p style="text-align:justify;">Thies sur la route de Saint-Louis, à 70 km au nord-est de Dakar en passant dans une magnifique forêt d'anacardiers ou en empruntant la nouvelle route à péage, Thiès est la capitale de la région ouest, voire de tout le Centre-Ouest - et la deuxième ville du Sénégal. Sur la côte en direction de la réserve de biosphère du parc national du delta du Saloum se trouvent les stations balnéaires de la Petite-Côte.<br></P>
                    <P style="text-align:justify;">Saint-Louis, ancienne capitale de l'Afrique-Occidentale française, abrite une vieille ville à l'architecture coloniale. La région est idéale pour les amoureux de la nature et des oiseaux. La biodiversité du Delta du fleuve Sénégal suggère des excursions étonnantes. Le parc national des oiseaux du Djoudj, sanctuaire de terres humides abritant flamands roses, pélicans et oiseaux migrateurs sur la zone de Thiolene et rives du Lampsar. Le Saint-Louis Jazz (dates variables, mai/juin) est un festival de jazz international de longue date.<br></p>
                    <P style="text-align:justify;">Le Cap Skirring est un cap à l'extrémité sud-ouest du Sénégal dans le département d'Oussouye et la région de Ziguinchor, en Casamance. C'est également un village situé à proximité immédiate du cap et à environ 70 km de Ziguinchor. Il fait partie de la communauté rurale de Diembéring, dans l'arrondissement de Kabrousse, le département d'Oussouye et la région de Ziguinchor.</P>
                    <p style="text-align:justify;">Les températures sont chaudes toute l'année, avec un temps caniculaire, venteux et humide pendant la saison des pluies (juin-oct).</p>
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
                  @foreach($temoignages as $temoignage)
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5 text-center">
                            <div>
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                            </div>
                            <div class="text">
                                <p class="mb-5 pl-4 line">{{$temoignage->Message}}</p>
                                <p class="name">{{$temoignage->Nom_complet}}</p>
                                <span class="position">{{$temoignage->Profession}}</span>
                            </div>
                        </div>
                    </div>
                      @endforeach
                </div>
            </div>
        </div>
    </div>
    <div id="html" class="text-center">
        <a><span  data-toggle="modal" data-target="#formulaire" class="btn btn-primary py-2 px-5 col-md-4 text-center">Envoyer un Temoignage</span></a>
    </div>
    <div class="modal fade" id="formulaire">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Veuillez remplir le formulaire:</h4>
        <button type="button" class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body row">
        <form class="col" action="{{route('creation/temoignage')}}" method="post">
            @csrf
          <div class="form-group">
            <label class="form-control-label">Nom complet</label>
            <input type="text" class="form-control" name ="Nom_complet">
          </div>
          <div class="form-group">
            <label  class="form-control-label">Email</label>
            <input type="email" class="form-control" name="Email">
          </div>
          <div class="form-group">
            <label class="form-control-label">Profession (optionel)</label>
            <input type="text" class="form-control" name ="Profession">
          </div>
          <div class="form-group">
            <label  class="form-control-label">Temoignage</label>
            <textarea name="Message" cols="30" rows="3" class="form-control" placeholder="Votre temoignage"></textarea>
          </div>
          <button type="submit" class="btn btn-primary pull-right">Envoyer</button>
        </form>
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
                        <li class="ftco-animate"><a href="#"><span class="icon-whatsapp"></span></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">SERVICES</h2>
                    <ul class="list-unstyled">
                        <li><a href="{{route('reservation/chambre')}}">Reserver une chambre</a></li>
                        <li><a href="{{route('reservation/evenement')}}">Reserver un evenement</a></li>
                        <li><a href="{{route('services')}}">Restauration</a></li>
                        <li><a href="{{route('services')}}">Pressing</a></li>
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
<script src="{{asset('app-assets/js/scrollax.min.js')}}"></script>
<script src="{{asset('app-assets/js/main.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.0/umd/popper.min.js"></script>



</body>

</html>
