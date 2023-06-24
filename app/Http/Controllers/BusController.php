<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    //
    public function index()
    {
        $buses = Bus::all();
        // dd($buses);
        return view('backend.pages.buses.index', compact('buses'));
    }
    public function create()
    {
        return view('backend.pages.buses.create');
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        Bus::create($request->all());
        return redirect()->route('buses.index');
    }

    public function edit($id)
    {
        $bus = Bus::findOrFail($id);
        return view('backend.pages.buses.edit',compact('bus'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([

        ]);
        $bus = Bus::findOrFail($id);
        $bus->update($request->all());
        return redirect()->route('buses.index');
    }

}
