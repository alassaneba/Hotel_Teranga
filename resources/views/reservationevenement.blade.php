@extends('layout')
@section('title', "Reservation Evenementiel")
@section('content')
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="text-center alert alert-danger">{{$error}}</div>
    @endforeach
@endif
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
                <h1>Reservation d'evenement</h1>
            </div>
        </div>
        <div class="third about-img js-fullheight">
        </div>
    </section>
    @if(session('success'))
        <div class="text-center alert alert-success">{{session('success')}}</div>
    @endif
    <br>
    <div class=" container border">
        <spam><p class="text-center">Pour faire une reservation d'evenement veuillez renseignez les champs</p></spam>
    </div>

    <div class="container border">
    <form action="{{route('reservation/evenement')}}" method="post" >
        @csrf
        <div><label>Nom de l'evenement</label>
                <input type="text" name="Nom_evenement" class="form-control">
        </div>
        <div><label>Type d'evenement</label>
            <select name="type_event_id" id="Type_evenement" class="form-control">
                <option></option>
                @foreach($typeevenememt as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div><label>Date debut</label>
            <input type="date" name="Date_debut" id="Date_debut" min="<?php echo date('Y-m-d'); ?>" class="form-control">
        </div>
        <div><label>Date fin</label>
            <input type="date" name="Date_fin" id="Date_fin" min="<?php echo date('Y-m-d'); ?>" class="form-control">
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
            <select name="room_id" id="Salles" class="form-control">
                <option></option>
                @foreach($salles as $key => $value)
                  @continue ($value->Statut == 'Indisponible')
                    <option value="{{$value->id}}">{{$value->Salles}}</option>
                @endforeach
            </select>
        </div>
        <div><label>Disposition de la salle</label>
            <select name="disposal_room_id" id="Disposition" class="form-control">
                <option></option>
                @foreach($disposition as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div><label>Nombre de participant</label>
            <input type="number" name="Nombre_participant" class="form-control">
        </div>
        <div><label>Restauration</label>
            <select type="text" name="Restauration" class="form-control">
                <option></option>
                <option value="Non">Non</option>
                <option value="Oui">Oui</option>
            </select>
        </div>
        <div><label>Equipement</label>
            <ul>
                <li><input type="checkbox" name="Equipement1" value="Video-projecteur">Video-projecteur</li>
                <li><input type="checkbox" name="Equipement2" value="Internet">Internet</li>
                <li><input type="checkbox" name="Equipement3" value="Sonorisation">Sonorisation</li>
                <li><input type="checkbox" name="Equipement4" value="Autres">Autres a signaler</li>
            </ul>
        </div>
        <div><label>Autres informations supplementaires a signaler</label>
            <textarea name="Autres_informations" id="Autres_informations" cols="30" rows="3" class="form-control"></textarea>
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
            <input type="text" name="Prenom" class="form-control">
        </div>
        <div><label>Nom</label>
            <input type="text" name="Nom" class="form-control">
        </div>
        <div><label>Societe</label>
            <input type="text" name="Societe" class="form-control">
        </div>
        <div><label>Secteur d'activite</label>
            <input type="text" name="Secteur_activite" class="form-control">
        </div>
        <div><label>Email</label>
            <input type="email" name="Email" class="form-control">
        </div>
        <div><label>Telephone</label>
            <input type="text" name="Telephone" class="form-control">
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-primary">Reserver</button>
        </div>
        <br>
    </form>
  </div><br>
@endsection
@section('js')
<script type="text/javascript">
document.getElementById('Date_debut').valueAsDate = new Date();
document.getElementById('Date_fin').valueAsDate = new Date();
</script>
@endsection
