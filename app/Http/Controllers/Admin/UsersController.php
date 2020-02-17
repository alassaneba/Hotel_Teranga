<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users=\App\User::all();
      $user = Auth::User()->role;
      if($user=='Superadmin')
     return view('Utilisateurs/utilisateur',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = Auth::User()->role;
      if($user=='Superadmin')
        return view('Utilisateurs/utilisateurcreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $Users = new User();
      $Users->role=$request->input('role');
      $Users->name =$request->input('name');
      $Users->email =$request->input('email');
      $Users->password = Hash::make($request->input('password'));

      $Users->save();

      return redirect('/utilisateur');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $Users = \App\User::find($id);//on recupere le produit
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Utilisateurs/utilisateuredit', compact('Users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $Users = \App\User::find($id);
        if($Users){
         $Users->update([
         'role'=> $request->input('role'),
         'name' => $request->input('name'),
         'email' => $request->input('email'),
         'password'=> $request->input('password'),
     ]);

  }
  return redirect()->route('utilisateur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $Users= \App\User::find($id);
     if($Users)
     $Users->delete();
     return redirect()->route('utilisateur.index');
    }
}
