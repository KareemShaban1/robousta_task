<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Seat;
use App\Models\Station;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Http\Request;

class TripController extends Controller
{
    //
    public function index()
    {
        $trips = Trip::withCount([
            'seats' => function ($query) {
                return $query;
            },
            'reseved_seats' => function ($query) {
                return $query->where('seat_status','reserved');
            }
        ])->get();
        return view('backend.pages.trips.index', compact('trips'));
    }
    public function create()
    {
        $buses = Bus::all();
        $stations = Station::all();
        return view('backend.pages.trips.create', compact('buses', 'stations'));
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        $trip = Trip::create($request->all());

        $bus = Bus::find($trip->bus_id);

        $user = User::find(1);

        for ($i=1; $i <= $bus->number_of_seats; $i++) { 
            Seat::create([ 
                'trip_id'=>$trip->id, 
                'bus_id'=>$trip->bus_id,
                'seat_status'=>'not_reserved',
                'seat_number'=>$i
            ]);
        }
        return redirect()->route('trips.index');
    }

    public function edit($id)
    {
        $buses = Bus::all();
        $stations = Station::all();
        $trip = Trip::findOrFail($id);
        return view('backend.pages.trips.edit', compact('trip','buses', 'stations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

        ]);
        $trip = Trip::findOrFail($id);
        $trip->update($request->all());
        return redirect()->route('trips.index');
    }

}
