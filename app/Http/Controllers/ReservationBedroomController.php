<?php

namespace App\Http\Controllers;

use App\ReservationBedroom;
use Illuminate\Http\Request;
use \Auth;

class ReservationBedroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservationbedroom = \App\ReservationBedroom::orderBy('created_at','DESC')->get();
        $user = Auth::User()->role;
        if($user=='Superadmin')
         return view('/Reservations/reservationbedroom',compact('reservationbedroom'));
        if($user=='Admin')
         return view('/Reservations/reservationbedroomadm',compact('reservationbedroom'));
        if($user=='Moderator')
         return view('/Reservations/reservationbedroommod',compact('reservationbedroom'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bedrooms = \App\Bedroom::pluck('Type_chambre','id');
        $user = Auth::User()->role;
        if($user=='Superadmin')
         return view('/Reservations/resbedroomcreate',compact('bedrooms'));
        if($user=='Admin')
         return view('/Reservations/resbedroomcreateadm',compact('bedrooms'));
        if($user=='Moderator')
         return view('/Reservations/resbedroomcreatemod',compact('bedrooms'));

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
             'Date_arriver'=>'required',
             'Heure_arriver'=>'required',
             'Date_depart'=>'required',
             'Nombre_chambre'=>'required|numeric',
             'Nombre_adulte'=>'required|min:1|numeric',
             'Nombre_enfant'=>'required|nullable|numeric',
             'Civilite'=>'required',
             'Prenom'=>'required|min:3',
             'Nom'=>'required|min:2',
             'Nationalite'=>'required|min:2',
             'Email'=>'required|email',
             'Telephone'=>'required|min:9|numeric|',
             'Montant_payer'=>'required|min:0|numeric',
             'user_id'=>'min:1|numeric',
        ]);
        $resbed = new ReservationBedroom();
        $resbed-> Date_arriver = $request->input('Date_arriver');
        $resbed-> Heure_arriver = $request->input('Heure_arriver');
        $resbed-> Date_depart = $request->input('Date_depart');
        $resbed-> Nombre_chambre = $request->input('Nombre_chambre');
        $resbed-> Nombre_adulte = $request->input('Nombre_adulte');
        $resbed-> Nombre_enfant = $request->input('Nombre_enfant');
        $resbed-> Numero_chambre = $request->input('Numero_chambre');
        $resbed-> Civilite = $request->input('Civilite');
        $resbed-> Prenom = $request->input('Prenom');
        $resbed-> Nom = $request->input('Nom');
        $resbed-> Nationalite = $request->input('Nationalite');
        $resbed-> Identifiant = $request->input('Identifiant');
        $resbed-> Email = $request->input('Email');
        $resbed-> Telephone= $request->input('Telephone');
        $resbed-> Montant_payer= $request->input('Montant_payer');
        $resbed-> Statut = $request->input('Statut');
        $resbed-> bedroom_id = $request->input('bedroom_id');
        $resbed-> user_id = $request->input('user_id');
        $resbed-> save();

        return redirect('/reservationbedroom')->with(['success' => "Reservation chambre enregistrée"]);
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
            $resbedroomedit= \App\ReservationBedroom::find($id);
            $bedrooms = \App\Bedroom::pluck('Type_chambre','id');
            $typechambre = \App\Bedroom::find($resbedroomedit->bedroom_id)->Type_chambre;
            $reservationbedroom = \App\ReservationBedroom::orderBy('created_at','DESC')->first();
            $user = Auth::User()->role;
            if($user=='Superadmin')
             return view('/Reservations/resbedroomedit', compact('resbedroomedit','bedrooms','typechambre','reservationbedroom'));
            if($user=='Admin')
             return view('/Reservations/resbedroomeditadm', compact('resbedroomedit','bedrooms','typechambre','reservationbedroom'));
            if($user=='Moderator')
             return view('/Reservations/resbedroomeditmod', compact('resbedroomedit','bedrooms','typechambre','reservationbedroom'));

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
        $reservationbedroom = \App\ReservationBedroom::find($id);
        if ($reservationbedroom) {
            $reservationbedroom->Date_arriver = $request->input('Date_arriver');
            $reservationbedroom->Heure_arriver = $request->input('Heure_arriver');
            $reservationbedroom->Date_depart = $request->input('Date_depart');
            $reservationbedroom->Nombre_chambre = $request->input('Nombre_chambre');
            $reservationbedroom->Nombre_adulte = $request->input('Nombre_adulte');
            $reservationbedroom->Nombre_enfant = $request->input('Nombre_enfant');
            $reservationbedroom->Numero_chambre = $request->input('Numero_chambre');
            $reservationbedroom->Civilite = $request->input('Civilite');
            $reservationbedroom->Prenom = $request->input('Prenom');
            $reservationbedroom->Nom = $request->input('Nom');
            $reservationbedroom->Nationalite = $request->input('Nationalite');
            $reservationbedroom->Identifiant = $request->input('Identifiant');
            $reservationbedroom->Email = $request->input('Email');
            $reservationbedroom->Telephone = $request->input('Telephone');
                $reservationbedroom->Montant_payer = $request->input('Montant_payer');
                $reservationbedroom->Statut = $request->input('Statut');
                $reservationbedroom->bedroom_id = $request->input('bedroom_id');
                $reservationbedroom->user_id = $request->input('user_id');
                $reservationbedroom->save();
            }
            return redirect('/reservationbedroom')->with(['success' => "Reservation chambre modifiée"]);
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservationbedroom = ReservationBedroom::find($id);
        if($reservationbedroom)
            $reservationbedroom->delete();
        return redirect('/reservationbedroom')->with(['success' => "Reservation chambre Supprimé"]);
    }
    public function clreservationchambre(){
      $bedrooms = \App\Bedroom::pluck('Type_chambre','id');
      $reservationbedroom = \App\ReservationBedroom::orderBy('created_at','DESC')->first();
      return view('/reservationchambre', compact('bedrooms','reservationbedroom'));
    }

    public function updatefrontoffice(Request $request)
        {
             $data = $request->validate([
                 'Date_arriver'=>'required',
                 'Heure_arriver'=>'required',
                 'Date_depart'=>'required',
                 'Nombre_chambre'=>'required|numeric',
                 'Nombre_adulte'=>'required|min:1|numeric',
                 'Nombre_enfant'=>'required|nullable|numeric',
                 'Civilite'=>'required',
                 'Prenom'=>'required|min:3',
                 'Nom'=>'required|min:2',
                 'Nationalite'=>'required|min:2',
                 'Email'=>'required|email',
                 'Telephone'=>'required|min:9|numeric|',
                 'Montant_payer'=>'required|min:0|numeric',
                 'user_id'=>'min:1|numeric',
            ]);
            $resbed = new ReservationBedroom();
            $resbed-> Date_arriver = $request->input('Date_arriver');
            $resbed-> Heure_arriver = $request->input('Heure_arriver');
            $resbed-> Date_depart = $request->input('Date_depart');
            $resbed-> Nombre_chambre = $request->input('Nombre_chambre');
            $resbed-> Nombre_adulte = $request->input('Nombre_adulte');
            $resbed-> Nombre_enfant = $request->input('Nombre_enfant');
            $resbed-> Numero_chambre = $request->input('Numero_chambre');
            $resbed-> Civilite = $request->input('Civilite');
            $resbed-> Prenom = $request->input('Prenom');
            $resbed-> Nom = $request->input('Nom');
            $resbed-> Nationalite = $request->input('Nationalite');
            $resbed-> Identifiant = $request->input('Identifiant');
            $resbed-> Email = $request->input('Email');
            $resbed-> Telephone= $request->input('Telephone');
            $resbed-> Montant_payer= $request->input('Montant_payer');
            $resbed-> Statut= $request->input('Statut');
            $resbed-> bedroom_id = $request->input('bedroom_id');
            $resbed-> user_id = $request->input('user_id');
            $resbed-> save();

              return redirect()->back()->with(['success' => "Votre reservation de chambre est enregistrée. Nous vous contacterons sous peu pour la confirmation."]);
        }
}
