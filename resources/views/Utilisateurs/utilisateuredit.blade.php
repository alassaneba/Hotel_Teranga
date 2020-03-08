@extends('layouts.superadmin')
@section('title', "Edition Utilisateur Hotel")
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
              <li class="breadcrumb-item active">Utilisateur Hotel</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="container border">
      <div class="card-header">
        <h3 class="card-title-center">Formulaire de modification utilisateur hotel</h3>
        <div class="card-tools">
        </div>
      </div>
    </div>
        <div class="card">
          <div class="card-body register-card-body">
            <p class="login-box-msg"> Tous les champs sont obligatoires</p>

            <form action="{{route('utilisateur.edit',['id'=>$Users->id])}}" method="post">
              @csrf
              @method('patch')
              <div class="input-group mb-3">
                <select  type="text" name="role" id="role" class="form-control @error('role') is-invalid @enderror" value="{{$Users->role}}" required autocomplete="role" autofocus placeholder="Role">
                   <option value="Superadmin" {{$Users->role==='Superadmin'? 'selected="selected" ':''}}>Superadmin</option>
                   <option value="Admin" {{$Users->role==='Admin'? 'selected="selected" ':''}}>Admin</option>
                   <option value="Moderator" {{$Users->role==='Moderator'? 'selected="selected" ':''}}>Moderator</option>
                </select>
                @error('role')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$Users->name}}" required autocomplete="name" autofocus placeholder="Nom Complet">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{$Users->email}}" required autocomplete="email" placeholder="Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
               @enderror
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" name="password" value="{{$Users->password}}" required autocomplete="new-password" placeholder="Mot de passe">
                      @error('password')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
                <!-- /.col -->
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
          <!-- /.form-box -->
</div>
@endsection
@section('js')

@endsection
