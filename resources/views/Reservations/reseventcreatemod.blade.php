@extends('layouts.moderator')
@section('title', "Creation Reservation Evenementiel")
@section('css')

@endsection
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="text-center alert alert-danger">{{$error}}</div>
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
<div class="container border">
  <div class="card-header">
    <h3 class="card-title-center">Formulaire de reservation d'evenement</h3>
    <div class="card-tools">
    </div>
  </div>
  <form action="{{route('creation/reservation/event')}}" method="post" >
    @csrf
        <div><label>Nom de l'evenement</label>
            <input type="text" name="Nom_evenement" class="form-control">
        </div>
        <div><label>Type d'evenement</label>
            <select name="type_event_id" id="Type_evenement" class="form-control">
                <option></option>
                @foreach($typeevenememt as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div><label>Date debut</label>
            <input type="date" name="Date_debut" id="Date_debut" min="<?php echo date('Y-m-d'); ?>" class="form-control">
        </div>
        <div><label>Date fin</label>
            <input type="date" name="Date_fin" id="Date_fin" min="<?php echo date('Y-m-d'); ?>" class="form-control">
        </div>
        <div><label>Duree de l'evenement</label>
            <select type="text" name="Duree" class="form-control">
                <option></option>
                <option value="Matinee">Matinee</option>
                <option value="Apres-midi">Apres-midi</option>
                <option value="Soiree">Soiree</option>
                <option value="Journee-entiere">Journee-entiere</option>
            </select>
        </div>
        <div><label>Salle de l'evenement</label>
          <select name="room_id" id="Salles" class="form-control">
              <option></option>
              @foreach($salles as $key => $value)
                @continue ($value->Statut == 'Indisponible')
                  <option value="{{$value->id}}">{{$value->Salles}}</option>
              @endforeach
          </select>
        </div>
        <div><label>Disposition de la salle</label>
            <select name="disposal_room_id" id="Disposition" class="form-control">
                <option></option>
                @foreach($disposition as $key => $value)
                    <option value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div><label>Nombre de participant</label>
            <input type="number" name="Nombre_participant" class="form-control">
        </div>
        <div><label>Restauration</label>
            <select type="text" name="Restauration" class="form-control">
                <option></option>
                <option value="NON">Non</option>
                <option value=OUI>Oui</option>
            </select>
        </div>
        <div><label>Equipement</label>
            <ul>
                <li><input type="checkbox" name="Equipement1" value="Video-projecteur">Video-projecteur</li>
                <li><input type="checkbox" name="Equipement2" value="Internet">Internet</li>
                <li><input type="checkbox" name="Equipement3" value="Sonorisation">Sonorisation</li>
                <li><input type="checkbox" name="Equipement4" value="Autres">Autres</li>
            </ul>
        </div>
        <div><label>Autres informations supplementaires</label>
            <textarea name="Autres_informations" id="" cols="30" rows="3" class="form-control"></textarea>
        </div>
        <div><label>Civilite</label>
            <select type="text" name="Civilite" class="form-control">
                <option></option>
                <option value="Mr.">Mr.</option>
                <option value="Mme.">Mme.</option>
                <option value="Mlle.">Mlle.</option>
            </select>
        </div>
        <div><label>Prenom</label>
            <input type="text" name="Prenom" class="form-control">
        </div>
        <div><label>Nom</label>
            <input type="text" name="Nom" class="form-control">
        </div>
        <div><label>Identifiant</label>
            <input type="text" name="Identifiant" class="form-control" placeholder="Numero Passeport ou Cni">
        </div>
        <div><label>Societe</label>
            <input type="text" name="Societe" class="form-control">
        </div>
        <div><label>Secteur d'activite</label>
            <input type="text" name="Secteur_activite" class="form-control">
        </div>
        <div><label>Email</label>
            <input type="email" name="Email" class="form-control">
        </div>
        <div><label>Telephone</label>
            <input type="text" name="Telephone" class="form-control">
        </div>
        <div><label>Montant payer</label>
            <input type="number" name="Montant_payer" class="form-control">
        </div>
        <div><label>Statut</label>
            <select type="text" name="Statut" class="form-control">
                <option value="En attente"><span class="badge badge-warning">En attente</span></option>
                <option value="Confirmer"><span class="badge badge-info">Confirmer</span></option>
                <option value="Disponible"><span class="badge badge-success">Valider</span></option>
                <option value="Indisponible"><span class="badge badge-danger">Annuler</span></option>
            </select>
        </div>
        <div><label>Responsable</label>
          <select type="text" name="user_id"  class="form-control" readonly>
          <option value="{{ Auth::user()->id }}" >{{ Auth::user()->name }}</option>
          </select>
        </div>
          <br>
        <div class="text-center">
            <button class="btn btn-primary">Reserver</button>
        </div>
          <br>
    </form>
    </div>
@endsection
@section('js')
<script type="text/javascript">
document.getElementById('Date_debut').valueAsDate = new Date();
document.getElementById('Date_fin').valueAsDate = new Date();
</script>
@endsection
