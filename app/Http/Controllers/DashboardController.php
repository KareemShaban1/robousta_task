<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Seat;
use App\Models\Station;
use App\Models\Trip;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $buses_count = Bus::count();
        $stations_count = Station::count();
        $trips_count = Trip::count();
        $seats_count = Seat::count();
        return view('backend.pages.dashboard.index',
        compact('buses_count','stations_count','trips_count','seats_count'));
    }

   
}
