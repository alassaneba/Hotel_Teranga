@extends('layout')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <section class="table table-striped">
<table>
    <tr>
          <th>Date_arriver</th>
          <th>Heure_arriver</th>
          <th>Date_depart</th>
          <th>Nombre_chambre</th>
          <th>Nombre_adulte</th>
          <th>Nombre_enfant</th>
          <th>Type_chambre</th>
          <th>Civilite</th>
          <th>Prenom</th>
          <th>Nom </th>
          <th>Nationalite</th>
          <th>Email</th>
          <th>Telephone</th>
          <th>Montant-payer</th>
          <th>Administrator_id</th>
    </tr>
</table>
@foreach($reservationbedroom as $reservations)
    <table >
        <tr>
            <th>{{$reservations->Date_arriver}}</th>
            <th>{{$reservations->Heure_arriver}}</th>
            <th>{{$reservations->Date_depart}}</th>
            <th>{{$reservations->Nombre_chambre}}</th>
            <th>{{$reservations->Nombre_adulte}}</th>
            <th>{{$reservations->Nombre_enfant}}</th>
            <th>{{$reservations->Type_chambre}}</th>
            <th>{{$reservations->Civilite}}</th>
            <th>{{$reservations->Prenom}}</th>
            <th>{{$reservations->Nom}} </th>
            <th>{{$reservations->Nationalite}} </th>
            <th>{{$reservations->Email}}</th>
            <th>{{$reservations->Telephone}}</th>
            <th>{{$reservations->Montant_payer}}</th>
            <th>{{$reservations->Administrator_id}}</th>
            <th> <p><a href="resbedroomedit/{{$reservations->id}}">Editer</a></p></th>
        </tr>
        </table>
    @endforeach
</section>
@endsection
