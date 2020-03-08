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
use App\Apropos;
use \App\Servicesupp;
use \App\Chambre;
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
      $chambre_count = Chambre::all()->count();
      $service_count = Services::all()->count();
      $apropo_count = Apropos::all()->count();
      $servicesupp_count = Servicesupp::all()->count();
      $user = Auth::User()->role;
      if($user=='Superadmin')
       return view('Users/superadmin',compact('bedroom_count', 'resbedroom_count', 'resevent_count', 'contact_count', 'besoinclient_count','disposal_count','room_count','typeevent_count','chambre_count','service_count','apropo_count','servicesupp_count'));
      if($user=='Admin')
       return view('Users/admin',compact('bedroom_count', 'resbedroom_count', 'resevent_count', 'contact_count', 'besoinclient_count','disposal_count','room_count','typeevent_count','chambre_count'));
      if($user=='Moderator')
       return view('Users/moderator',compact( 'resbedroom_count', 'resevent_count', 'contact_count', 'besoinclient_count'));

    }
public function accueil(){
  $chambres = \App\Bedroom::all();
  $bedrooms = \App\Bedroom::all();
  $rooms = \App\Room::all();
  $temoignages = \App\Temoignage::all();
  $services = \App\Services::all();
  $apropos = \App\Apropos::all();
  $servicesupps = \App\Servicesupp::all();
    return view('accueil',compact('chambres','bedrooms','rooms','temoignages','services','apropos','servicesupps'));
}
}
