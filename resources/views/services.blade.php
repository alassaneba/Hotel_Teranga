@extends('layout')
@section('title', "Services")
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
                <li class="nav-item active"><a href="{{route('services')}}" class="nav-link">Services</a></li>
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
            <h1>Services proposés</h1>
        </div>
    </div>
    <div class="third about-img js-fullheight">
    </div>
</section>

<section class="ftco-section ftco-services" >
    <div class="container">
        <div class="row">
          @foreach($services as $service)
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
              <div class="media block-6 services " >
                <p class="text-center" >
                    <span class="icon d-flex justify-content-center align-items-center mb-4 " style="margin:auto;"><img src="{{$service->Image}}"></span>
                </p>
                  <div class="media-body" >
                      <h3 class="heading text-center"><a href="{{route('reservation/chambre')}}">{{$service->Service}}</a></h3>
                      <p style="text-align:justify;">{{$service->Description}}</p>
                  </div>
              </div>
          </div>
             @endforeach
        </div>
    </div>
</section>

<section>
<div class="container"  style="margin: 4%;">
    <div class="row justify-content-center mb-5">
        <div class="col-md-7 heading-section ftco-animate text-center">
            <h1 class="mb-4">HEBERGEMENT</h1>
            <p>Nous disposons des chambres aeres propres modernes adaptees a vos besoins.</p>
        </div>
    </div>
</div>
<div class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('app-assets/images/unique5.jpg')}});"></div>
            <div class="col-md-6 py-5 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section pt-md-5">
                    <span class="subheading text-center">HEBERGEMENT</span>
                    <h1 class="mb-4 text-center">Geographie et climat</h1>
                </div>
                <div class="pb-md-5" style="text-align:justify;">
                    <P>Hotel Teranga est une chaine d'hotel 5 étoiles présent au Sénégal: Dakar, Thies, Saint-louis et Cap skiring.</P>
                    <p>Le Sénégal est un pays situé sur la côte ouest de l'Afrique et doté d'un héritage colonial français et de nombreuses attractions naturelles.<br></P>
                    <p>Dakar, la capitale, comprend le quartier historique de la Médina et le célèbre musée Théodore Monod, exposant des œuvres d'art africain. Elle est également réputée pour sa vie nocturne, centrée sur la musique mbalax, originaire du Sénégal.</p>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section >
    <div class="container"  style="margin: 4%;">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h2 class="mb-4">EVENEMENTIEL</h2>
                <p>Nous disposons des salles modernes et des espaces adaptes a vos besoins.</p>
            </div>
        </div>
        <div class="ftco-section ftco-no-pb ftco-no-pt bg-light" style="margin-bottom: 0;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{asset('app-assets/images/Terasse.jpg')}});"></div>
                    <div class="col-md-6 py-5 wrap-about pb-md-5 ftco-animate">
                        <div class="heading-section pt-md-5">
                            <span class="subheading text-center">EVENEMENTIEL</span>
                            <h1 class="mb-4 text-center">Geographie et climat</h1>
                        </div>
                        <div class="pb-md-5" style="text-align:justify;">
                            <P>Hotel Teranga est une chaine d'hotel 5 étoiles présent au Sénégal: Dakar, Thies, Saint-louis et Cap skiring.</P>
                            <p>Le Sénégal est un pays situé sur la côte ouest de l'Afrique et doté d'un héritage colonial français et de nombreuses attractions naturelles.<br></P>
                            <p>Dakar, la capitale, comprend le quartier historique de la Médina et le célèbre musée Théodore Monod, exposant des œuvres d'art africain. Elle est également réputée pour sa vie nocturne, centrée sur la musique mbalax, originaire du Sénégal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section >
    <div class="container" style="margin: 4%;">
        @foreach($servicesupps as $servicesupp)
        <div class="row justify-content-center mb-5" style="margin: 4%;">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <h1 class="mb-4">{{$servicesupp->Servicesupp}}</h1>
                <p>{{$servicesupp->Slogan}}</p>
            </div>
        </div>
        <div class="ftco-section ftco-no-pb ftco-no-pt bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{$servicesupp->Image}});"></div>
                    <div class="col-md-6 py-5 wrap-about pb-md-5 ftco-animate">
                        <div class="heading-section pt-md-5">
                            <h2 class="mb-4 text-center">{{$servicesupp->Servicesupp}}</h2>
                        </div>
                        <div class="pb-md-5" style="text-align:justify;">{{$servicesupp->Description}}</div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection
@section('js')

@endsection
