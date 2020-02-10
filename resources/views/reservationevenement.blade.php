@extends('layout')
@section('title', "Reservation Evenementiel")
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
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Reservation</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('reservation/chambre')}}">Chambre</a>
                        <a class="dropdown-item active" href="{{route('reservation/evenement')}}">Evenement</a>
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
                <div class="col-md-0 col-sm-0 d-flex text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Reservation d'evenement</h1>
                </div>
            </div>
        </div>
    </section>

    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif

    <div class=" container border">
        <spam><p>Pour faire une reservation d'evenement veuillez renseignez tous les champs</p></spam>
    </div>

    <div class="container border">
    <form action="{{route('reservation/evenement')}}" method="post" >
        @csrf
        <div><label>Nom de l'evenement</label>
                <input type="text" name="Nom_evenement" class="form-control" placeholder="Nom de l'evenement">
        </div>
        <div><label>Type d'evenement</label>
            <select name="Type_evenement" id="Type_evenement" class="form-control">
                <option value=""></option>
                @foreach($typeevenememt as $id => $value)
                    <option value="{{$value}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div><label>Date debut</label>
            <input type="date" name="Date_debut" class="form-control" placeholder="Date début">
        </div>
        <div><label>Date fin</label>
            <input type="date" name="Date_fin" class="form-control" placeholder="Date fin">
        </div>
        <div><label>Duree de l'evenement</label>
            <select type="text" name="Duree" class="form-control">
                <option></option>
                <option value="Matinee">Matinee</option>
                <option value="Apres-midi">Apres-midi</option>
                <option value="Soiree">Soiree</option>
                <option value="Journee-entiere">Journee-entiere</option>
            </select>
        </div>
        <div><label>Salle de l'evenement</label>
            <select name="Salles" id="Salles" class="form-control">
                <option value=""></option>
                @foreach($salles as $id => $value)
                    <option value="{{$value}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div><label>Disposition de la salle</label>
            <select name="Disposition" id="Disposition" class="form-control">
                <option value=""></option>
                @foreach($disposition as $id => $value)
                    <option value="{{$value}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div><label>Nombre de participant</label>
            <input type="number" name="Nombre_participant" class="form-control" placeholder="Nombre de participant">
        </div>
        <div><label>Restauration</label>
            <select type="text" name="Restauration" class="form-control" placeholder="Restauration">
                <option></option>
                <option value="NON">Non</option>
                <option value=OUI>Oui</option>
            </select>
        </div>
        <div><label>Equipement</label>
            <ul>
                <li><input type="checkbox" name="Equipement1" value="Video-projecteur">Video-projecteur</li>
                <li><input type="checkbox" name="Equipement2" value="Internet">Internet</li>
                <li><input type="checkbox" name="Equipement3" value="Sonorisation">Sonorisation</li>
                <li><input type="checkbox" name="Equipement4" value="Autres">Autres</li>
            </ul>
        </div>
        <div><label>Autres informations supplementaires</label>
            <textarea name="Autres_informations" id="" cols="30" rows="4" class="form-control" placeholder="Autres informations supplementaires"></textarea>
        </div>
        <div><label>Civilite</label>
            <select type="text" name="Civilite" class="form-control">
                <option></option>
                <option value="Mr.">Mr.</option>
                <option value="Mme.">Mme.</option>
                <option value="Mlle.">Mlle.</option>
            </select>
        </div>
        <div><label>Prenom</label>
            <input type="text" name="Prenom" class="form-control" placeholder="Prenom">
        </div>
        <div><label>Nom</label>
            <input type="text" name="Nom" class="form-control" placeholder="Nom">
        </div>
        <div><label>Societe</label>
            <input type="text" name="Societe" class="form-control" placeholder="Societe">
        </div>
        <div><label>Secteur d'activite</label>
            <input type="text" name="Secteur_activite" class="form-control" placeholder="Secteur d'activité">
        </div>
        <div><label>Email</label>
            <input type="email" name="Email" class="form-control" placeholder="Email">
        </div>
        <div><label>Telephone</label>
            <input type="text" name="Telephone" class="form-control" placeholder="Telephone">
        </div>
        <div>
            <button class="btn btn-primary">Reserver</button>
        </div>
    </form>
    </div>
@endsection
@section('js')

@endsection
