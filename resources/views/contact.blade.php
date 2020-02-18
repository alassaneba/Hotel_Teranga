@extends('layout')
@section('title', "Contact")
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
                <li class="nav-item"><a href="{{route('a-propos')}}" class="nav-link">A propos</a></li>
                <li class="nav-item active"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
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
<section class="hero-wrap hero-wrap-2" style="background-image:url({{asset('app-assets/images/renai.jpg')}});">
    <div class="overlay"></div>
    <div class="container">
        <div class="row slider-text justify-content-center align-items-center">
            <div class="col-md-7 col-sm-12 text-center ftco-animate">
                <h1 class="mb-3 mt-5 bread">Contactez nous</h1>
            </div>
        </div>
    </div>
</section>
@if(session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif
<section class="ftco-section contact-section">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <h2 id="pcfc" class="heading">Informations de contact</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-3 d-flex">
                <div class="con align-self-stretch p-5">
                    <p><span>Addresse:</span> 122 Cite millionnaire, Grand Yoff, Dakar, SENEGAL</p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="con align-self-stretch p-5">
                    <p><span>Phone:</span> <a href="tel://+221775945924">+221775945924</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="con align-self-stretch p-5">
                    <p><span>Email:</span> <a href="mailto:azouone@gmail.com">azouone@gmail.com</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="con align-self-stretch p-5">
                    <p><span>Site web</span> <a href="#">www.hotelteranga.sn</a></p>
                </div>
            </div>
        </div>
        <label>Pour envoyer un message veuillez remplir tous les champs.</label>
        <div class="row block-9">
            <div class="col-md-6 pr-md-5">
                <form action="contact" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="Nom_complet" class="form-control" placeholder="Nom complet">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="Objet" class="form-control" placeholder="Objet">
                    </div>
                    <div class="form-group">
                        <textarea name="Message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="Envoyer Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form>
            </div>

            <div class="col-md-6 d-flex">
                <div id="map"></div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('js')

@endsection
