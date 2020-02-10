@extends('layout')
@section('title', "A-propos")
@section('css')

@endsection
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('accueil')}}">Hotel<span>Teranga</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="{{route('accueil')}}" class="nav-link">Accueil</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reservation</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('reservation/chambre')}}">Chambre</a>
                        <a class="dropdown-item" href="{{route('reservation/evenement')}}">Evenement</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{route('services')}}" class="nav-link">Services</a></li>
                <li class="nav-item active"><a href="{{route('a-propos')}}" class="nav-link">A propos</a></li>
                <li class="nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
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
                            <a class="dropdown-item" href="{{route('home')}}">Back-Office</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Déconnexion') }}
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
<section class="hero-wrap hero-wrap-2" style="background-image:url({{asset('app-assets/images/renai.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row slider-text justify-content-center align-items-center">
            <div class="col-md-7 col-sm-12 text-center ftco-animate">
                <h1 class="mb-3 mt-5 bread">A propos de nous</h1>
            </div>
        </div>
    </div>
</section>
@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif
<section style="margin-top: 3em;" class="ftco-section ftco-no-pb ftco-no-pt bg-light">
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
                    <P style="text-align:justify;">Hotel Teranga est une chaine d'hotel 5 étoiles présent au Sénégal: Dakar, Thies, Saint-louis et Cap skiring.</P>
                    <p style="text-align:justify;">Le Sénégal est un pays situé sur la côte ouest de l'Afrique et doté d'un héritage colonial français et de nombreuses attractions naturelles.<br></P>
                    <p style="text-align:justify;">Dakar, la capitale, comprend le quartier historique de la Médina et le célèbre musée Théodore Monod, exposant des œuvres d'art africain. Elle est également réputée pour sa vie nocturne, centrée sur la musique mbalax, originaire du Sénégal. l'île de Gorée accueille le musée et mémorial de « la Maison des Esclaves ». Cette petite île a un charme fou avec ses maisons pastel, ses  resto, mais ce refuge de détente nous rappelle le rôle de Gorée dans le passé et les souffrances de la traite des noirs. Une visite guidée de cette maison des esclaves, vous plonge directement dans l'histoire déplorable de la traite négrière.<br></P>
                    <p style="text-align:justify;">Thies sur la route de Saint-Louis, à 70 km au nord-est de Dakar en passant dans une magnifique forêt d'anacardiers ou en empruntant la nouvelle route à péage, Thiès est la capitale de la région ouest, voire de tout le Centre-Ouest - et la deuxième ville du Sénégal. Sur la côte en direction de la réserve de biosphère du parc national du delta du Saloum se trouvent les stations balnéaires de la Petite-Côte.<br></P>
                    <P style="text-align:justify;">Saint-Louis, ancienne capitale de l'Afrique-Occidentale française, abrite une vieille ville à l'architecture coloniale. La région est idéale pour les amoureux de la nature et des oiseaux. La biodiversité du Delta du fleuve Sénégal suggère des excursions étonnantes. Le parc national des oiseaux du Djoudj, sanctuaire de terres humides abritant flamands roses, pélicans et oiseaux migrateurs sur la zone de Thiolene et rives du Lampsar.  Le Saint-Louis Jazz (dates variables, mai/juin) est un festival de jazz international de longue date.<br></p>
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
        <a><span  data-toggle="modal" data-target="#formulaire" class="btn btn-primary py-2 px-5 col-md-4 text-center">Faire un Temoignage</span></a>
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
        <form class="col" action="temoignagecreate" method="post">
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
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.0/umd/popper.min.js"></script>
@endsection
