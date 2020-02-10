@extends('layout')
@section('title', "Resultat Recherche")
@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
                <li class="nav-item active"><a href="{{route('accueil')}}" class="nav-link">Accueil</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reservation</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('reservation/chambre')}}">Chambre</a>
                        <a class="dropdown-item" href="{{route('reservation/evenement')}}">Evenement</a>
                    </div>
                </li>
                <li class="nav-item"><a href="{{route('services')}}" class="nav-link">Services</a></li>
                <li class="nav-item"><a href="{{route('a-propos')}}" class="nav-link">A propos</a></li>
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
                <h1 class="mb-3 mt-5 bread">Resultat de la recherche</h1>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Resultat de la recherche</span>
                <p>Voici la chambre correspondant a votre recherche</p>
            </div>
        </div>
        @foreach($chambres as $chambre)
            <div class="col-md-6 ftco-animate">
                <div class="blog-entry" data-aos-delay="200">
                  <div class="text-center"><h2>Chambre {{$chambre->Type_chambre}}</h2></div>
                    <a href="#" class="block-20" style="background-image: url('{{$chambre->Image}}');">
                    </a>
                    <div class="text py-4">
                        <div class="meta mb-3">
                            <div><a>Prix/nuite = {{$chambre->Prix_nuite}} Fr cfa</a></div>
                            <div><a>Etat: {{$chambre->Statut}}</a></div>
                        </div>
                        <div class="desc">
                            <h3 class="heading"><a>Description:<br>{{$chambre->Description}}</a></h3>
                        </div>
                        <div class="text-center">
                            <a href="{{route('reservation/chambre')}}"><span class="btn btn-primary py-2 px-5">Reserver la chambre</span></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($chambres as $chambre)
            <div class="col-md-6 ftco-animate">

<div class="text-center"><h2>Les differents type de chambre</h2></div>
                         <div id="" class="carousel slide" data-ride="carousel">
                             <ol class="carousel-indicators">
                                   @foreach($bedrooms as $bedroom)
                                    <li data-target="#" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                                   @endforeach
                             </ol>
                             <div class="carousel-inner">
                                   @foreach($bedrooms as $bedroom)
                                 <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                     <img src="{{$bedroom->Image}}" class="block-20">
                                     <div class="carousel-caption d-none d-md-block">
                                     <h5>Chambre {{$bedroom->Type_chambre}}</h5>
                                     <p>Prix/nuite = {{$chambre->Prix_nuite}} Fr cfa</p>
                                     </div>
                                 </div>
                                 @endforeach
                             </div>
                             <a class="carousel-control-prev" role="button" data-slide="prev">
                             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                             <span class="sr-only">Previous</span>
                             </a>
                             <a class="carousel-control-next"  role="button" data-slide="next">
                             <span class="carousel-control-next-icon" aria-hidden="true"></span>
                             <span class="sr-only">Next</span>
                             </a>
                         </div>
                         <div class="desc">
                             <h3 class="heading"><a>Description:<br>Une connecxion internet haut debit, une piscine un bard lunch et un restaurant a votre disposition.</a></h3>
                         </div>
                         <div class="text-center">
                             <a href="{{route('home')}}"><span class="btn btn-primary py-2 px-5">Retourner au page d'acceuil</span></a>
                         </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endsection
  @section('js')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  @endsection
