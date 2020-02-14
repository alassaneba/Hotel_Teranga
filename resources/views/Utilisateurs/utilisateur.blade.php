
<table class="table table-sm">
   <thead>
       <tr class=" bg-success">
           <th>#</th> <th>ID</th>    <th>NOM</th> <th>EMAIL</th>  <th>ROLE</th> <th><a href="User/create">Ajouter</a></th>

       </tr>
       </thead>
       @foreach($users as $user)
       <tbody>
           <tr>
               <td>#</th>
               <td>{{$user->id ?? ''}}</td>
               <td>{{$user->role ?? ''}}</td>
               <td>{{$user->name ?? ''}}</td>
               <td>{{$user->email ?? ''}}</td>
               <td>
               <p>
               <a href="{{route('utilisateur.update',['id'=>$user->id])}}">

               <button class="btn btn-warning">Modifier</button> </a>
               </p>
               <form action="utilisateur/{{$user->id}}" method="post">
              @csrf
              @method('delete')
            <input type="submit" class="btn btn-danger" name="delete" value="Supprimer">

            </form>
            </td>
           </tr>

           </tbody>
       @endforeach

   </table>
