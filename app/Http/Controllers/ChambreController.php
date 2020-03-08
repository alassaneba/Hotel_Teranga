<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bedroom;
use App\Chambre;
use \Auth;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $chambre = \App\Chambre::orderBy('created_at','DESC')->get();
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Chambres/chambre', compact('chambre'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $bedrooms = \App\Bedroom::all();
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Chambres/chambrecreate', compact('bedrooms'));
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
          'code' => 'required',
          'nom' => 'required',
          'bedroom_id' => 'required | numeric',
        ]);
        $chambre = new \App\Chambre();
        $chambre->code = $request->input('code');
        $chambre->nom = $request->input('nom');
        $chambre->bedroom_id = $request->input('bedroom_id');

        $chambre->save();
            return redirect('chambre')->with(['success' => "Chambre enregistrée"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $chambreedit= \App\Chambre::find($id);
      $bedrooms = \App\Bedroom::pluck('Type_chambre','id');
      $typechambre = \App\Bedroom::find($chambreedit->bedroom_id)->Type_chambre;
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('/Chambres/chambreedit', compact('chambreedit','bedrooms','typechambre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $chambre= \App\Chambre::find($id);
      if($chambre){
          $chambre->code = $request->input('code');
          $chambre->nom = $request->input('nom');
          $chambre->bedroom_id = $request->input('bedroom_id');

          $chambre-> save(); }
      return redirect('chambre')->with(['success' => "Chambre modifiée"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $chambre = Chambre::find($id);
      if($chambre)
          $chambre->delete();
      return redirect('/chambre')->with(['success' => "Chambre Supprimée"]);
    }
}
