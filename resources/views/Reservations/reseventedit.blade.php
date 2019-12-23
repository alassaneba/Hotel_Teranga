@extends('layout')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <div class="container">
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
                <select type="text" name="Duree" class="form-control" value="{{$reseventedit->Duree}}">
                    <option>Duree de l'evenement </option>
                    <option value="Matinee">Matinee</option>
                    <option value="Apres-midi">Apres-midi</option>
                    <option value="Soiree">Soiree</option>
                    <option value="Journee-entiere">Journee-entiere</option>
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
                <select type="text" name="Restauration" class="form-control" placeholder="Restauration" value="{{$reseventedit->Restauration}}">
                    <option></option>
                    <option value="NON">Non</option>
                    <option value=OUI>Oui</option>
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
            <div><label>Civilite</label>
                <select type="text" name="Civilite" class="form-control" value="{{$reseventedit->Civilite}}">
                    <option>Civilite</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Mme.">Mme.</option>
                    <option value="Mlle.">Mlle.</option>
                </select>
            </div>
            <div><label>Prenom</label>
                <input type="text" name="Prenom" class="form-control" placeholder="Prenom" value="{{$reseventedit->Prenom}}">
            </div>
            <div><label>Nom</label>
                <input type="text" name="Nom" class="form-control" placeholder="Nom" value="{{$reseventedit->Nom}}">
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
            <div><label>Id Administrateur</label>
                <select type="number" name="Administrator_id" class="form-control" placeholder="Id Administrateur" value="{{$reseventedit->Administrator_id}}">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
            <div>
                <button class="btn btn-primary">Reserver</button>
            </div>
        </form>
    </div>
@endsection
