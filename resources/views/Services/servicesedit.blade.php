@extends('layouts.superadmin')
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
              <li class="breadcrumb-item active">Services Hotel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container border">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire de modification services hotel</h3>
        <div class="card-tools">
        </div>
      </div>
        <form action="/hotelservicesupdate/{{$servicesedit->id}}"  method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div><label>Service</label>
              <input type="text" name="Service" class="form-control" value="{{$servicesedit->Service}}">
            </div>
            <div><label>Description</label>
                <textarea type="text" name="Description" class="form-control">{{$servicesedit->Description}}</textarea>
            </div>
            <div><label>Image</label>
                <div class="row">
                    <div class="col-6 text-right"><img src="{{asset($servicesedit->images)}}" alt="{{$servicesedit->Image}}" width="100" ></div><div class="col-6"><h3>Chargez une autre image pour remplacer celle-ci</h3></div>
                </div>
                <div>
                    <input type="file" name="Image" class="form-control">
                </div>
            </div>
            <div><label>Responsable</label>
                <input type="number" name="User_id" class="form-control" value="{{$servicesedit->User_id}}">
            </div>
            <div>
                <button class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>
@endsection
