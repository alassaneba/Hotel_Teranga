@extends('layouts.superadmin')
@section('title', "Liste Type Chambre")
@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
<section>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Hotel Teranga</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Tableau de bord / Superadmin</a></li>
            <li class="breadcrumb-item active">Type de Chambre</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tableau des types de chambre</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 375px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                     <th>Type chambre</th>
                     <th>Description</th>
                     <th>Image</th>
                     <th>Prix/nuite</th>
                     <th>Statut</th>
                     <th>Editer</th>
                     <th>Supprimer</th>
                    </tr>
                  </thead>
        @foreach($bedroom as $bedrooms)
            <tbody>
                <tr>
                    <td>{{$bedrooms->Type_chambre}}</td>
                    <td><textarea cols="45" rows="3" class="form-control" readonly>{{$bedrooms->Description}}</textarea></td>
                    <td><img src="{{$bedrooms->Image}}" style="width: 75px "></td>
                    <td>{{$bedrooms->Prix_nuite}}</td>
                    <td>{{$bedrooms->Statut}}</td>
                    <td> <p class="btn btn-outline-secondary"><a href="bedroomedit/{{$bedrooms->id}}">Editer</a></p></td>
                    <td><form action="bedroomedit/{{$bedrooms->id}}" method="post" onsubmit="return confirm('Voulez-vous supprimer ?')">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" name="delete" value="Supprimer">
                    </form></td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      </div>
</section>
@endsection
