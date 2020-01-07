@extends('layouts.admin')

@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Tableau de bord</a>
                </li>
                <li class="breadcrumb-item active">Sommaire</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
                <div class="col-xl-3 col-sm-4 mb-3">
                    <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">{{$bedroom_count}} Type de Chambre</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="/admin/reservationbedroom">
                            <span class="float-left">Liste des types de chambre</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-4 mb-3">
                    <div class="card text-white bg-secondary o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">{{$resbedroom_count}} Reservation Chambre</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="/admin/categories">
                            <span class="float-left">Liste des reservations de chambre</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-4 mb-3">
                    <div class="card text-white bg-success o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-shopping-cart"></i>
                            </div>
                            <div class="mr-5">{{$resevent_count}} Reservation Evenement</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="/admin/sellers">
                            <span class="float-left">Liste des reservations d'evenement</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-4 mb-3">
                    <div class="card text-white bg-danger o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-list"></i>
                            </div>
                            <div class="mr-5">{{$contact_count}} Message</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="/admin/categories">
                            <span class="float-left">Liste des messages</span>
                            <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright © Hotel Teranga 2020</span>
                </div>
            </div>
        </footer>
    </div>
@endsection
