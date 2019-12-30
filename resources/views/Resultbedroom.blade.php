@foreach($trips as $trip)
                    <div class="single-blog-post d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                        <!-- Post Thumbnail -->
                        <div class="post-thumbnail">
                            <a href="#"><img src="{{$trip->car->car_image ? asset($trip->car->car_image) :
                                        asset('uploads/images/default.png')}}" alt="" style="width:292px;height:292px;" ></a>
                        </div>
                        <!-- Post Content -->
                        <div class="post-content">
                            <!-- Post Title -->
                            <a href="#" class="post-title">Depart : {{$trip->lieu_depart}}</a>
                            <a href="#" class="post-title">Destination : {{$trip->lieu_arrivee}}</a>
                            <p>Date et Heure de depart :{{$trip->date_depart}} a {{$trip->heure_depart}}</p>
                            <p>Prix trajet / Passager {{$trip->price}} F</p>
                            <p>Vehicule : {{$trip->car->name}} </p>
                            <p>Nombre de places : {{$trip->car->nbre_place_passager}} </p>
                            <a href="{{route('profil_trip_user',['id'=>$trip->id])}}"
                                    class="btn continue-btn">Voir details<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                    <a href="{{route('show_car_user',['id'=>$trip->car->id])}}"
                                    class="btn continue-btn">Voir vehicule<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    @endforeach
