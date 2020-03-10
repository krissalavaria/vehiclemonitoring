<?php

namespace App\Http\Controllers;

use App\Fuels;
use Illuminate\Http\Request;

class FuelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuels = Fuels::all()->toArray();
        return array_reverse($fuels);
    }

    public function add(Request $request)
    {
        $fuels = new Fuels([
            'vehicle_registration_number' => $request->input('vehicle_registration_number'),
            'date' => $request->input('date'),
            'odometer' => $request->input('odometer'),
            'fuel_type' => $request->input('fuel_type'),
            'reference_number' => $request->input('reference_number')
        ]);
        $fuels->save();
        return response()->json('Successfully saved the data.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fuels  $fuels
     * @return \Illuminate\Http\Response
     */
    public function show(Fuels $fuels)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fuels  $fuels
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fuels = Fuels::find($id);
        return response()->json($fuels);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fuels  $fuels
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $fuels = Fuels::find($id);
        $fuels->update($request->all());

        return response()->json('Successfully updated the data.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fuels  $fuels
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $fuels = Fuels::find($id);
        $fuels->delete($id);

        return response()->json('Successfully delete the data.');
    }
}
