@extends('layouts.moderator')
@section('title', "Edition Reservation Evenementiel")
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
                  <li class="breadcrumb-item active">Reservation Evenement</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
    </div>
    <div class="container">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire de modification d'evenement</h3>
        <div class="card-tools">
        </div>
      </div>
        <form action="/reseventupdate/{{$reseventedit->id}}"  method="post">
    @csrf
    @method('patch')
            <div><label>Nom evenement</label>
                <input type="text" name="Nom_evenement" class="form-control" value="{{$reseventedit->Nom_evenement}}">
            </div>
            <div><label>Type d'evenement</label>
                <select name="type_event_id" id="Type_evenement" class="form-control" value="{{$reseventedit->typeevent_id}}">
                  @foreach ($typeevenememt as $key => $value)
                    @if ($value==$typeevent )
                      <option value="{{ $key }}" selected >{{ $value }}</option>
                    @else
                      <option value="{{ $key }}" >{{ $value }}</option>
                    @endif
                   @endforeach
                </select>
            </div>
            <div><label>Date debut</label>
                <input type="date" name="Date_debut" class="form-control" value="{{$reseventedit->Date_debut}}">
            </div>
            <div><label>Date fin</label>
                <input type="date" name="Date_fin" class="form-control" value="{{$reseventedit->Date_fin}}">
            </div>
            <div><label>Duree</label>
                <select type="text" name="Duree" class="form-control">
                    <option>Duree de l'evenement </option>
                    <option value="Matinee" {{$reseventedit->Duree==="Matinee"?'selected="selected"':''}}>Matinee</option>
                    <option value="Apres-midi" {{$reseventedit->Duree==="Apres-midi"?'selected="selected"':''}}>Apres-midi</option>
                    <option value="Soiree" {{$reseventedit->Duree==="Soiree"?'selected="selected"':''}}>Soiree</option>
                    <option value="Journee-entiere" {{$reseventedit->Duree==="Journee-entiere"?'selected="selected"':''}}>Journee-entiere</option>
                </select>
            </div>
            <div><label>Salle de l'evenement</label>
                <select name="room_id" id="Salles" class="form-control" value="{{$reseventedit->room_id}}">
                  @foreach ($salles as $key => $value)
                    @if ($value==$room )
                      <option value="{{ $key }}" selected >{{ $value }}</option>
                    @else
                      <option value="{{ $key }}" >{{ $value }}</option>
                    @endif
                   @endforeach
                </select>
            </div>
            <div><label>Disposition de la salle</label>
                <select name="disposal_room_id" id="Disposition" class="form-control" value="{{$reseventedit->disposalroom_id}}">
                  @foreach ($disposition as $key => $value)
                    @if ($value==$disposalroom )
                      <option value="{{ $key }}" selected >{{ $value }}</option>
                    @else
                      <option value="{{ $key }}" >{{ $value }}</option>
                    @endif
                   @endforeach
                </select>
            </div>
            <div><label>Nombre de participant</label>
                <input type="number" name="Nombre_participant" class="form-control" value="{{$reseventedit->Nombre_participant}}">
            </div>
            <div><label>Restauration</label>
                <select type="text" name="Restauration" class="form-control">
                    <option>Restauration</option>
                    <option value="Non" {{$reseventedit->Restauration==="Non"?'selected="selected"':''}}>Non</option>
                    <option value="Oui" {{$reseventedit->Restauration==="Oui"?'selected="selected"':''}}>Oui</option>
                </select>
            </div>
            <div class="checkbox" value="{{$reseventedit->Equipement}}"><label>Equipement</label>
                <ul>
                    <li><input type="checkbox" name="Equipement1" value="Video-projecteur">Video-projecteur</li>
                    <li><input type="checkbox" name="Equipement2" value="Internet">Internet</li>
                    <li><input type="checkbox" name="Equipement3" value="Sonorisation">Sonorisation</li>
                    <li><input type="checkbox" name="Equipement4" value="Autres">Autres</li>
                </ul>
            </div>
            <div><label>Autres informations supplementaires</label>
                <textarea name="Autres_informations" id="" cols="30" rows="3" class="form-control">{{$reseventedit->Autres_informations}}</textarea>
            </div>
            <div><label>Civilite</label>
                <select type="text" name="Civilite" class="form-control" value="{{$reseventedit->Civilite}}">
                    <option></option>
                    <option value="Mr." {{$reseventedit->Civilite==="Mr."?'selected="selected"':''}}>Mr.</option>
                    <option value="Mme." {{$reseventedit->Civilite==="Mme."?'selected="selected"':''}}>Mme.</option>
                    <option value="Mlle." {{$reseventedit->Civilite==="Mlle."?'selected="selected"':''}}>Mlle.</option>
                </select>
            </div>
            <div><label>Prenom</label>
                <input type="text" name="Prenom" class="form-control" value="{{$reseventedit->Prenom}}">
            </div>
            <div><label>Nom</label>
                <input type="text" name="Nom" class="form-control" value="{{$reseventedit->Nom}}">
            </div>
            <div><label>Identifiant</label>
                <input type="text" name="Identifiant" class="form-control" placeholder="Numero Passeport ou Cni"  value="{{$reseventedit->Identifiant}}">
            </div>
            <div><label>Societe</label>
                <input type="text" name="Societe" class="form-control" value="{{$reseventedit->Societe}}">
            </div>
            <div><label>Secteur d'activite</label>
                <input type="text" name="Secteur_activite" class="form-control" value="{{$reseventedit->Secteur_activite}}">
            </div>
            <div><label>Email</label>
                <input type="email" name="Email" class="form-control" value="{{$reseventedit->Email}}">
            </div>
            <div><label>Telephone</label>
                <input type="text" name="Telephone" class="form-control" value="{{$reseventedit->Telephone}}">
            </div>
            <div><label>Montant payer</label>
                <input type="number" name="Montant_payer" class="form-control" value="{{$reseventedit->Montant_payer}}">
            </div>
            <div><label>Statut</label>
                <select type="text" name="Statut" class="form-control">
                  <option value="En attente" {{$reseventedit->Statut==="En attente"?'selected="selected"':''}}>En attente</option>
                  <option value="Confirmer" {{$reseventedit->Statut==="Confirmer"?'selected="selected"':''}}>Confirmer</option>
                  <option value="Valider" {{$reseventedit->Statut==="Valider"?'selected="selected"':''}}>Valider</option>
                  <option value="Annuler" {{$reseventedit->Statut==="Annuler"?'selected="selected"':''}}>Annuler</option>
                </select>
            </div>
            <div><label>Responsable</label>
              <select type="text" name="user_id"  class="form-control" readonly>
              <option value="{{ Auth::user()->id }}" >{{ Auth::user()->name }}</option>
              </select>
            </div>
              <br>
            <div class="text-center">
                <button class="btn btn-primary">Modifier</button>
            </div>
              <br>
        </form>
    </div>
@endsection
@section('js')

@endsection
