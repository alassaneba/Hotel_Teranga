<?php

namespace App\Http\Controllers;

use App\Bedroom;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
        $bed->Statut = $request->input('Statut');
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
        $this->authorize('admin');
        $bedroomedit= \App\Bedroom::find($id);
        $bedroomedit = \App\Bedroom::pluck('Type_chambre','id');
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
            $bedroom->Type_chambre = $request->input('Type_chambre');
            $bedroom->Description = $request->input('Description');
                if($request->has('Image')){
                    //On enregistre l'image dans une variable
                    $image = $request->file('Image');
                    if(file_exists(public_path().$bedroom->images))//On verifie si le fichier existe
                        Storage::delete(asset($bedroom->images));//On le supprime alors
                    //Nous enregistrerons nos fichiers dans /uploads/images dans public
                    $folder = '/uploads/images/';
                    $image_name = Str::slug($request->input('name')).'_'.time();
                    $bedroom->Image = $folder.$image_name.'.'.$image->getClientOriginalExtension();
                    //Maintenant nous pouvons enregistrer l'image dans le dossier en utilisant la méthode uploadImage();
                    $this->uploadImage($image, $folder, 'public', $image_name); }
            $bedroom-> Prix_nuite= $request->input('Prix_nuite');
            $bedroom-> Statut= $request->input('Statut');
            $bedroom-> ReservationBedroom_id = $request->input('ReservationBedroom_id');
            $bedroom-> save(); }
        return redirect('bedroom')->with(['success' => "Chambre modifiée"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bedroom = Bedroom::find($id);
        if($bedroom)
            $bedroom->delete();
        return redirect('/bedroom');

}

    public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null){
        $name = !is_null($filename) ? $filename : str_random('25');
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
    public function recherche(Request $request){
      $type_chambre = $request->input('Type_chambre');
      $chambres = \App\Bedroom::where('Type_chambre','like',$type_chambre)->get();
      return view('Resultbedroom',compact('chambres'));
    }

}
