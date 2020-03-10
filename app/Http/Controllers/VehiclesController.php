<?php

namespace App\Http\Controllers;

use App\Vehicles;
use App\Http\Resources\VehiclesCollection;
use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicles::all()->toArray();
        return array_reverse($vehicles);
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
     * @param  \App\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicles $vehicles)
    {
        //
    }

    public function add(Request $request)
    {
        $vehicles = new Vehicles([
            'registration_number' => $request->input('registration_number'),
            'model_number' => $request->input('model_number'),
            'plate_number' => $request->input('plate_number'),
            'vehicle_type' => $request->input('vehicle_type')
        ]);
            $vehicles->save();
        return response()->json('Successfuly inserted a new vehicle.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicles = Vehicles::find($id);
        return response()->json($vehicles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $vehicles = Vehicles::find($id);
        $vehicles->update($request->all());

        return response()->json('Vehicle successfully updated.');
    }

    public function delete($id)
    {
        $vehicles = Vehicles::find($id);
        $vehicles->delete();

        return response()->json('Vehicle successfully deleted.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicles  $vehicles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicles $vehicles)
    {
        //
    }
}
