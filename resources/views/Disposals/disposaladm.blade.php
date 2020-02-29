@extends('layouts.admin')
@section('title', "Liste Disposition Salle/Espace")
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
                <li class="breadcrumb-item active">Disposition Salle</li>
              </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tableau des types de disposition de salle</h3>

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
                <table class="table table-head-fixed">
                  <thead class="text-center">
                    <tr>
                     <th>ID</th>
                     <th>Disposition salle</th>
                     <th>Supprimer</th>
                    </tr>
                  </thead>
            @foreach($disposal as $disposals)
            <tbody class="text-center">
                <tr>
                    <td>{{$disposals->id}}</td>
                    <td>{{$disposals->Disposition}}</td>
                    <td><form action="disposaledit/{{$disposals->id}}" method="post" onsubmit="return confirm('Voulez-vous supprimer ?')">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" name="delete" value="Supprimer">
                    </form></td>
                </tr>
              </tbody>
              @endforeach
            </table>
          </div>
        </div>
      </div>
      </div>
</section>
@endsection
@section('js')

@endsection
