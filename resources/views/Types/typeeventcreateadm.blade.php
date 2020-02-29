@extends('layouts.admin')
@section('title', "Creation Type Evenement")
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
              <li class="breadcrumb-item active">Type Evenement</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container border">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire de creation type d'evenement</h3>
        <div class="card-tools">
        </div>
      </div>
      <form action="{{route('creation/type/evenement')}}" method="post" enctype="multipart/form-data">
  @csrf
  <div><label>Type d'evenement</label>
      <input type="text" name="Type_evenement" class="form-control">
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
