<?php

namespace App\Http\Controllers;

use App\Temoignage;
use Illuminate\Http\Request;


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
        return view('Temoignages/temoignage', compact('temoignage'));
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
      $temoignage->User_id = $request->input('User_id');
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
      $this->authorize('admin');
      $temoignagedit= \App\Temoignage::find($id);
      return view('Temoignages/temoignagedit', compact('temoignagedit'));
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
        $temoignage->User_id = $request->input('User_id');
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
      $contact= \App\Contact::find($id);
    if($contact)
        $contact->delete();
    return redirect('/temoignage')->with(['success' => "Temoignage Supprimé"]);
    }
}
