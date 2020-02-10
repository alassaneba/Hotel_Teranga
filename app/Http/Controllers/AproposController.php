<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Temoignage;
use App\Apropos;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \Auth;

class AproposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $temoignages = \App\Temoignage::all();
      $services = \App\Services::all();
      $apropos = \App\Apropos::all();
      return view('a-propos',compact('temoignages','services','apropos'));

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
       return view('Apropos/aproposcreate');
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
          'Titre' => 'required',
          'Description' => 'required',
          'Image' => 'required| image | mimes:jpeg,png,jpg,gif | max: 2048',
          'Lien_video' => 'required',
          'User_id' => 'required | min:1 ',
      ]);
      $apropo = new Apropos();
      $apropo->Titre = $request->input('Titre');
      $apropo->Description = $request->input('Description');
      if ($request->has('Image')) {
      $image = $request->file('Image');
      $image_name = Str::slug($request->input('Titre')) . '_' . time();
      $folder = '/uploads/images/';
      $apropo-> Image = $folder . $image_name . '.' . $image->getClientOriginalExtension();
      $this->uploadImage($image, $folder, 'public', $image_name);}
      $apropo->Lien_video = $request->input('Lien_video');
      $apropo->User_id = $request->input('User_id');
      $apropo->save();
          return redirect('/hotelapropos')->with(['success' => "Apropos enregistrée"]);
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
      $aproposedit= \App\Apropos::find($id);
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Apropos/aproposedit', compact('aproposedit'));
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
      $apropo= \App\Apropos::find($id);
      if($apropo){
          $apropo->Titre = $request->input('Titre');
          $apropo->Description = $request->input('Description');
              if($request->has('Image')){
                  //On enregistre l'image dans une variable
                  $image = $request->file('Image');
                  if(file_exists(public_path().$apropo->images))//On verifie si le fichier existe
                      Storage::delete(asset($apropo->images));//On le supprime alors
                  //Nous enregistrerons nos fichiers dans /uploads/images dans public
                  $folder = '/uploads/images/';
                  $image_name = Str::slug($request->input('name')).'_'.time();
                  $apropo->Image = $folder.$image_name.'.'.$image->getClientOriginalExtension();
                  //Maintenant nous pouvons enregistrer l'image dans le dossier en utilisant la méthode uploadImage();
                  $this->uploadImage($image, $folder, 'public', $image_name); }
          $apropo->Lien_video = $request->input('Lien_video');
          $apropo->User_id = $request->input('User_id');
          $apropo-> save(); }
      return redirect('/hotelapropos')->with(['success' => "Apropos modifié"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $propo = Apropos::find($id);
      if($propo)
          $propo->delete();
      return redirect('/hotelapropos')->with(['success' => "Apropos Supprimée"]);
    }
    public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null){
        $name = !is_null($filename) ? $filename : str_random('25');
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
}
public function Hotelapropos (){

    $apropo = \App\Apropos::orderBy('created_at','DESC')->get();
    $user = Auth::User()->role;
    if($user=='Superadmin')
     return view('Apropos/hotelapropos', compact('apropo'));
}
}
