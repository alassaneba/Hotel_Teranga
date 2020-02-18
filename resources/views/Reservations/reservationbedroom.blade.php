@extends('layouts.superadmin')
@section('title', "Liste Reservation Chambre")
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
                <li class="breadcrumb-item"><a href="{{route('Backoffice')}}">Tableau de bord</a></li>
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
              <div class="card-body table-responsive p-0" style="height: 100%;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th>Arriver</th>
                      <th>Heure</th>
                      <th>Depart</th>
                      <th>Chambre</th>
                      <th>Adulte</th>
                      <th>Enfant</th>
                      <th>Chambre</th>
                      <th>Numero</th>
                      <th>Civilite</th>
                      <th>Prenom</th>
                      <th>Nom </th>
                      <th>Nationalite</th>
                      <th>Identifiant</th>
                      <th>Email</th>
                      <th>Telephone</th>
                      <th>Montant</th>
                      <th>Statut</th>
                      <th>User_id</th>
                      <th>Editer</th>
                      <th>Supprimer</th>
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
                      <td>{{$reservations->Identifiant}} </td>
                      <td>{{$reservations->Email}}</td>
                      <td>{{$reservations->Telephone}}</td>
                      <td>{{$reservations->Montant_payer}}</td>
                      <td>{{$reservations->Statut}}</td>
                      <td>{{$reservations->User_id}}</td>
                      <td> <p class="btn btn-outline-secondary"><a href="resbedroomedit/{{$reservations->id}}">Editer</a></p></td>
                      <td><form action="resbedroomedit/{{$reservations->id}}" method="post" onsubmit="return confirm('Voulez-vous supprimer ?')">
                      @csrf
                      @method('delete')
                      <input type="submit" class="btn btn-danger" name="delete" value="Supprimer">
                      </form></td>
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
