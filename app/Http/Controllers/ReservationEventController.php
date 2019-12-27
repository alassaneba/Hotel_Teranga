<?php

namespace App\Http\Controllers;

use App\ReservationEvent;
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
        $typeevenememt = \App\TypeEvent::pluck('Type_evenement','id');
        $salles = \App\Room::pluck('Salles','id');
        $disposition = \App\DisposalRoom::pluck('Disposition','id');
        return view('Reservations.reseventcreate', compact('resbedroomcreate','typeevenememt', 'salles', 'disposition'));

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
            'Type_evenement'=>'required',
            'Date_debut'=>'required',
            'Date_fin'=>'required',
            'Duree'=>'required',
            'Salles'=>'required',
            'Disposition'=>'required',
            'Nombre_participant'=>'required|min:1|numeric',
            'Restauration'=>'required',
            'Civilite'=>'required',
            'Prenom'=>'required|min:3',
            'Nom'=>'required|min:2',
            'Societe'=>'required|min:3',
            'Secteur_activite'=>'required|min:3',
            'Email'=>'required|email',
            'Telephone'=>'required|min:9|numeric|',
            'User_id'=>'required|min:1|numeric',
        ]);
        $reseve = new \App\ReservationEvent();
        $reseve-> Nom_evenement = $request->input('Nom_evenement');
        $reseve-> Type_evenement = $request->input('Type_evenement');
        $reseve-> Date_debut = $request->input('Date_debut');
        $reseve-> Date_fin = $request->input('Date_fin');
        $reseve-> Duree = $request->input('Duree');
        $reseve-> Salles = $request->input('Salles');
        $reseve-> Disposition = $request->input('Disposition');
        $reseve-> Nombre_participant = $request->input('Nombre_participant');
        $reseve-> Restauration = $request->input('Restauration');
        $reseve-> Equipement = $request->input('Equipement1').'|'. $request->input('Equipement2').'|'. $request->input('Equipement3').'|'. $request->input('Equipement4');
        $reseve-> Autres_informations = $request->input('Autres_informations');
        $reseve-> Civilite = $request->input('Civilite');
        $reseve-> Prenom = $request->input('Prenom');
        $reseve-> Nom = $request->input('Nom');
        $reseve-> Societe = $request->input('Societe');
        $reseve-> Secteur_activite = $request->input('Secteur_activite');
        $reseve-> Email = $request->input('Email');
        $reseve-> Telephone= $request->input('Telephone');
        $reseve-> User_id = $request->input('Administrator_id');
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
        $reseventedit= \App\ReservationEvent::find($id);
        $typeevenememt = \App\TypeEvent::pluck('Type_evenement','id');
        $salles = \App\Room::pluck('Salles','id');
        $disposition = \App\DisposalRoom::pluck('Disposition','id');
        $reservationevents = \App\ReservationEvent::orderBy('created_at','DESC')->first();
        return view('Reservations.reseventedit', compact('reseventedit','typeevenememt','reservationevents','salles', 'disposition'));
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
        $reservationevents= \App\ReservationEvent::find($id);
        if($reservationevents){
        $reservationevents-> Nom_evenement = $request->input('Nom_evenement');
            if ($reservationevents) {
                $reservationevents->update([
                    'Type_evenement' => $request->input('Type_evenement'),
                ]); }
        $reservationevents-> Date_debut = $request->input('Date_debut');
        $reservationevents-> Date_fin = $request->input('Date_fin');
        $reservationevents-> Duree = $request->input('Duree');
            if ($reservationevents) {
                $reservationevents->update([
                    'Salles' => $request->input('Salles'),
                ]); }
            if ($reservationevents) {
                $reservationevents->update([
                    'Disposition' => $request->input('Disposition'),
                ]); }
        $reservationevents-> Nombre_participant = $request->input('Nombre_participant');
        $reservationevents-> Restauration = $request->input('Restauration');
        $reservationevents-> Equipement = $request->input('Equipement1').'|'. $request->input('Equipement2').'|'. $request->input('Equipement3').'|'. $request->input('Equipement4');
        $reservationevents-> Autres_informations = $request->input('Autres_informations');
        $reservationevents-> Civilite = $request->input('Civilite');
        $reservationevents-> Prenom = $request->input('Prenom');
        $reservationevents-> Nom = $request->input('Nom');
        $reservationevents-> Societe = $request->input('Societe');
        $reservationevents-> Secteur_activite = $request->input('Secteur_activite');
        $reservationevents-> Email = $request->input('Email');
        $reservationevents-> Telephone= $request->input('Telephone');
        $reservationevents-> User_id = $request->input('Administrator_id');
        $reservationevents-> save(); }
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
        $reservationevents = ReservationEvent::find($id);
        if($reservationevents)
            $reservationevents->delete();
        return redirect('/reservationevent');
    }
}
