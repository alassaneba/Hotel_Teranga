<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use \Auth;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $promotion = \App\Promotion::orderBy('created_at','DESC')->get();
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Promotions/promotion', compact('promotion'));
      if($user=='Admin')
       return view('Promotions/promotionadm', compact('promotion'));
      if($user=='Moderator')
       return view('Promotions/promotionmod', compact('promotion'));
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
       return view('Promotions/promotioncreate');
      if($user=='Admin')
       return view('Promotions/promotioncreateadm');
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
          'Valeur' => 'required',
          'user_id' => 'required | min:1 ',
      ]);
      $promotion = new Promotion();
      $promotion->Titre = $request->input('Titre');
      $promotion->Description = $request->input('Description');
      if ($request->has('Image')) {
      $image = $request->file('Image');
      $image_name = Str::slug($request->input('Titre')) . '_' . time();
      $folder = '/uploads/images/';
      $promotion-> Image = $folder . $image_name . '.' . $image->getClientOriginalExtension();
      $this->uploadImage($image, $folder, 'public', $image_name);}
      $promotion->Valeur = $request->input('Valeur');
      $promotion->user_id = $request->input('user_id');
      $promotion->save();
          return redirect('/promotion')->with(['success' => "Promotion enregistrée"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $promotionedit= \App\Promotion::find($id);
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Promotions/promotionedit', compact('promotionedit'));
      if($user=='Admin')
       return view('Promotions/promotioneditadm', compact('promotionedit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $promotion= \App\Promotion::find($id);
      if($promotion){
          $promotion->Titre = $request->input('Titre');
          $promotion->Description = $request->input('Description');
              if($request->has('Image')){
                  //On enregistre l'image dans une variable
                  $image = $request->file('Image');
                  if(file_exists(public_path().$promotion->images))//On verifie si le fichier existe
                      Storage::delete(asset($promotion->images));//On le supprime alors
                  //Nous enregistrerons nos fichiers dans /uploads/images dans public
                  $folder = '/uploads/images/';
                  $image_name = Str::slug($request->input('name')).'_'.time();
                  $promotion->Image = $folder.$image_name.'.'.$image->getClientOriginalExtension();
                  //Maintenant nous pouvons enregistrer l'image dans le dossier en utilisant la méthode uploadImage();
                  $this->uploadImage($image, $folder, 'public', $image_name); }
          $promotion->Valeur = $request->input('Valeur');
          $promotion->user_id = $request->input('user_id');
          $promotion-> save(); }
      return redirect('/promotion')->with(['success' => "Promotion modifié"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $promotion = Promotion::find($id);
      if($promotion)
          $promotion->delete();
      return redirect('/promotion')->with(['success' => "Promotion Supprimée"]);
    }
    public function uploadImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null){
        $name = !is_null($filename) ? $filename : str_random('25');
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
        return $file;}
}
