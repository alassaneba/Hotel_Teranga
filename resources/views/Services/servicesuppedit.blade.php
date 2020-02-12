@extends('layouts.superadmin')
@section('title', "Edition Services supp Hotel")
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
        <h3 class="card-title-center">Formulaire de modification services supp hotel</h3>
        <div class="card-tools">
        </div>
      </div>
        <form action="/hotelservicesuppupdate/{{$servicesuppedit->id}}"  method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div><label>Service-supp</label>
              <input type="text" name="Servicesupp" class="form-control" value="{{$servicesuppedit->Servicesupp}}">
            </div>
            <div><label>Slogan</label>
              <input type="text" name="Slogan" class="form-control" value="{{$servicesuppedit->Slogan}}">
            </div>
            <div><label>Description</label>
                <textarea type="text" name="Description" class="form-control">{{$servicesuppedit->Description}}</textarea>
            </div>
            <div><label>Image</label>
                <div class="row">
                    <div class="col-6 text-right"><img src="{{asset($servicesuppedit->images)}}" alt="{{$servicesuppedit->Image}}" width="100" ></div><div class="col-6"><h3>Chargez une autre image pour remplacer celle-ci</h3></div>
                </div>
                <div>
                    <input type="file" name="Image" class="form-control">
                </div>
            </div>
            <div><label>Responsable</label>
                <input type="number" name="User_id" class="form-control" value="{{$servicesuppedit->User_id}}">
            </div>
            <div>
                <button class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>
@endsection
