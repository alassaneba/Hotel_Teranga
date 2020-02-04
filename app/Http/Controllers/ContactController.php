<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $contact = \App\Contact::orderBy('created_at','DESC')->get();
        return view('contact', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return  view('Contacts/contactcreate');
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
            'Nom_complet' => 'required',
            'Email' => 'required',
            'Objet' => 'required',
            'Message' => 'required',
        ]);
        $contact = new \App\Contact();
        $contact->Nom_complet = $request->input('Nom_complet');
        $contact->Email = $request->input('Email');
        $contact->Objet = $request->input('Objet');
        $contact->Message = $request->input('Message');
        $contact->Statut = $request->input('Statut');
        $contact->User_id = $request->input('User_id');
        $contact->save();
        return redirect('contact')->with(['success' => "Votre message nous est bien parvenu, merci !"]);
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
        $contactedit= \App\Contact::find($id);
        return view('Contacts/contactedit', compact('contactedit'));
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
        $contact= \App\Contact::find($id);
        if($contact){
          $contact->Nom_complet = $request->input('Nom_complet');
          $contact->Email = $request->input('Email');
          $contact->Objet = $request->input('Objet');
          $contact->Message = $request->input('Message');
          $contact->Statut = $request->input('Statut');
          $contact->User_id = $request->input('User_id');
          $contact-> save(); }
            return redirect('contactmessage')->with(['success' => "Message modifié"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact= \App\Contact::find($id);
      if($contact)
          $contact->delete();
      return redirect('/contactmessage')->with(['success' => "Message Supprimé"]);

    }
    public function Message (){
        $contact = \App\Contact::orderBy('created_at','DESC')->get();
      return view('Contacts/contactmessage', compact('contact'));
    }
}
