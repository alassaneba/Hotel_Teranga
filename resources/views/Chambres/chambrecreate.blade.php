@extends('layouts.superadmin')
@section('title', "Creation Chambre")
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
              <li class="breadcrumb-item active">Reservation Chambre</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container border">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire creation de chambre</h3>
        <div class="card-tools">
        </div>
      </div>
    <form action="{{route('creation/chambres')}}" method="post">
        @csrf
        <div><label>Code</label>
            <input type="text" name="code" class="form-control">
        </div>
        <div><label>Nom</label>
            <input type="text" name="nom" class="form-control">
        </div>
        <div><label>Type de chambre</label>
         <select name="bedroom_id" id="Type_chambre" onChange='' class="form-control">
                <option></option>
                @foreach($bedrooms as $key => $value)
                  @continue ($value->Statut == 'Indisponible')
                    <option value="{{$value->id}}">{{$value->Type_chambre}}</option>
                @endforeach
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
