<?php

namespace App\Http\Controllers;

use App\TypeEvent;
use Illuminate\Http\Request;

class TypeEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $typeevent = \App\TypeEvent::orderBy('created_at','DESC')->get();
      return view('Types/typeevent', compact('typeevent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('Types/typeeventcreate');
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
          'Type_evenement' => 'required',
          'ReservationEvent_id' => 'required | min:1 ',
      ]);
      $type = new TypeEvent();
      $type->Type_evenement = $request->input('Type_evenement');
      $type->ReservationEvent_id = $request->input('ReservationEvent_id');
      $type->save();
      return redirect('typeevent')->with(['success' => "Type d'evenement enregistrée"]);
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
      $typeevent = TypeEvent::find($id);
      if($typeevent)
      $typeevent->delete();
      return redirect('/typeevent');
    }
}
