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

    public function getallVehicles()
    {
      $vehicles = Vehicles::get();
      return response()->json($vehicles);
    }

    public function getVehicle(Request $request)
    {
      $vehicles = Vehicles::where('registration_number', $request->registration_number)->get();
      return response()->json($vehicles);
    }
}
