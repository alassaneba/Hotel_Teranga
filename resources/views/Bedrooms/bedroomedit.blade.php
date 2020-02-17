@extends('layouts.superadmin')
@section('title', "Edition Type Chambre")
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
              <li class="breadcrumb-item active">Type de Chambre</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container border">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire de modification type de chambre</h3>
        <div class="card-tools">
        </div>
      </div>
        <form action="/bedroomupdate/{{$bedroomedit->id}}"  method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div><label>Type de chambre</label>
              <input type="text" name="Type_chambre" class="form-control" placeholder="Type de chambre" value="{{$bedroomedit->Type_chambre}}">
            </div>
            <div><label>Description de la chambre</label>
                <textarea type="text" name="Description" class="form-control" placeholder="Description">{{$bedroomedit->Description}}</textarea>
            </div>
            <div><label>Image de la chambre</label>
                <div class="row">
                    <div class="col-6 text-right"><img src="{{asset($bedroomedit->images)}}" alt="{{$bedroomedit->Image}}" width="100" ></div><div class="col-6"><h3>Chargez une autre image pour remplacer celle-ci</h3></div>
                </div>
                <div>
                    <input type="file" name="Image" class="form-control">
                </div>
            </div>
            <div><label>Prix/nuite</label>
                <input type="number" name="Prix_nuite" class="form-control" placeholder="Prix/nuite" value="{{$bedroomedit->Prix_nuite}}">
            </div>
            <div><label>Statut</label>
                <select type="text" name="Statut" class="form-control" value="{{$bedroomedit->Statut}}">
                    <option value="Disponible" {{$bedroomedit->Statut==="Disponible"?'selected="selected"':''}}>Disponible</option>
                    <option value="Indisponible" {{$bedroomedit->Statut==="Indisponible"?'selected="selected"':''}}>Indisponible</option>
                </select>
            </div>
            <div><label>ReservationBedroom_id</label>
                <input type="number" name="ReservationBedroom_id" class="form-control" placeholder="ReservationBedroom_id" value="{{$bedroomedit->ReservationBedroom_id}}">
            </div>
              <br>
            <div class="text-center">
                <button class="btn btn-primary">Modifier</button>
            </div>
              <br>
        </form>
    </div>
@endsection
