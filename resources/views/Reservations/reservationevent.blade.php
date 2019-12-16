@extends('layout')
@section('content')
    <section class="table table-striped" >
        <form >
    <table>
       <tr>
           <th>Nom_evenement</th>
           <th>Date_debut</th>
           <th>Date_fin</th>
           <th>Duree</th>
           <th>Nombre_participant</th>
           <th>Restauration</th>
           <th>Prenom</th>
           <th>Nom </th>
           <th>Societe</th>
           <th>Secteur_activite</th>
           <th>Email</th>
           <th>Telephone</th>
           <th>Administrator_id</th>
      </tr>
    </table>
        </form>
    @foreach($resevationevents as $reservationevent)
        <table>
        <tr>
            <th>{{$reservationevent->Nom_evenement}}</th>
            <th>{{$reservationevent->Date_debut}}</th>
            <th>{{$reservationevent->Date_fin}}</th>
            <th>{{$reservationevent->Duree}}</th>
            <th>{{$reservationevent->Nombre_participant}}</th>
            <th>{{$reservationevent->Restauration}}</th>
            <th>{{$reservationevent->Prenom}}</th>
            <th>{{$reservationevent->Nom}} </th>
            <th>{{$reservationevent->Societe}}</th>
            <th>{{$reservationevent->Secteur_activite}}</th>
            <th>{{$reservationevent->Email}}</th>
            <th>{{$reservationevent->Telephone}}</th>
            <th>{{$reservationevent->Administrtor_id}}</th>
        </tr>
        </table>
    @endforeach
    </section>
@endsection

