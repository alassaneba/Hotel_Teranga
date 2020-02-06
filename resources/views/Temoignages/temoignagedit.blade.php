@extends('layouts.admin')
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
              <li class="breadcrumb-item"><a href="{{route('admin')}}">Tableau de bord</a></li>
              <li class="breadcrumb-item active">Temoignages</li>
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
        <form action="/temoignageupdate/{{$temoignagedit->id}}" method="post">
    @csrf
    @method('patch')
            <div><label>Nom complet</label>
               <input type="text" name="Nom_complet" class="form-control" value="{{$temoignagedit->Nom_complet}}">
            </div>
            <div><label>Email</label>
               <input type="text" name="Email" class="form-control" value="{{$temoignagedit->Email}}">
            </div>
            <div><label>Profession</label>
               <input type="text" name="Profession" class="form-control" value="{{$temoignagedit->Profession}}">
            </div>
            <div><label>Message</label>
                <textarea name="Message" cols="30" rows="7" class="form-control" value="{{$temoignagedit->Message}}">{{$temoignagedit->Message}}</textarea>
            </div>
            <div><label>Responsable</label>
              <select type="number" name="User_id" class="form-control" value="{{$temoignagedit->User_id}}">
                  <option value="1" {{$temoignagedit->User_id==="1"?'selected="selected"':''}}>Admin</option>
                  <option value="2" {{$temoignagedit->User_id==="2"?'selected="selected"':''}}>Moderator 1</option>
                  <option value="3" {{$temoignagedit->User_id==="3"?'selected="selected"':''}}>Moderator 2</option>
              </select>
            </div>
            <div>
                <button class="btn btn-primary">Modifier</button>
            </div>
        </form>
    </div>
@endsection
