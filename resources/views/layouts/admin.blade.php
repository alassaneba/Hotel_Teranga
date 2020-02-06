<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Tableau de bord | Hotel Teranga</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('admin-assets/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('app-assets/css/icomoon.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin-assets/dist/css/adminlte.min.css')}}">
  <!-- todolist -->
  <link rel="stylesheet" href="{{asset('admin-assets/dist/css/todolist.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini" >
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('admin')}}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{route('home')}}" class="nav-link">Site Web</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-5">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
            @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
            @endif
            @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>
         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
               {{ __('Déconnexion') }}
             </a>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
             </form>
         </div>
        </li>
             @endguest
      </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin')}}" class="brand-link">
      <img src="{{asset('admin-assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TABLEAU DE BORD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class=""><label class="brand-text weight-light breadcrumb">HotelTeranga / Responsable</label>
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
          </a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link bg-green">
              <i class="fas fa-fw fa-bed"></i>
              <p>
                Reservation Chambre
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('reservation/bedroom')}}" class="nav-link">
                  <i class="fas fa-fw fa-list"></i>
                  <p>Liste Reservation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('creation/reservation/bedroom')}}" class="nav-link">
                  <i class="far fa-calendar-alt"></i>
                  <p>Formulaire Reservation</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link bg-yellow">
              <i class="far fa-calendar-alt"></i>
              <p>
                Reservation Evenement
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('reservation/event')}}" class="nav-link">
                  <i class="fas fa-fw fa-list"></i>
                  <p>Liste Evenement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('creation/reservation/event')}}" class="nav-link">
                  <i class="far fa-calendar-alt"></i>
                  <p>Formulaire Evenement</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link bg-red">
              <i class="far fa-envelope"></i>
              <p>
                Contact / Message
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('contact/message')}}" class="nav-link">
                  <i class="fas fa-fw fa-list"></i>
                  <p>Liste Contact / Message</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('temoignage')}}" class="nav-link">
                  <i class="far fa-calendar-alt"></i>
                  <p>Temoignage</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link bg-orange">
              <i class="far fa-user"></i>
              <p>
                Besoins des Clients
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('besoin/client')}}" class="nav-link">
                  <i class="fas fa-fw fa-list"></i>
                  <p>Liste des Besoins</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('creation/besoin/client')}}" class="nav-link">
                  <i class="far fa-calendar-alt"></i>
                  <p>Formulaire Besoins Clients</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link bg-blue">
              <i class="fas fa-fw fa-list"></i>
              <p>
                Type de Chambre
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('chambre')}}" class="nav-link">
                  <i class="fas fa-fw fa-list"></i>
                  <p>Liste Type de Chambre</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('creation/chambre')}}" class="nav-link">
                  <i class="far fa-calendar-alt"></i>
                  <p>Creation Type de Chambre</p>
                </a>
              </li>
            </ul>
          </li>
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link bg-pink">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Disposition Salles
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('disposition/salle')}}" class="nav-link">
                      <i class="fas fa-fw fa-list"></i>
                      <p>Liste Type Dispositon</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{route('creation/disposition/salle')}}" class="nav-link">
                      <i class="far fa-calendar-alt"></i>
                      <p>Creation Type Disposition</p>
                    </a>
                  </li>
                </ul>
              </li>
              <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                  <li class="nav-item has-treeview">
                    <a href="#" class="nav-link bg-olive">
                      <i class="fas fa-fw fa-list"></i>
                      <p>
                        Espaces et Salles
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="{{route('salle')}}" class="nav-link">
                          <i class="fas fa-fw fa-list"></i>
                          <p>Liste Espace et Salle</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="{{route('creation/salle')}}" class="nav-link">
                          <i class="far fa-calendar-alt"></i>
                          <p>Creation Espace et Salle</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                      <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->
                      <li class="nav-item has-treeview">
                        <a href="#" class="nav-link bg-navy">
                          <i class="fas fa-fw fa-list"></i>
                          <p>
                            Type Evenement
                            <i class="right fas fa-angle-left"></i>
                          </p>
                        </a>
                        <ul class="nav nav-treeview">
                          <li class="nav-item">
                            <a href="{{route('type/evenement')}}" class="nav-link">
                              <i class="fas fa-fw fa-list"></i>
                              <p>Liste Type Evenement</p>
                            </a>
                          </li>
                          <li class="nav-item">
                            <a href="{{route('creation/type/evenement')}}" class="nav-link">
                              <i class="far fa-calendar-alt"></i>
                              <p>Creation Type Evenement</p>
                            </a>
                          </li>
                        </ul>
                      </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <div style="min-height:70vh;">
@yield('content')
</div>
<a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
   <i class="fas fa-chevron-up"></i>
</a>
</div>
<!-- ./wrapper -->
<footer class="main-footer mb-0 ml-0" style="width:95%; margin-bottom: 0px;" >
 <div class="row">
     <div class="col-md-10 text-right">
         <p>  Copyright &copy;<script>document.write(new Date().getFullYear());</script> TOUS DROITS RESERVES| Site web crée avec <i class="icon-heart" aria-hidden="true"></i> par Al Assane BA chez <a href="https://galimatech.com" target="_blank">Galima Tech</a></p>
     </div>
 </div>
 </footer>
<!-- Main Footer -->
<!-- REQUIRED SCRIPTS -->
<script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin-assets/dist/js/adminlte.min.js')}}"></script>
<!-- todo list -->
<script  src="{{asset('admin-assets/dist/js/todolist.js')}}"></script>
@yield('js')
</body>
</html>
