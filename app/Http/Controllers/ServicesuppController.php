<?php

namespace App\Http\Controllers;

use App\Servicesupp;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \Auth;

class ServicesuppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $servicesupp = \App\Servicesupp::orderBy('created_at','DESC')->get();
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Services/hotelservicesupp', compact('servicesupp'));
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
       return view('Services/servicesuppcreate');

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
          'Servicesupp' => 'required',
          'Slogan' => 'required',
          'Description' => 'required',
          'Image' => 'required| image | mimes:jpeg,png,jpg,gif | max: 2048',
          'user_id' => 'required | min:1 ',
      ]);
      $servicesupp = new Servicesupp();
      $servicesupp->Servicesupp = $request->input('Servicesupp');
      $servicesupp->Slogan = $request->input('Slogan');
      $servicesupp->Description = $request->input('Description');
      if ($request->has('Image')) {
      $image = $request->file('Image');
      $image_name = Str::slug($request->input('Servicesupp')) . '_' . time();
      $folder = '/uploads/images/';
      $servicesupp-> Image = $folder . $image_name . '.' . $image->getClientOriginalExtension();
      $this->uploadImage($image, $folder, 'public', $image_name);}
      $servicesupp->user_id = $request->input('user_id');
      $servicesupp->save();
          return redirect('/hotelservicesupp')->with(['success' => "Servicesupp enregistrée"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Servicesupp  $servicesupp
     * @return \Illuminate\Http\Response
     */
    public function show(Servicesupp $servicesupp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicesupp  $servicesupp
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $servicesuppedit= \App\Servicesupp::find($id);
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Services/servicesuppedit', compact('servicesuppedit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicesupp  $servicesupp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
      $servicesupp= \App\Servicesupp::find($id);
      if($servicesupp){
          $servicesupp->Servicesupp = $request->input('Servicesupp');
          $servicesupp->Slogan = $request->input('Slogan');
          $servicesupp->Description = $request->input('Description');
              if($request->has('Image')){
                  //On enregistre l'image dans une variable
                  $image = $request->file('Image');
                  if(file_exists(public_path().$servicesupp->images))//On verifie si le fichier existe
                      Storage::delete(asset($servicesupp->images));//On le supprime alors
                  //Nous enregistrerons nos fichiers dans /uploads/images dans public
                  $folder = '/uploads/images/';
                  $image_name = Str::slug($request->input('name')).'_'.time();
                  $servicesupp->Image = $folder.$image_name.'.'.$image->getClientOriginalExtension();
                  //Maintenant nous pouvons enregistrer l'image dans le dossier en utilisant la méthode uploadImage();
                  $this->uploadImage($image, $folder, 'public', $image_name); }
          $servicesupp->user_id = $request->input('user_id');
          $servicesupp-> save(); }
      return redirect('/hotelservicesupp')->with(['success' => "Servicesupp modifié"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicesupp  $servicesupp
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $servicesupp = Services::find($id);
      if($servicesupp)
          $servicesupp->delete();
      return redirect('/hotelservicesupp')->with(['success' => "Servicesupp Supprimée"]);
    }
    public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null){
        $name = !is_null($filename) ? $filename : str_random('25');
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file; }
}
