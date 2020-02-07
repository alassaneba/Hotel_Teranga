@extends('layouts.moderator')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <section>
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Hotel Teranga</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord / Moderator</a></li>
                <li class="breadcrumb-item active">Reservation Chambre</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tableau des reservations de chambre</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 375px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th>Date arriver</th>
                      <th>Heure arriver</th>
                      <th>Date depart</th>
                      <th>Nombre chambre</th>
                      <th>Nombre adulte</th>
                      <th>Nombre enfant</th>
                      <th>Type chambre</th>
                      <th>Numero chambre</th>
                      <th>Civilite</th>
                      <th>Prenom</th>
                      <th>Nom </th>
                      <th>Nationalite</th>
                      <th>Email</th>
                      <th>Telephone</th>
                      <th>Montant a payer</th>
                      <th>Statut</th>
                      <th>User_id</th>
                      <th>Editer</th>
                    </tr>
                  </thead>
                  @foreach($reservationbedroom as $reservations)
                  <tbody>
                    <tr>
                      <td>{{$reservations->Date_arriver}}</td>
                      <td>{{$reservations->Heure_arriver}}</td>
                      <td>{{$reservations->Date_depart}}</td>
                      <td>{{$reservations->Nombre_chambre}}</td>
                      <td>{{$reservations->Nombre_adulte}}</td>
                      <td>{{$reservations->Nombre_enfant}}</td>
                      <td>{{$reservations->Type_chambre}}</td>
                      <td>{{$reservations->Numero_chambre}}</td>
                      <td>{{$reservations->Civilite}}</td>
                      <td>{{$reservations->Prenom}}</td>
                      <td>{{$reservations->Nom}} </td>
                      <td>{{$reservations->Nationalite}} </td>
                      <td>{{$reservations->Email}}</td>
                      <td>{{$reservations->Telephone}}</td>
                      <td>{{$reservations->Montant_payer}}</td>
                      <td>{{$reservations->Statut}}</td>
                      <td>{{$reservations->User_id}}</td>
                      <td> <p class="btn btn-outline-secondary"><a href="resbedroomedit/{{$reservations->id}}">Editer</a></p></td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
</section>
@endsection
