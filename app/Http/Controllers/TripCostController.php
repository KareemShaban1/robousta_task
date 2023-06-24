<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\TripCost;
use Illuminate\Http\Request;

class TripCostController extends Controller
{
    //
       //
       public function index()
       {
           $trips_cost = TripCost::all();
           // dd($buses);
           return view('backend.pages.trip_cost.index', compact('trips_cost'));
       }
       public function create()
       {
        $stations = Station::all();
           return view('backend.pages.trip_cost.create',compact('stations'));
       }
   
       public function store(Request $request)
       {
           $request->validate([
   
           ]);
   
           TripCost::create($request->all());
           return redirect()->route('trip_cost.index');
       }
   
       public function edit($id)
       {
           $trip_cost = TripCost::findOrFail($id);
           $stations = Station::all();

           return view('backend.pages.trip_cost.edit',compact('trip_cost','stations'));
       }
   
       public function update(Request $request,$id)
       {
           $request->validate([
   
           ]);
           $trip_cost = TripCost::findOrFail($id);
           $trip_cost->update($request->all());
           return redirect()->route('buses.index');
       }
   
}
