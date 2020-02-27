<?php

namespace App\Http\Controllers;

use App\BesoinClient;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \Auth;

class BesoinClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $besoinclient = \App\BesoinClient::orderBy('created_at','DESC')->get();
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Autres/besoinclient',compact('besoinclient'));
      if($user=='Admin')
       return view('Autres/besoinclientadm',compact('besoinclient'));
      if($user=='Moderator')
       return view('Autres/besoinclientmod',compact('besoinclient'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $besoinclient = \App\BesoinClient::orderBy('created_at','DESC')->get();
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Autres/besoinclientcreate');
      if($user=='Admin')
       return view('Autres/besoinclientcreateadm');
      if($user=='Moderator')
       return view('Autres/besoinclientcreatemod');
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
        'Numero_chambre' => 'required',
        'Description_besoin' => 'required',
        'Montant_payer' => 'required',
        'Agent_conserner' => 'required',
        'Statut' => 'required',
    ]);
    $besoinclient = new \App\BesoinClient();
    $besoinclient->Nom_complet = $request->input('Nom_complet');
    $besoinclient->Numero_chambre = $request->input('Numero_chambre');
    $besoinclient->Description_besoin = $request->input('Description_besoin');
    $besoinclient->Montant_payer = $request->input('Montant_payer');
    $besoinclient->Agent_conserner = $request->input('Agent_conserner');
    $besoinclient->Statut = $request->input('Statut');
    $besoinclient->user_id = $request->input('user_id');
    $besoinclient-> save();
    return redirect('besoinclient')->with(['success' => "Demande besoin client enregistré"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BesoinClient  $besoinClient
     * @return \Illuminate\Http\Response
     */
    public function show(BesoinClient $besoinClient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BesoinClient  $besoinClient
 *    @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    $besoinclientedit= \App\BesoinClient::find($id);
    $besoinclient = \App\BesoinClient::orderBy('created_at','DESC')->get();
    $user = Auth::User()->role;
    if($user=='Superadmin')
     return view('Autres.besoinclientedit', compact('besoinclientedit','besoinclient'));
    if($user=='Admin')
     return view('Autres.besoinclienteditadm', compact('besoinclientedit','besoinclient'));
    if($user=='Moderator')
     return view('Autres.besoinclienteditmod', compact('besoinclientedit','besoinclient'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BesoinClient  $besoinClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $besoinclient= \App\BesoinClient::find($id);
      if($besoinclient){
        $besoinclient->Nom_complet = $request->input('Nom_complet');
        $besoinclient->Numero_chambre = $request->input('Numero_chambre');
        $besoinclient->Description_besoin = $request->input('Description_besoin');
        $besoinclient->Montant_payer = $request->input('Montant_payer');
        $besoinclient->Agent_conserner = $request->input('Agent_conserner');
        $besoinclient->Statut = $request->input('Statut');
        $besoinclient->user_id = $request->input('user_id');
        $besoinclient-> save();}
        return redirect('besoinclient')->with(['success' => "Demande besoin client modifié"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BesoinClient  $besoinClient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $besoinclient = BesoinClient::find($id);
   if($besoinclient)
       $besoinclient->delete();
   return redirect('besoinclient')->with(['success' => "Demande besoin client Supprimé"]);
    }
}
