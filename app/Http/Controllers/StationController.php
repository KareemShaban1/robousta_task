<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    //

        //
        public function index()
        {
            $stations = Station::all();
            // dd($buses);
            return view('backend.pages.stations.index', compact('stations'));
        }
        public function create()
        {
            return view('backend.pages.stations.create');
        }
    
        public function store(Request $request)
        {
            $request->validate([
    
            ]);
    
            Station::create($request->all());
            return redirect()->route('stations.index');
        }
    
        public function edit($id)
        {
            $station = Station::findOrFail($id);
            return view('backend.pages.stations.edit',compact('station'));
        }
    
        public function update(Request $request,$id)
        {
            $request->validate([
    
            ]);
            $station = Station::findOrFail($id);
            $station->update($request->all());
            return redirect()->route('stations.index');
        }
}
