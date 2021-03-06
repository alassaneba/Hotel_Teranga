<?php

namespace App\Http\Controllers;

use App\ReservationEvent;
use Illuminate\Http\Request;
use \Auth;

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
        $user = Auth::User()->role;
        if($user=='Superadmin')
         return view('/Reservations/reservationevent',compact('resevationevents'));
        if($user=='Admin')
         return view('/Reservations/reservationeventadm',compact('resevationevents'));
        if($user=='Moderator')
         return view('/Reservations/reservationeventmod',compact('resevationevents'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeevenememt = \App\TypeEvent::pluck('Type_evenement','id');
        $salles = \App\Room::all();
        $disposition = \App\DisposalRoom::pluck('Disposition','id');
        $user = Auth::User()->role;
        if($user=='Superadmin')
         return view('/Reservations/reseventcreate', compact('typeevenememt', 'salles', 'disposition'));
        if($user=='Admin')
         return view('/Reservations/reseventcreateadm', compact('typeevenememt', 'salles', 'disposition'));
        if($user=='Moderator')
         return view('/Reservations/reseventcreatemod', compact('typeevenememt', 'salles', 'disposition'));


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
            'Civilite'=>'required',
            'Prenom'=>'required|min:3',
            'Nom'=>'required|min:2',
            'Societe'=>'required|min:3',
            'Secteur_activite'=>'required|min:3',
            'Email'=>'required|email',
            'Telephone'=>'required|min:9|numeric|',
            'user_id'=>'min:1|numeric',
        ]);
        $reseve = new \App\ReservationEvent();
        $reseve-> Nom_evenement = $request->input('Nom_evenement');
        $reseve-> Date_debut = $request->input('Date_debut');
        $reseve-> Date_fin = $request->input('Date_fin');
        $reseve-> Duree = $request->input('Duree');
        $reseve-> Nombre_participant = $request->input('Nombre_participant');
        $reseve-> Restauration = $request->input('Restauration');
        $reseve-> Equipement = $request->input('Equipement1').'|'. $request->input('Equipement2').'|'. $request->input('Equipement3').'|'. $request->input('Equipement4');
        $reseve-> Autres_informations = $request->input('Autres_informations');
        $reseve-> Civilite = $request->input('Civilite');
        $reseve-> Prenom = $request->input('Prenom');
        $reseve-> Nom = $request->input('Nom');
        $reseve-> Identifiant = $request->input('Identifiant');
        $reseve-> Societe = $request->input('Societe');
        $reseve-> Secteur_activite = $request->input('Secteur_activite');
        $reseve-> Email = $request->input('Email');
        $reseve-> Telephone= $request->input('Telephone');
        $reseve-> Montant_payer= $request->input('Montant_payer');
        $reseve-> Statut= $request->input('Statut');
        $reseve-> room_id = $request->input('room_id');
        $reseve-> type_event_id = $request->input('type_event_id');
        $reseve-> disposal_room_id = $request->input('disposal_room_id');
        $reseve-> user_id = $request->input('user_id');
        $reseve-> save();

        return redirect('/reservationevent')->with(['success' => "Reservation evenement enregistré"]);
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
        $typeevent = \App\TypeEvent::find($reseventedit->type_event_id)->Type_evenement;
        $salles = \App\Room::pluck('Salles','id');
        $room = \App\Room::find($reseventedit->room_id)->Salles;
        $disposition = \App\DisposalRoom::pluck('Disposition','id');
        $disposalroom = \App\DisposalRoom::find($reseventedit->disposal_room_id)->Disposition;
        $reservationevents = \App\ReservationEvent::orderBy('created_at','DESC')->first();
        $user = Auth::User()->role;
        if($user=='Superadmin')
         return view('/Reservations/reseventedit', compact('reseventedit','typeevenememt','typeevent','room','disposalroom','reservationevents','salles', 'disposition'));
        if($user=='Admin')
         return view('/Reservations/reseventeditadm', compact('reseventedit','typeevenememt','typeevent','room','disposalroom','reservationevents','salles', 'disposition'));
        if($user=='Moderator')
         return view('/Reservations/reseventeditmod', compact('reseventedit','typeevenememt','typeevent','room','disposalroom','reservationevents','salles', 'disposition'));
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
        $reservationevents-> Date_debut = $request->input('Date_debut');
        $reservationevents-> Date_fin = $request->input('Date_fin');
        $reservationevents-> Duree = $request->input('Duree');
        $reservationevents-> Nombre_participant = $request->input('Nombre_participant');
        $reservationevents-> Restauration = $request->input('Restauration');
        $reservationevents-> Equipement = $request->input('Equipement1').'|'. $request->input('Equipement2').'|'. $request->input('Equipement3').'|'. $request->input('Equipement4');
        $reservationevents-> Autres_informations = $request->input('Autres_informations');
        $reservationevents-> Civilite = $request->input('Civilite');
        $reservationevents-> Prenom = $request->input('Prenom');
        $reservationevents-> Nom = $request->input('Nom');
        $reservationevents-> Identifiant = $request->input('Identifiant');
        $reservationevents-> Societe = $request->input('Societe');
        $reservationevents-> Secteur_activite = $request->input('Secteur_activite');
        $reservationevents-> Email = $request->input('Email');
        $reservationevents-> Telephone= $request->input('Telephone');
        $reservationevents-> Montant_payer= $request->input('Montant_payer');
        $reservationevents-> Statut= $request->input('Statut');
        $reservationevents-> room_id = $request->input('room_id');
        $reservationevents-> type_event_id = $request->input('type_event_id');
        $reservationevents-> disposal_room_id = $request->input('disposal_room_id');
        $reservationevents-> user_id = $request->input('user_id');
        $reservationevents-> save(); }
        return redirect('/reservationevent')->with(['success' => "Reservation evenement modifiée"]);
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
        return redirect('/reservationevent')->with(['success' => "Reservation d'evenement Supprimée"]);
    }
    public function clreservationevenement(){
        $typeevenememt = \App\TypeEvent::pluck('Type_evenement','id');
        $salles = \App\Room::all();
        $disposition = \App\DisposalRoom::pluck('Disposition','id');
        $reservationevents = \App\ReservationEvent::orderBy('created_at','DESC')->first();
        return view('/reservationevenement', compact('typeevenememt','reservationevents','salles', 'disposition'));
    }
    public function updatefrontoffice(Request $request){
        $data = $request->validate([
            'Nom_evenement'=>'required',

            'Date_debut'=>'required',
            'Date_fin'=>'required',
            'Duree'=>'required',
            'Nombre_participant'=>'required|min:1|numeric',
            'Restauration'=>'required',
            'Civilite'=>'required',
            'Prenom'=>'required|min:3',
            'Nom'=>'required|min:2',
            'Societe'=>'required|min:3',
            'Secteur_activite'=>'required|min:3',
            'Email'=>'required|email',
            'Telephone'=>'required|min:9|numeric|',
            'user_id'=>'min:1|numeric',
        ]);
        $reseve = new \App\ReservationEvent();
        $reseve-> Nom_evenement = $request->input('Nom_evenement');
        $reseve-> Date_debut = $request->input('Date_debut');
        $reseve-> Date_fin = $request->input('Date_fin');
        $reseve-> Duree = $request->input('Duree');
        $reseve-> Nombre_participant = $request->input('Nombre_participant');
        $reseve-> Restauration = $request->input('Restauration');
        $reseve-> Equipement = $request->input('Equipement1').'|'. $request->input('Equipement2').'|'. $request->input('Equipement3').'|'. $request->input('Equipement4');
        $reseve-> Autres_informations = $request->input('Autres_informations');
        $reseve-> Civilite = $request->input('Civilite');
        $reseve-> Prenom = $request->input('Prenom');
        $reseve-> Nom = $request->input('Nom');
        $reseve-> Identifiant = $request->input('Identifiant');
        $reseve-> Societe = $request->input('Societe');
        $reseve-> Secteur_activite = $request->input('Secteur_activite');
        $reseve-> Email = $request->input('Email');
        $reseve-> Telephone= $request->input('Telephone');
        $reseve-> Montant_payer= $request->input('Montant_payer');
        $reseve-> Statut= $request->input('Statut');
        $reseve-> room_id = $request->input('room_id');
        $reseve-> type_event_id = $request->input('type_event_id');
        $reseve-> disposal_room_id = $request->input('disposal_room_id');
        $reseve-> user_id = $request->input('user_id');
        $reseve-> save();

        return redirect()->back()->with(['success' => "Votre reservation d'evenement est enregistré"]);
    }
}
