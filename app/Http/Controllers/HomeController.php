<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show_search_trip(Request $request)
    {
        $lieu_depart = $request->input('lieu_depart');
        $lieu_arrivee = $request->input('lieu_arrivee');
        $date_depart = $request->input('date_depart');
        $heure_depart = $request->input('heure_depart');
        $trips = \App\Trip::orWhere("lieu_depart", "like", "%$lieu_depart%")
            ->orWhere("lieu_arrivee", "like", "%$lieu_arrivee%")
            ->orWhere("date_depart", "like", "%$date_depart%")
            ->orWhere("date_depart", "like", "%$date_depart%")
            ->get();
        return view('show_search_trips', compact('trips'));
    }
}
