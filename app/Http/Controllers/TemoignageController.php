<?php

namespace App\Http\Controllers;

use App\Temoignage;
use Illuminate\Http\Request;
use \Auth;

class TemoignageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $temoignage = \App\Temoignage::orderBy('created_at','DESC')->get();
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Temoignages/temoignage',compact('temoignage'));
      if($user=='Admin')
       return view('Temoignages/temoignageadm',compact('temoignage'));
      if($user=='Moderator')
       return view('Temoignages/temoignagemod',compact('temoignage'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('Temoignages/temoignagecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->validate([
          'Nom_complet' => 'required',
          'Email' => 'required',
          'Message' => 'required',
      ]);
      $temoignage = new \App\Temoignage();

      $temoignage->Nom_complet = $request->input('Nom_complet');
      $temoignage->Email = $request->input('Email');
      $temoignage->Profession = $request->input('Profession');
      $temoignage->Message = $request->input('Message');
      $temoignage->user_id = $request->input('user_id');
      $temoignage->save();
       return redirect()->back()->with(['success' => "Votre Temoignage nous est bien parvenu, merci !"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function show(Temoignage $temoignage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

      $temoignagedit= \App\Temoignage::find($id);
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Temoignages/temoignagedit',compact('temoignagedit'));
      if($user=='Admin')
       return view('Temoignages/temoignageditadm',compact('temoignagedit'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $temoignage= \App\Temoignage::find($id);
      if($temoignage){
        $temoignage->Nom_complet = $request->input('Nom_complet');
        $temoignage->Email = $request->input('Email');
        $temoignage->Profession = $request->input('Profession');
        $temoignage->Message = $request->input('Message');
        $temoignage->user_id = $request->input('user_id');
        $temoignage->save(); }
        return redirect('temoignagecreate')->with(['success' => "Temoignage modifié"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $temoignage= \App\Temoignage::find($id);
    if($temoignage)
        $temoignage->delete();
    return redirect('/temoignage')->with(['success' => "Temoignage Supprimé"]);
    }
}
