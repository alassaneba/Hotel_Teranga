@extends('layouts.admin')

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
              <li class="breadcrumb-item"><a href="admin">Tableau de bord</a></li>
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
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">{{$resbedroom_count}} Reservation Chambre</div>
            </div>
              <a class="card-footer text-white clearfix small z-1" href="{{route('admin/reservationbedrom')}}">
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
                        <a class="card-footer text-white clearfix small z-1" href="reservationevent">
                            <span class="float-left">Liste reservations d'evenement</span>
                            <span class="float-right"><i class="fas fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-4 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
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
                            <i class="fas fa-fw fa-list"></i>
                          </div>
                          <div class="mr-5">{{$besoinclient_count}} Besoins Clients</div>
                      </div>
                        <a class="card-footer text-white clearfix small z-1" href="besoinclient">
                          <span class="float-left">Liste des besoins des client</span>
                          <span class="float-right"><i class="fas fa-angle-right"></i></span>
                        </a>
                  </div>
                </div>
                <div class="col-xl-3 col-sm-4 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-list" ></i>
                            </div>
                            <div class="mr-5">{{$bedroom_count}} Type de Chambre</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="bedroom">
                            <span class="float-left">Liste des types de chambre</span>
                            <span class="float-right"><i class="fas fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
