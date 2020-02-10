@extends('layouts.superadmin')
@section('title', "Edition Reservation Evenementiel")
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
                  <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord / Superadmin</a></li>
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
                <input type="text" name="Nom_evenement" class="form-control" placeholder="Nom de l'evenement" value="{{$reseventedit->Nom_evenement}}">
            </div>
            <div><label>Type d'evenement</label>
                <select name="Type_evenement" id="Type_evenement" value="{{$reseventedit->Type_evenement}}" class="form-control">
                 <option></option>
                    @foreach($typeevenememt as $id => $value)
                    <option value="{{$value}}">{{$value}}</option>
                    @endforeach
                </select>
            </div>
            <div><label>Date debut</label>
                <input type="date" name="Date_debut" class="form-control" placeholder="Date début" value="{{$reseventedit->Date_debut}}">
            </div>
            <div><label>Date fin</label>
                <input type="date" name="Date_fin" class="form-control" placeholder="Date fin" value="{{$reseventedit->Date_fin}}">
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
            <div><label>Salles de l'evenement</label>
                <select name="Salles" id="Salles" value="{{$reseventedit->Salles}}" class="form-control">
                    <option></option>
                    @foreach($salles as $id => $value)
                        <option value="{{$value}}">{{$value}}</option>
                    @endforeach
                </select>
            </div>
            <div><label>Disposition de la salle</label>
                <select name="Disposition" id="Disposition" value="{{$reseventedit->Disposition}}" class="form-control">
                    <option></option>
                    @foreach($disposition as $id => $value)
                        <option value="{{$value}}">{{$value}}</option>
                    @endforeach
                </select>
            </div>
            <div><label>Nombre de participant</label>
                <input type="number" name="Nombre_participant" class="form-control" placeholder="Nombre de participant" value="{{$reseventedit->Nombre_participant}}">
            </div>
            <div><label>Restauration</label>
                <select type="text" name="Restauration" class="form-control" placeholder="Restauration">
                    <option></option>
                    <option value="NON" {{$reseventedit->Restauration==="Non"?'selected="selected"':''}}>Non</option>
                    <option value="OUI" {{$reseventedit->Restauration==="Oui"?'selected="selected"':''}}>Oui</option>
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
                <textarea name="Autres_informations" id="" cols="30" rows="4" class="form-control" placeholder="Autres informations supplementaires">{{$reseventedit->Autres_informations}}</textarea>
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
                <input type="text" name="Prenom" class="form-control" placeholder="Prenom" value="{{$reseventedit->Prenom}}">
            </div>
            <div><label>Nom</label>
                <input type="text" name="Nom" class="form-control" placeholder="Nom" value="{{$reseventedit->Nom}}">
            </div>
            <div><label>Identifiant</label>
                <input type="text" name="Identifiant" class="form-control" placeholder="Numero Passeport ou Cni"  value="{{$reseventedit->Identifiant}}">
            </div>
            <div><label>Societe</label>
                <input type="text" name="Societe" class="form-control" placeholder="Societe" value="{{$reseventedit->Societe}}">
            </div>
            <div><label>Secteur d'activite</label>
                <input type="text" name="Secteur_activite" class="form-control" placeholder="Secteur d'activité" value="{{$reseventedit->Secteur_activite}}">
            </div>
            <div><label>Email</label>
                <input type="email" name="Email" class="form-control" placeholder="Email" value="{{$reseventedit->Email}}">
            </div>
            <div><label>Telephone</label>
                <input type="text" name="Telephone" class="form-control" placeholder="Telephone" value="{{$reseventedit->Telephone}}">
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
                <select type="number" name="User_id" class="form-control" placeholder="Id User" value="{{$reseventedit->User_id}}">
                  <option value="1" {{$reseventedit->User_id==="Admin"?'selected="selected"':''}}>Admin</option>
                  <option value="2" {{$reseventedit->User_id==="Moderator1"?'selected="selected"':''}}>Moderator1</option>
                  <option value="3" {{$reseventedit->User_id==="Moderator2"?'selected="selected"':''}}>Moderator2</option>
                </select>
            </div>
            <div>
                <button class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>
@endsection
