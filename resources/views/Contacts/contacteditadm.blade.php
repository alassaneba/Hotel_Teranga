@extends('layouts.admin')
@section('title', "Edition Message/Contact")
@section('css')

@endsection
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
              <li class="breadcrumb-item"><a href="{{route('Backoffice')}}">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Contact / Message</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container border">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire modification de Message</h3>
        <div class="card-tools">
        </div>
      </div>
        <form action="/contactmessageupdate/{{$contactedit->id}}" method="post">
    @csrf
    @method('patch')
            <div><label>Nom complet</label>
               <input type="text" name="Nom_complet" class="form-control" value="{{$contactedit->Nom_complet}}">
            </div>
            <div><label>Email</label>
               <input type="text" name="Email" class="form-control" value="{{$contactedit->Email}}">
            </div>
            <div><label>Objet</label>
               <input type="text" name="Objet" class="form-control" value="{{$contactedit->Objet}}">
            </div>
            <div><label>Message</label>
                <textarea name="Message" cols="30" rows="5" class="form-control">{{$contactedit->Message}}</textarea>
            </div>
            <div><label>Statut</label>
                <select type="text" name="Statut" class="form-control" value="{{$contactedit->Statut}}">
                    <option value="En attente"><span class="badge badge-warning">En attente</span></option>
                    <option value="Confirmer"><span class="badge badge-info">Confirmer</span></option>
                    <option value="Valider"><span class="badge badge-success">Valider</span></option>
                    <option value="Annuler"><span class="badge badge-danger">Annuler</span></option>
                </select>
            </div>
            <div><label>Responsable</label>
              <select type="text" name="user_id"  class="form-control" readonly>
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
@section('js')

@endsection
