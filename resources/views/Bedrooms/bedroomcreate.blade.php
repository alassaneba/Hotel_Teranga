@extends('layout')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{$error}}</div>
        @endforeach
    @endif

    <div class="container">
        <form action="bedroomcreate" method="post" enctype="multipart/form-data">
    @csrf
            <div>
                <select type="text" name="Type_chambre" class="form-control">
                    <option value="Unique_simple">Chambre Unique Simple </option>
                    <option value="Unique_confort">Chambre Unique Confort</option>
                    <option value="Double_simple">Chambre Double Simple</option>
                    <option value="Double_confort">Chambre Double Confort</option>
                    <option value="Deluxe_simple">Chambre Deluxe Simple</option>
                    <option value="Deluxe_royal">Chambre Deluxe Royal</option>
                </select>
            </div>
            <div>
                <input type="textera" name="Description" class="form-control" placeholder="Description">
            </div>
            <div>
                <input type="file" name="Image" class="form-control" placeholder="Image">
            </div>
            <div>
                <input type="number" name="Prix_nuite" class="form-control" placeholder="Prix/nuite">
            </div>
            <div>
                <input type="number" name="ReservationBedroom_id" class="form-control" placeholder="ReservationBedroom_id">
            </div>
            <div>
                <button class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection

