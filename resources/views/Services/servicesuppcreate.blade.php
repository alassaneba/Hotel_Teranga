@extends('layouts.superadmin')
@section('title', "Creation Services supp Hotel")
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
              <li class="breadcrumb-item active">Services supp Hotel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container border">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire de creation service supp hotel</h3>
        <div class="card-tools">
        </div>
      </div>
        <form action="{{route('creation/hotel/servicesupp')}}" method="post" enctype="multipart/form-data">
    @csrf
            <div><label>Service-supp</label>
                <input type="text" name="Servicesupp" class="form-control">
            </div>
            <div><label>Slogan</label>
                <input type="text" name="Slogan" class="form-control">
            </div>
            <div><label>Description du service supp</label>
                <textarea name="Description" id="Description" cols="30" rows="7" class="form-control"></textarea>
            </div>
            <div><label>Image</label>
                <input type="file" name="Image" class="form-control">
            </div>
            <div><label>Responsable</label>
                <input type="number" name="User_id" class="form-control">
            </div>
            <div>
                <button class="btn btn-primary">Enregistrer</button>
            </div>
        </form>
    </div>
@endsection
