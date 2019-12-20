@extends('layout')
@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    <section class="table table-striped">
        <table>
            <tr>
                <th>Type_chambre</th>
                <th>Description</th>
                <th>Image</th>
                <th>Prix_nuite</th>
                <th>ReservationBedroom_id</th>
            </tr>
        </table>
        @foreach($bedroom as $bedrooms)
            <table >
                <tr>
                    <th>{{$bedrooms->Type_chambre}}</th>
                    <th>{{$bedrooms->Description}}</th>
                    <th ><img src="{{$bedrooms->Image}}" style="width: 75px "></th>
                    <th>{{$bedrooms->Prix_nuite}}</th>
                    <th>{{$bedrooms->ReservationBedroom_id}}</th>
                    <th> <p><a href="bedroomedit/{{$bedrooms->id}}">Editer</a></p></th>
                </tr>
            </table>
        @endforeach
    </section>
@endsection
