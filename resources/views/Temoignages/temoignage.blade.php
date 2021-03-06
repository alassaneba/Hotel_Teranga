@extends('layouts.superadmin')
@section('title', "Liste Temoignage")
@section('css')

@endsection
@section('content')
    @if(session('success'))
        <div class="text-center alert alert-success">{{session('success')}}</div>
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
            <li class="breadcrumb-item"><a href="{{route('Backoffice')}}">Tableau de bord</a></li>
            <li class="breadcrumb-item active">Temoignage</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tableau des Temoignages</h3>

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
              <div class="card-body table-responsive p-0" style="height: 100%;">
                <table class="table table-bordered table-head-fixed-bordered">
                  <thead class="text-center">
                    <tr>
                     <th>Nom_complet</th>
                     <th>Email</th>
                     <th>Profession</th>
                     <th>Message</th>
                     <th>Responsable</th>
                     <th>Editer</th>
                     <th>Supprimer</th>
                    </tr>
                  </thead>
                  @foreach($temoignage as $temoignages)
                      <tbody class="text-center">
                          <tr>
                              <td>{{$temoignages->Nom_complet}}</td>
                              <td>{{$temoignages->Email}}</td>
                              <td>{{$temoignages->Profession}}</td>
                              <td><textarea cols="60" rows="3" class="form-control" readonly>{{$temoignages->Message}}</textarea></td>
                              <td>{{$temoignages->user->name ?? '' }}</td>
                              <td> <p class="btn btn-outline-secondary"><a href="temoignagedit/{{$temoignages->id}}">Editer</a></p></td>
                              <td><form action="temoignagedit/{{$temoignages->id}}" method="post" onsubmit="return confirm('Voulez-vous supprimer ?')">
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
@section('js')

@endsection
