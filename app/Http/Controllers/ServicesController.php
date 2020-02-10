<?php

namespace App\Http\Controllers;

use App\Services;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \Auth;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $services = \App\Services::all();
        return view('services',compact('services'));
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
       return view('Services/servicescreate');

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
          'Service' => 'required',
          'Description' => 'required',
          'Image' => 'required| image | mimes:jpeg,png,jpg,gif | max: 2048',
          'User_id' => 'required | min:1 ',
      ]);
      $service = new Services();
      $service->Service = $request->input('Service');
      $service->Description = $request->input('Description');
      if ($request->has('Image')) {
      $image = $request->file('Image');
      $image_name = Str::slug($request->input('Service')) . '_' . time();
      $folder = '/uploads/images/';
      $service-> Image = $folder . $image_name . '.' . $image->getClientOriginalExtension();
      $this->uploadImage($image, $folder, 'public', $image_name);}
      $service->User_id = $request->input('User_id');
      $service->save();
          return redirect('/hotelservices')->with(['success' => "Service enregistrée"]);
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
      $servicesedit= \App\Services::find($id);
      $Service = \App\Services::pluck('Service','id');
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Services/servicesedit', compact('servicesedit','Service'));
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
      $service= \App\Services::find($id);
      if($service){
          $service->Service = $request->input('Service');
          $service->Description = $request->input('Description');
              if($request->has('Image')){
                  //On enregistre l'image dans une variable
                  $image = $request->file('Image');
                  if(file_exists(public_path().$service->images))//On verifie si le fichier existe
                      Storage::delete(asset($service->images));//On le supprime alors
                  //Nous enregistrerons nos fichiers dans /uploads/images dans public
                  $folder = '/uploads/images/';
                  $image_name = Str::slug($request->input('name')).'_'.time();
                  $service->Image = $folder.$image_name.'.'.$image->getClientOriginalExtension();
                  //Maintenant nous pouvons enregistrer l'image dans le dossier en utilisant la méthode uploadImage();
                  $this->uploadImage($image, $folder, 'public', $image_name); }
          $service->User_id = $request->input('User_id');
          $service-> save(); }
      return redirect('/hotelservices')->with(['success' => "Service modifié"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
  
      $service = Services::find($id);
      if($service)
          $service->delete();
      return redirect('/hotelservices')->with(['success' => "Chambre Supprimée"]);
    }
    public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null){
        $name = !is_null($filename) ? $filename : str_random('25');
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
}
public function Hotelservices (){

    $service = \App\Services::orderBy('created_at','DESC')->get();
    $user = Auth::User()->role;
    if($user=='Superadmin')
     return view('Services/hotelservices', compact('service'));
}
}
