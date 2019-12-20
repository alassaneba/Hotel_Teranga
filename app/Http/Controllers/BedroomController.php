<?php

namespace App\Http\Controllers;

use App\Bedroom;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;


class BedroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bedroom = \App\Bedroom::orderBy('created_at','DESC')->get();
        return view('Bedrooms.bedroom', compact('bedroom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('Bedrooms.bedroomcreate');
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
            'Type_chambre' => 'required',
            'Description' => 'required',
            'Image' => 'required| image | mimes:jpeg,png,jpg,gif | max: 2048',
            'Prix_nuite' => 'required | numeric',
            'ReservationBedroom_id' => 'required | min:1 ',
        ]);
        $bed = new Bedroom();
        $bed->Type_chambre = $request->input('Type_chambre');
        $bed->Description = $request->input('Description');
        if ($request->has('Image')) {
        $image = $request->file('Image');
        $image_name = Str::slug($request->input('Type_chambre')) . '_' . time();
        $folder = '/uploads/images/';
        $bed-> Image = $folder . $image_name . '.' . $image->getClientOriginalExtension();
        $this->uploadImage($image, $folder, 'public', $image_name);
        $bed->Prix_nuite = $request->input('Prix_nuite');
        $bed->ReservationBedroom_id = $request->input('ReservationBedroom_id');
        $bed->save();
            return redirect('bedroom')->with(['success' => "Chambre enregistrée"]);
        }
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
        $bedroomedit= \App\Bedroom::find($id);
        return view('Bedrooms.bedroomedit', compact('bedroomedit'));
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
        $bedroom= \App\Bedroom::find($id);
        if($bedroom){
            $bedroom-> Type_chambre = $request->input('Type_chambre');
            $bedroom-> Description = $request->input('Description');
            $bedroom-> Image = $request->input('Image');
            $bedroom-> Prix_nuite= $request->input('Prix_nuite');
            $bedroom-> ReservationBedroom_id = $request->input('ReservationBedroom_id');
            $bedroom-> save(); }
        return redirect('bedroom')->with(['success' => "Chambre modifiée"]);;
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

    public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null){
        $name = !is_null($filename) ? $filename : str_random('25');
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

}
