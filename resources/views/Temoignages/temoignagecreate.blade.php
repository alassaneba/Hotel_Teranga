@extends('layouts.admin')
@section('title', "Creation Temoignage")
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
              <li class="breadcrumb-item"><a href="{{route('Backoffice')}}"></a></li>
              <li class="breadcrumb-item active">Temoignage</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container border">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire d'enregistrement temoignage</h3>
        <div class="card-tools">
        </div>
      </div>
        <form action="{{route('creation/temoignage')}}" method="post">
    @csrf
            <div><label>Nom_complet</label>
               <input type="text" name="Nom_complet" class="form-control">
            </div>
            <div><label>Email</label>
               <input type="text" name="Email" class="form-control">
            </div>
            <div><label>Profession</label>
               <input type="text" name="Profession" class="form-control">
            </div>
            <div><label>Message</label>
                <textarea name="Message" cols="30" rows="5" class="form-control"></textarea>
            </div>
            <div><label>Responsable</label>
              <select type="text" name="user_id"  class="form-control" readonly>
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
@section('js')

@endsection
