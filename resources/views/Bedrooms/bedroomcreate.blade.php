@extends('layouts.superadmin')
@section('title', "Creation Type Chambre")
@section('css')

@endsection
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="text-center alert alert-danger">{{$error}}</div>
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
              <li class="breadcrumb-item active">Type de Chambre</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container border">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire de creation type de chambre</h3>
        <div class="card-tools">
        </div>
      </div>
        <form action="{{route('creation/chambre')}}" method="post" enctype="multipart/form-data">
    @csrf
            <div><label>Type de chambre</label>
                <input type="text" name="Type_chambre" class="form-control">
            </div>
            <div><label>Description de la chambre</label>
                <textarea name="Description" id="Description" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div><label>Image de la chambre</label>
                <input type="file" name="Image" class="form-control">
            </div>
            <div><label>Prix/nuite</label>
                <input type="number" name="Prix_nuite" class="form-control">
            </div>
            <div><label>Statut</label>
                <select type="text" name="Statut" class="form-control">
                    <option value="Disponible"><span class="badge badge-success">Disponible</span></option>
                    <option value="Indisponible"><span class="badge badge-danger">Indisponible</span></option>
                </select>
            </div>
              <br>
            <div class="text-center">
                <button class="btn btn-primary">Enregistrer</button>
            </div>
              <br>
        </form>
    </div>
@endsection
@section('js')

@endsection
