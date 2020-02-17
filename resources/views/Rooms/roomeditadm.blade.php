@extends('layouts.admin')
@section('title', "Edition Espaces/Salles")
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
              <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord / Admin</a></li>
              <li class="breadcrumb-item active">Espaces et Salles</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container border">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire de modification Espaces et Salles</h3>
        <div class="card-tools">
        </div>
      </div>
        <form action="/roomupdate/{{$roomedit->id}}"  method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div><label>Salles</label>
              <input type="text" name="Salles" class="form-control" placeholder="Espaces ou Salles" value="{{$roomedit->Salles}}">
            </div>
            <div><label>Description</label>
                <textarea type="text" name="Description" class="form-control" placeholder="Description">{{$roomedit->Description}}</textarea>
            </div>
            <div><label>Image</label>
                <div class="row">
                    <div class="col-6 text-right"><img src="{{asset($roomedit->images)}}" alt="{{$roomedit->Image}}" width="100" ></div><div class="col-6"><h3>Chargez une autre image pour remplacer celle-ci</h3></div>
                </div>
                <div>
                    <input type="file" name="Image" class="form-control">
                </div>
            </div>
            <div><label>Statut</label>
                <select type="text" name="Statut" class="form-control" value="{{$roomedit->Statut}}">
                    <option value="Disponible" {{$roomedit->Statut==="Disponible"?'selected="selected"':''}}>Disponible</option>
                    <option value="Indisponible" {{$roomedit->Statut==="Indisponible"?'selected="selected"':''}}>Indisponible</option>
                </select>
            </div>
            <div><label>ReservationBedroom_id</label>
                <input type="number" name="ReservationEvent_id" class="form-control" placeholder="ReservationEvent_id" value="{{$roomedit->ReservationEvent_id}}">
            </div>
              <br>
            <div class="text-center">
                <button class="btn btn-primary">Modifier</button>
            </div>
              <br>
        </form>
    </div>
@endsection
