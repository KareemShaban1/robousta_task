<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Seat;
use App\Models\Station;
use App\Models\Trip;
use App\Models\TripCost;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    //

    //
    public function index()
    {
        $seats = Seat::all();
        return view('backend.pages.seats.index', compact('seats'));
    }

    public function show_seats($trip_id)
    { 

        $buses = Bus::all();
        $trip = Trip::findOrFail($trip_id);
        $endStationRank = $trip->end_station->rank;
        $startStationRank = $trip->start_station->rank;
        // dd($startStationId,$endStationId);
        $stations = Station::whereBetween('rank', [$startStationRank, $endStationRank])->get();
        // dd($stations);
        $seats =  Seat::where('trip_id', $trip_id)->get();

        return view('backend.pages.seats.show', compact('seats', 'buses', 'stations', 'trip'));

    }

    public function create()
    {
        $buses = Bus::all();
        $stations = Station::all();
        return view('backend.pages.seats.create', compact('buses', 'stations'));
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        Seat::create($request->all());
        return redirect()->route('seats.index');
    }

    public function edit($id)
    {
        $buses = Bus::all();
        $stations = Station::all();
        $seat = Seat::findOrFail($id);
        return view('backend.pages.seats.edit', compact('seat', 'buses', 'stations'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([

        ]);
        $seat = Seat::findOrFail($id);
        $seat->update($request->all());
        return redirect()->route('seats.index');
    }

    public function reserve_seat(Request $request, $id)
    {
        $request->validate([

        ]);
        $data = $request->all();
        $data['seat_status'] = 'reserved';

        // dd($data);
        $seat = Seat::findOrFail($id);
        $seat->update($data);
        return redirect()->route('seats.show_seats', $seat->id);
    }

    public function getTripCost(Request $request)
    {
        // Retrieve the start station ID and end station ID from the request
        $startStationId = $request->start_station_id;
        $endStationId = $request->end_station_id;

        $trip_cost = TripCost::where('start_station_id', $startStationId)
                             ->where('end_station_id', $endStationId)
                             ->value('cost');

                            //  dd($trip_c/ost);
        return response()->json(['trip_cost'=>$trip_cost]);

    }


}
