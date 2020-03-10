<?php

namespace App\Http\Controllers;

use App\Drivers;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Driver\Driver;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Drivers::all()->toArray();
        return array_reverse($drivers);
    }

    public function add(Request $request)
    {
        $drivers = new Drivers([
            'driver_name' => $request->input('driver_name'),
            'contact_number' => $request->input('contact_number'),
            'license_number' => $request->input('license_number'),
            'license_expiration' => $request->input('license_expiration'),
            'driver_address' => $request->input('driver_address'),
            'driver_status' => $request->input('driver_status')
        ]);
        $drivers->save();
        return response()->json('Driver successfully registered.');
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
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function show(Drivers $drivers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $drivers = Drivers::find($id);
        return response()->json($drivers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $drivers = Drivers::find($id);
        $drivers->update($request->all());

        return response()->json('The driver information successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $drivers = Drivers::find($id);
        $drivers->delete();
        return  response()->json('Successfully deleted!');
    }
}
