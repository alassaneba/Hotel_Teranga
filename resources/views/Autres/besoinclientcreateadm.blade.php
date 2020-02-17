@extends('layouts.admin')
@section('title', "Creation Besoins Clients")
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Hotel Teranga</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord / Admin</a></li>
              <li class="breadcrumb-item active">Besoins des Clients</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
</div>
<div class="container border">
  <div class="card-header">
    <h3 class="card-title-center">Formulaire de creation besoin client</h3>
    <div class="card-tools">
    </div>
  </div>
    <form action="{{route('creation/besoin/client')}}" method="post" >
    @csrf
            <div><label>Nom Complet</label>
              <input type="text" name="Nom_complet" class="form-control">
            </div>
            <div><label>Numero de chambre</label>
                <input type="text" name="Numero_chambre" class="form-control">
            </div>
            <div><label>Description du besoin</label>
                <textarea name="Description_besoin" cols="30" rows="7" class="form-control"></textarea>
            </div>
            <div><label>Montant a payer</label>
                <input type="number" name="Montant_payer" class="form-control">
            </div>
            <div><label>Agent conserner</label>
              <input type="text" name="Agent_conserner" class="form-control">
            </div>
            <div><label>Statut</label>
                <select type="text" name="Statut" class="form-control">
                    <option value="En attente">En attente</option>
                    <option value="Confirmer">Confirmer</option>
                    <option value="Valider">Valider</option>
                    <option value="Annuler">Annuler</option>
                </select>
            </div>
            <div><label>Responsable</label>
              <select type="text" name="User_id"  class="form-control" readonly>
              <option value="{{ Auth::user()->id }}" >{{ Auth::user()->name }}</option>
              </select>
            </div>
              <br>
            <div class="text-center">
                <button class="btn btn-primary">Enregistrer</button>
            </div>
              <br>
        </form>
    </div>
@endsection
