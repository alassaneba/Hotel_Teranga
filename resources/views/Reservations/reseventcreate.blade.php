@extends('layout')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <div class="container">
        <form action="reseventcreate" method="post">
    @csrf
            <div>
                <input type="text" name="Nom_evenement" class="form-control" placeholder="Nom de l'evenement">
            </div>
            <div>
                <input type="date" name="Date_debut" class="form-control" placeholder="Date début">
            </div>
            <div>
                <input type="date" name="Date_fin" class="form-control" placeholder="Date fin">
            </div>
            <div>
                <select type="text" name="Duree" class="form-control" placeholder="Duree de l'evenement ">
                    <option value="Matinee">Matinee</option>
                    <option value="Apres_midi">Apres midi</option>
                    <option value="Soiree">Soiree</option>
                    <option value="Journee_entiere">Journee entiere</option>
                </select>
            </div>
            <div>
                <input type="number" name="Nombre_participant" class="form-control" placeholder="Nombre de participant">
            </div>
            <div>
                <select type="text" name="Restauration" class="form-control">
                   <option>--Restauration--</option>
                    <option value="NON">Non</option>
                    <option value=OUI>Oui</option>
                </select>
            </div>
            <div>
                <input type="text" name="Prenom" class="form-control" placeholder="Prenom">
            </div>
            <div>
                <input type="text" name="Nom" class="form-control" placeholder="Nom">
            </div>
            <div>
                <input type="text" name="Societe" class="form-control" placeholder="Societe">
            </div>
            <div>
                <input type="text" name="Secteur_activite" class="form-control" placeholder="Secteur d'activité">
            </div>
            <div>
                <input type="email" name="Email" class="form-control" placeholder="Email">
            </div>
            <div>
                <input type="text" name="Telephone" class="form-control" placeholder="Telephone">
            </div>
            <div>
                <select type="number" name="Administrator_id" class="form-control" placeholder="Id Administrateur">
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
