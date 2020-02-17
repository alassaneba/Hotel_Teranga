@extends('layouts.superadmin')
@section('title', "Creation Promotion Hotel")
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
              <li class="breadcrumb-item active">Promotion Hotel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container border">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire de creation promotion hotel</h3>
        <div class="card-tools">
        </div>
      </div>
        <form action="{{route('creation/hotel/promotion')}}" method="post" enctype="multipart/form-data">
    @csrf
            <div><label>Titre</label>
                <input type="text" name="Titre" class="form-control">
            </div>
            <div><label>Description</label>
                <textarea name="Description" id="Description" cols="30" rows="2" class="form-control"></textarea>
            </div>
            <div><label>Image</label>
                <input type="file" name="Image" class="form-control">
            </div>
            <div><label>Valeur</label>
                <input name="Valeur" id="Valeur" class="form-control">
            </div>
            <div><label>Responsable</label>
              <select type="text" name="User_id"  class="form-control" readonly>
              <option value="{{ Auth::user()->id }}" >{{ Auth::user()->name }}</option>
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
