@extends('layout')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

    <div class="container">
        <form action="/reseventupdate/{{$reseventedit->id}}" method="post">
            @csrf
            @method('patch')
            <div>
                <input type="text" name="Nom_evenement" class="form-control" placeholder="Nom de l'evenement" value="{{$reseventedit->Nom_evenement}}">
            </div>
            <div>
                <input type="date" name="Date_debut" class="form-control" placeholder="Date début" value="{{$reseventedit->Date_debut}}">
            </div>
            <div>
                <input type="date" name="Date_fin" class="form-control" placeholder="Date fin" value="{{$reseventedit->Date_fin}}">
            </div>
            <div>
                <select type="text" name="Duree" class="form-control" placeholder="Duree de l'evenement " value="{{$reseventedit->Duree }}">
                    <option value="Matinee">Matinee</option>
                    <option value="Apres_midi">Apres midi</option>
                    <option value="Soiree">Soiree</option>
                    <option value="Journee_entiere">Journee entiere</option>
                </select>
            </div>
            <div>
                <input type="number" name="Nombre_participant" class="form-control" placeholder="Nombre de participant" value="{{$reseventedit->Nombre_participant}}">
            </div>
            <div>
                <select type="text" name="Restauration" class="form-control" value="{{$reseventedit->Restauration}}">
                    <option>--Restauration--</option>
                    <option value="NON">Non</option>
                    <option value=OUI>Oui</option>
                </select>
            </div>
            <div>
                <input type="text" name="Prenom" class="form-control" placeholder="Prenom" value="{{$reseventedit->Prenom}}">
            </div>
            <div>
                <input type="text" name="Nom" class="form-control" placeholder="Nom" value="{{$reseventedit->Nom}}">
            </div>
            <div>
                <input type="text" name="Societe" class="form-control" placeholder="Societe" value="{{$reseventedit->Societe}}">
            </div>
            <div>
                <input type="text" name="Secteur_activite" class="form-control" placeholder="Secteur d'activité" value="{{$reseventedit->Secteur_activite}}">
            </div>
            <div>
                <input type="email" name="Email" class="form-control" placeholder="Email" value="{{$reseventedit->Email}}">
            </div>
            <div>
                <input type="text" name="Telephone" class="form-control" placeholder="Telephone" value="{{$reseventedit->Telephone}}">
            </div>
            <div>
                <select type="number" name="Administrator_id" class="form-control" placeholder="Id Administrateur" value="{{$reseventedit->Administrator_id}}">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div>
                <button class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection
