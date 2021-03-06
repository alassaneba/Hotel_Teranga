@extends('layouts.admin')
@section('title', "Liste Reservation Evenementiel")
@section('css')

@endsection
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="text-center alert alert-danger">{{$error}}</div>
        @endforeach
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
              <li class="breadcrumb-item active">Reservation Evenement</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Tableau des reservations d'evenement</h3>

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
              <table class="table table-bordered table-head-fixed-bordered">
                <thead class="text-center">
                 <tr>
                   <th>Nom</th>
                   <th>Evenement</th>
                   <th>Debut</th>
                   <th>Fin</th>
                   <th>Duree</th>
                   <th>Salles</th>
                   <th>Disposition</th>
                   <th>Participant</th>
                   <th>Restauration</th>
                   <th>Equipement</th>
                   <th>Informations</th>
                   <th>Civilite</th>
                   <th>Prenom</th>
                   <th>Nom </th>
                   <th>Identifiant</th>
                   <th>Societe</th>
                   <th>Secteur</th>
                   <th>Email</th>
                   <th>Telephone</th>
                   <th>Montant</th>
                   <th>Statut</th>
                   <th>Responsable</th>
                   <th>Editer</th>
                   <th>Supprimer</th>
               </tr>
              </thead>
    @foreach($resevationevents as $reservationevent)
    <tbody class="text-center">
        <tr>
            <td>{{$reservationevent->Nom_evenement}}</td>
            <td>{{$reservationevent->typeevent->Type_evenement ?? ''}}</td>
            <td>{{$reservationevent->Date_debut}}</td>
            <td>{{$reservationevent->Date_fin}}</td>
            <td>{{$reservationevent->Duree}}</td>
            <td>{{$reservationevent->room->Salles ?? ''}}</td>
            <td>{{$reservationevent->disposalroom->Disposition ?? ''}}</td>
            <td>{{$reservationevent->Nombre_participant}}</td>
            <td>{{$reservationevent->Restauration}}</td>
            <td>{{str_replace("|"," ", $reservationevent->Equipement)}}</td>
            <td><textarea cols="30" rows="2" class="form-control" readonly>{{$reservationevent->Autres_informations}}</textarea></td>
            <td>{{$reservationevent->Civilite}}</td>
            <td>{{$reservationevent->Prenom}}</td>
            <td>{{$reservationevent->Nom}} </td>
            <td>{{$reservationevent->Identifiant}} </td>
            <td>{{$reservationevent->Societe}}</td>
            <td>{{$reservationevent->Secteur_activite}}</td>
            <td>{{$reservationevent->Email}}</td>
            <td>{{$reservationevent->Telephone}}</td>
            <td>{{$reservationevent->Montant_payer}}</td>
            <td>{{$reservationevent->Statut}}</td>
            <td>{{$reservationevent->user->name ?? '' }}</td>
            <td> <p class="btn btn-outline-secondary"><a href="reseventedit/{{$reservationevent->id}}">Editer</a></p></td>
            <td><form action="reseventedit/{{$reservationevent->id}}" method="post" onsubmit="return confirm('Voulez-vous supprimer ?')">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-danger" name="delete" value="Supprimer">
                </form></td>
        </tr>
      </tbody>
        @endforeach
    </table>
     </div>
    </div>
   </div>
  </div>
</section>
@endsection
