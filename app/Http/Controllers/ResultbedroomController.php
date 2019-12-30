<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultbedroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
    public function Resultbedroom(Request $request){
        $lieu_depart =  $request->input('lieu_depart');
        $lieu_arrivee =  $request->input('lieu_arrivee');
        $date_depart =  $request->input('date_depart');
        $heure_depart =  $request->input('heure_depart');
        $bedroom =  \App\Bedroom::orWhere("Description", "like", "%$lieu_depart%")
                            ->orWhere("Type_chambre", "like", "%$lieu_arrivee%")
                            ->orWhere("Image", "like", "%$date_depart%")
                            ->orWhere("Prix_nuite", "like", "%$date_depart%")
                            ->get();
        return view('Resultbedroom', compact('bedroom'));
    }
}
