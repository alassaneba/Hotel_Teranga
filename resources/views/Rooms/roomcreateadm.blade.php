@extends('layouts.admin')
@section('title', "Creation Espaces/Salles")
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
              <li class="breadcrumb-item"><a href="{{route('Backoffice')}}">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Espaces et Salles</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container border">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire de creation Espaces et Salles</h3>
        <div class="card-tools">
        </div>
      </div>
        <form action="{{route('creation/salle')}}" method="post" enctype="multipart/form-data">
    @csrf
            <div><label>Espaces ou Salles</label>
                <input type="text" name="Salles" class="form-control">
            </div>
            <div><label>Description</label>
                <textarea name="Description" id="Description" cols="30" rows="7" class="form-control" placeholder="Description"></textarea>
            </div>
            <div><label>Image</label>
                <input type="file" name="Image" class="form-control" placeholder="Image">
            </div>
            <div><label>Statut</label>
                <select type="text" name="Statut" class="form-control">
                    <option value="Disponible"><span class="badge badge-success">Disponible</span></option>
                    <option value="Indisponible"><span class="badge badge-danger">Indisponible</span></option>
                </select>
            </div>
            <div><label>ReservationEvent_id</label>
                <input type="number" name="ReservationEvent_id" class="form-control" placeholder="ReservationEvent_id">
            </div>
              <br>
            <div class="text-center">
                <button class="btn btn-primary">Enregistrer</button>
            </div>
              <br>
        </form>
    </div>
@endsection
