@extends('layout')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif
    <div class="container border">
        <form action="/bedroomupdate/{{$bedroomedit->id}}"  method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div><label>Type de chambre</label>
                <select type="text" name="Type_chambre" class="form-control" placeholder="Type de chambre" value="{{$bedroomedit->Type_chambre}}">
                    <option value="Unique_simple">Unique Simple </option>
                    <option value="Unique_confort">Unique Confort</option>
                    <option value="Double_simple">Double Simple</option>
                    <option value="Double_confort">Double Confort</option>
                    <option value="Deluxe_simple">Deluxe Simple</option>
                    <option value="Deluxe_royal">Deluxe Royal</option>
                </select>
            </div>
            <div><label>Description de la chambre</label>
                <input type="text" name="Description" class="form-control" placeholder="Description" value="{{$bedroomedit->Description}}">
            </div>
            <div><label>Image de la chambre</label>
                <div class="row">
                    <div class="col-6 text-right"><img src="{{asset($bedroomedit->images)}}" alt="{{$bedroomedit->name}}" width="100" ></div><div class="col-6"><h3>Chargez une autre image pour remplacer celle-ci</h3></div>
                </div>
                <div>
                    <input type="file" name="Image" class="form-control">
                </div>
            </div>
            <div><label>Prix/nuite</label>
                <input type="number" name="Prix_nuite" class="form-control" placeholder="Prix/nuite" value="{{$bedroomedit->Prix_nuite}}">
            </div>
            <div><label>ReservationBedroom_id</label>
                <input type="number" name="ReservationBedroom_id" class="form-control" placeholder="ReservationBedroom_id" value="{{$bedroomedit->ReservationBedroom_id}}">
            </div>
            <div>
                <button class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection
