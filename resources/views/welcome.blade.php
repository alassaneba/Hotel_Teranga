
<form action="{{route('utilisateur.edit',['id'=>$Users->id])}}" method="post">

         @csrf
         @method('patch')
         <div>
                     <select  type="text" name="role" class="form-control" value="{{$Users->role}}">
                        <option value="Superadmin" {{$Users->role==='Superadmin'? 'selected="selected" ':''}}>Superadmin</option>
                        <option value="Admin" {{$Users->role==='Admin'? 'selected="selected" ':''}}>Admin</option>
                        <option value="Moderator" {{$Users->role==='Moderator'? 'selected="selected" ':''}}>Moderator</option>

                     </select>
         </div>
         <div>
         <input type="text" name="name" class="form-control" placeholder="NOM" value="{{$Users->name}}">
         </div>

         <div><input type="email" name="email" class="form-control" placeholder="EMAIL" value="{{$Users->email}}"> </div>

         <div><input type="password" name="password" class="form-control" placeholder="EMAIL" value="{{$Users->password}}"> </div>

         <div> <button class="btn btn-primary">Enregistrer</button> </div>
      </form>
