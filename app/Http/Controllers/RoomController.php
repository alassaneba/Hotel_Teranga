<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \Auth;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $room = \App\Room::orderBy('created_at','DESC')->get();
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Rooms/room',compact('room'));
      if($user=='Admin')
       return view('Rooms/roomadm',compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Rooms/roomcreate');
      if($user=='Admin')
       return view('Rooms/roomcreateadm');

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
          'Salles' => 'required',
          'Description' => 'required',
          'Image' => 'required| image | mimes:jpeg,png,jpg,gif | max: 2048',

      ]);
      $roo = new Room();
      $roo->Salles = $request->input('Salles');
      $roo->Description = $request->input('Description');
      if ($request->has('Image')) {
      $image = $request->file('Image');
      $image_name = Str::slug($request->input('Salles')) . '_' . time();
      $folder = '/uploads/images/';
      $roo-> Image = $folder . $image_name . '.' . $image->getClientOriginalExtension();
      $this->uploadImage($image, $folder, 'public', $image_name);}
      $roo->Statut = $request->input('Statut');
      $roo->save();
      return redirect('/room')->with(['success' => "Salles ou Espaces enregistrée"]);
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

      $roomedit= \App\Room::find($id);
      $Salles = \App\Room::pluck('Salles','id');
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Rooms/roomedit', compact('roomedit','Salles'));
      if($user=='Admin')
       return view('Rooms/roomeditadm', compact('roomedit','Salles'));

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
      $room= \App\Room::find($id);
      if($room){
          $room->Salles = $request->input('Salles');
          $room->Description = $request->input('Description');
              if($request->has('Image')){
                  //On enregistre l'image dans une variable
                  $image = $request->file('Image');
                  if(file_exists(public_path().$room->images))//On verifie si le fichier existe
                      Storage::delete(asset($room->images));//On le supprime alors
                  //Nous enregistrerons nos fichiers dans /uploads/images dans public
                  $folder = '/uploads/images/';
                  $image_name = Str::slug($request->input('name')).'_'.time();
                  $room->Image = $folder.$image_name.'.'.$image->getClientOriginalExtension();
                  //Maintenant nous pouvons enregistrer l'image dans le dossier en utilisant la méthode uploadImage();
                  $this->uploadImage($image, $folder, 'public', $image_name); }
          $room-> Statut = $request->input('Statut');

          $room-> save(); }
      return redirect('room')->with(['success' => "Salles ou Espaces modifiés"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $room = Room::find($id);
      if($room)
      $room->delete();
      return redirect('/room')->with(['success' => "Espace ou Salle Supprimé"]);
    }

    public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null){
        $name = !is_null($filename) ? $filename : str_random('25');
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
}
