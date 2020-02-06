<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bedroom;
use App\Room;
use App\Temoignage;
use \App\Services;

use App\ReservationBedroom;
use App\ReservationEvent;
use App\Contact;
use App\BesoinClient;
use App\DisposalRoom;

use App\TypeEvent;
use \Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      $bedroom_count = Bedroom::all()->count();
      $resbedroom_count = ReservationBedroom::all()->count();
      $resevent_count = ReservationEvent::all()->count();
      $contact_count = Contact::all()->count();
      $besoinclient_count = BesoinClient::all()->count();
      $disposal_count = DisposalRoom::all()->count();
      $room_count = Room::all()->count();
      $typeevent_count = TypeEvent::all()->count();
      $user = Auth::User()->role;
      if($user=='Admin')
       return view('admin',compact('bedroom_count', 'resbedroom_count', 'resevent_count', 'contact_count', 'besoinclient_count','disposal_count','room_count','typeevent_count'));
      if($user=='Moderator')
       return view('moderator');
       if($user=='Superadmin')
        return view('superadmin');

    }
public function accueil(){
  $bedrooms = \App\Bedroom::all();
  $rooms = \App\Room::all();
  $temoignages = \App\Temoignage::all();
  $services = \App\Services::all();
    return view('home',compact('bedrooms','rooms','temoignages','services'));
}
}
