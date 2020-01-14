@extends('layouts.admin')

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
            <li class="breadcrumb-item"><a href="admin">Tableau de bord</a></li>
            <li class="breadcrumb-item active">Contact/Message</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tableau des messages et temoignages</h3>

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
                     <th>ID</th>
                     <th>Nom</th>
                     <th>Prenom</th>
                     <th>Email</th>
                     <th>Objet</th>
                     <th>Contact / Message</th>
                     <th>Nature</th>
                     <th>Statut</th>
                     <th>User</th>
                     <th>Editer</th>
                     <th>Supprimer</th>
                    </tr>
                  </thead>
                  @foreach($contact as $contacts)
                      <tbody>
                          <tr>
                              <td>{{$contacts->id}}</td>
                              <td>{{$contacts->Nom}}</td>
                              <td>{{$contacts->Prenom}}</td>
                              <td>{{$contacts->Email}}</td>
                              <td>{{$contacts->Objet}}</td>
                              <td>{{$contacts->Message}}</td>
                              <td>{{$contacts->Nature}}</td>
                              <td>{{$contacts->Statut}}</td>
                              <td>{{$contacts->User_id}}</td>
                              <td> <p class="btn btn-outline-secondary"><a href="contactedit/{{$contacts->id}}">Editer</a></p></td>
                              <td><form action="contactedit/{{$contacts->id}}" method="post">
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