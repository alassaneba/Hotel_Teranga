@extends('layouts.superadmin')
@section('title', "Edition Chambres")
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
              <li class="breadcrumb-item active">Chambres</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container border">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire de modification de chambre</h3>
        <div class="card-tools">
        </div>
      </div>
        <form action="/chambreupdate/{{$chambreedit->id}}"  method="post">
            @csrf
            @method('patch')

            <div><label>Code</label>
                <input type="text" name="code" class="form-control" value="{{$chambreedit->code}}">
            </div>
            <div><label>Nom</label>
                <input type="text" name="nom" class="form-control" value="{{$chambreedit->nom}}">
            </div>
            <div><label>Type de chambre</label>
                <select name="bedroom_id" id="Type_chambre" class="form-control" value="{{$chambreedit->bedroom_id}}">
                  @foreach ($bedrooms as $key => $value)
                    @if ($value==$typechambre )
                      <option value="{{ $key }}" selected >{{ $value }}</option>
                    @else
                      <option value="{{ $key }}" >{{ $value }}</option>
                    @endif
                   @endforeach
                </select>
            </div>
              <br>
            <div class="text-center">
                <button class="btn btn-primary">Modifier</button>
            </div>
              <br>
        </form>
    </div>

@endsection
