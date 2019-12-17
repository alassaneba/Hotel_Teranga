<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resevationevents= \App\ReservationEvent::orderBy('created_at','DESC')->get();
        return view('Reservations.reservationevent', compact('resevationevents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Reservations.reseventcreate');

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
            'Nom_evenement'=>'required',
            'Date_debut'=>'required',
            'Date_fin'=>'required',
            'Duree'=>'required',
            'Nombre_participant'=>'required|min:1|numeric',
            'Restauration'=>'required',
            'Prenom'=>'required|min:3',
            'Nom'=>'required|min:2',
            'Societe'=>'required|min:3',
            'Secteur_activite'=>'required|min:3',
            'Email'=>'required|email',
            'Telephone'=>'required|min:9|numeric|',
            'Administrator_id'=>'required|min:1|numeric',
        ]);
        $reseve = new \App\ReservationEvent();
        $reseve-> Nom_evenement = $request->input('Nom_evenement');
        $reseve-> Date_debut = $request->input('Date_debut');
        $reseve-> Date_fin = $request->input('Date_fin');
        $reseve-> Duree = $request->input('Duree');
        $reseve-> Nombre_participant = $request->input('Nombre_participant');
        $reseve-> Restauration = $request->input('Restauration');
        $reseve-> Prenom = $request->input('Prenom');
        $reseve-> Nom = $request->input('Nom');
        $reseve-> Societe = $request->input('Societe');
        $reseve-> Secteur_activite = $request->input('Secteur_activite');
        $reseve-> Email = $request->input('Email');
        $reseve-> Telephone= $request->input('Telephone');
        $reseve-> Administrator_id = $request->input('Administrator_id');
        $reseve-> save();

        return redirect('reservationevent')->with(['success' => "Reservation evenement enregistré"]);
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
        $reseventedit= \App\ReservationEvent::find($id);//on recupere le produit
        return view('Reservations.reseventedit', compact('reseventedit'));
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
        $reservationevent= \App\ReservationEvent::find($id);
        if($reservationevent){
            $reservationevent-> Nom_evenement = $request->input('Nom_evenement');
            $reservationevent-> Date_debut = $request->input('Date_debut');
            $reservationevent-> Date_fin = $request->input('Date_fin');
            $reservationevent-> Duree = $request->input('Duree');
            $reservationevent-> Nombre_participant= $request->input('Nombre_participant');
            $reservationevent-> Restauration = $request->input('Restauration');
            $reservationevent-> Prenom = $request->input('Prenom');
            $reservationevent-> Nom = $request->input('Nom');
            $reservationevent-> Societe = $request->input('Societe');
            $reservationevent-> Secteur_activite = $request->input('Secteur_activite');
            $reservationevent-> Email = $request->input('Email');
            $reservationevent-> Telephone = $request->input('Telephone');
            $reservationevent-> Administrator_id = $request->input('Administrator_id');
            $reservationevent->save(); }
        return redirect('reservationevent')->with(['success' => "Reservation evenement modifiée"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
