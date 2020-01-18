@extends('layout')
@section('content')
<section id="tcvv" class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Resultat</span>
                <h2 class="mb-4">Chambre disponible</h2>
                <p>Voici la chambre correspondant a votre recherche</p>
            </div>
        </div>
        @foreach($chambres as $chambre)
            <div class="col-md-6 ftco-animate">
                <div class="blog-entry" data-aos-delay="200">
                    <a href="blog-single.html" class="block-20" style="background-image: url('{{$chambre->Image}}');">
                    </a>
                    <div class="text py-4">
                        <div class="meta mb-3">
                            <div><a>Prix/nuite = {{$chambre->Prix_nuite}} Fr cfa</a></div>
                            <div><a>Chambre {{$chambre->Type_chambre}}</a></div>
                            <div><a>Etat: {{$chambre->Statut}}</a></div>
                        </div>
                        <div class="desc">
                            <h3 class="heading"><a>Description:<br>{{$chambre->Description}}</a></h3>
                        </div>
                        <div class="center">
                            <a href="reservationchambre"><span class="btn btn-primary py-2 px-5">Reserver la chambre</span></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</section>
@endsection
