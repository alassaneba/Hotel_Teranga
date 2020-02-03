<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bedroom;
use App\Room;
use App\Temoignage;
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
        $bedrooms = \App\Bedroom::all();
        $rooms = \App\Room::all();
        $temoignages = \App\Temoignage::all();
        return view('home',compact('bedrooms','rooms','temoignages'));
    }

}
