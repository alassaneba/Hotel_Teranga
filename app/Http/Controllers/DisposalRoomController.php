<?php

namespace App\Http\Controllers;

use App\DisposalRoom;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DisposalRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $disposal = \App\DisposalRoom::orderBy('created_at','DESC')->get();
      return view('Disposals/disposal', compact('disposal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Disposals/disposalcreate');
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
          'Disposition' => 'required',
          'ReservationEvent_id' => 'required | min:1 ',
      ]);
      $dispo = new DisposalRoom();
      $dispo->Disposition = $request->input('Disposition');
      $dispo->ReservationEvent_id = $request->input('ReservationEvent_id');
      $dispo->save();
      return redirect('disposal')->with(['success' => "Dispositin salle enregistrée"]);

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
      $disposal = DisposalRoom::find($id);
      if($disposal)
      $disposal->delete();
      return redirect('/disposal');
    }
}
