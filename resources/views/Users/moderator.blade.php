@extends('layouts.moderator')

@section('content')

  <div class="container-fluid">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Hotel Teranga</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord / Moderator</a></li>
              <li class="breadcrumb-item active">Acceuil</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>      <!-- Icon Cards-->
    <div class="row">
      <div class="col-xl-3 col-sm-4 mb-3">
        <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-bed"></i>
                </div>
                <div class="mr-5">{{$resbedroom_count}} Reservation Chambre</div>
            </div>
              <a class="card-footer text-white clearfix small z-1" href="{{route('reservation/bedroom')}}">
                <span class="float-left">Liste des reservations de chambre</span>
                <span class="float-right"><i class="fas fa-angle-right"></i></span>
              </a>
        </div>
      </div>
      <div class="col-xl-3 col-sm-4 mb-3">
                    <div class="card text-white bg-yellow o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div class="mr-5">{{$resevent_count}} Reservation Evenement</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="{{route('reservation/event')}}">
                            <span class="float-left">Liste reservations d'evenement</span>
                            <span class="float-right"><i class="fas fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-4 mb-3">
                    <div class="card text-black bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="mr-5">{{$contact_count}} Message</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
                            <span class="float-left">Liste des messages</span>
                            <span class="float-right"><i class="fas fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-4 mb-3">
                  <div class="card text-white bg-orange o-hidden h-100">
                      <div class="card-body">
                          <div class="card-body-icon">
                            <i class="far fa-user"></i>
                          </div>
                          <div class="mr-5">{{$besoinclient_count}} Besoins Clients</div>
                      </div>
                        <a class="card-footer text-white clearfix small z-1" href="besoinclient">
                          <span class="float-left">Liste des besoins des client</span>
                          <span class="float-right"><i class="fas fa-angle-right"></i></span>
                        </a>
                  </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
      <section class="app-insert">
        <div class="headr">
          <h2>Tache a faire</h2>
          <input type="text" name="task" onsubmit="function()" placeholder="Titre...">
        </div>
      </section>
      <section class="app-list">
        <ul>
        </ul>
      </section>
@endsection
