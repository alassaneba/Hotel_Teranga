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
                            <a class="dropdown-item" href="{{route('Backoffice')}}">Back-Office</a>
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
<section class="hero-wrap d-flex js-fullheight" style="background:url({{asset('app-assets/images/renai.jpg')}});height: 639px;background-position: top;background-size: cover;">
    <div class="overlay"></div>
    <div class="forth js-fullheight d-flex align-items-center">
        <div class="text text-center">
            <h1>A propos de nous</h1>
        </div>
    </div>
    <div class="third about-img js-fullheight">
    </div>
</section>
@if(session('success'))
    <div class="text-center alert alert-success">{{session('success')}}</div>
@endif
<section style="margin-top: 3em;" class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="container">
        <div class="row">
            @foreach($apropos as $apropo)
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{$apropo->Image}})">
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <iframe width="100%" height="500" src="{{$apropo->Lien_video}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="" data-toggle="modal" data-target="#exampleModal" class="icon d-flex justify-content-center align-items-center"> <span class="icon-play"></span>
                </a>
            </div>
            <div class="col-md-6 py-5 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section pt-md-5">
                    <h1 class="mb-4 text-center">{{$apropo->Titre}}</h1>
                </div>
                <div class="pb-md-5" style="text-align:justify;">{{$apropo->Description}}</div>
            </div>
              @endforeach
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
                          <div style="background:#cd866c;">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                          </div>
                          <div class="text">
                              <p class="mb-5 pl-4">{{$temoignage->Message}}</p>
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
            <textarea name="Message" cols="30" rows="3" class="form-control"></textarea>
          </div>
          <div class="text-center">
          <button type="submit" class="btn btn-primary pull-right">Envoyer</button>
          </div>
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
