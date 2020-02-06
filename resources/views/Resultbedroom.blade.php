@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
@endsection
@extends('layout')

@section('content')
<section id="tcvv" class="ftco-section">
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
