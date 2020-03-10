<?php

namespace App\Http\Controllers;

use App\Vale;
use Illuminate\Http\Request;
use Redirect;
use Response;
use DB;
use Config;
use Datatables;

class ValeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vales = Vale::paginate(5);
        return view('vales.index', compact('vales'));
    }

    public function getArray()
    {
        $vales = Vale::all()->toArray();
        return array_reverse($vales);
    }

    public function getdata()
    {
        $vales = Vale::select('customer_name', 'date', 'address', 'plate_number', 'description', 'quantity', 'unit_cost', 'total_amount');
        return Datatables::of($vales)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'date' => 'required',
            'address' => 'required',
            'plate_number' => 'required',
        ]);

        Vale::create($request->all());
        return redirect()->route('vales.index')
            ->with('success', 'Form created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vale  $vale
     * @return \Illuminate\Http\Response
     */
    public function show(Vale $vale)
    {
        return view('vales.show', compact('vale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vale  $vale
     * @return \Illuminate\Http\Response
     */
    public function edit(Vale $vale)
    {
        return view('vales.edit', compact('vale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vale  $vale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vale $vale)
    {
        $request->validate([
            'customer_name' => 'required',
            'date' => 'required',
            'address' => 'required',
            'plate_number' => 'required',
            'description' => 'required',
            'quantity' => 'required',
            'quantity' => 'required',
            'unit_cost' => 'required',
            'total_amount' => 'required',
        ]);

        $vale->update($request->all());
        return redirect()->route('vales.index')
            ->with('success', 'Form updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vale  $vale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vale $vale)
    {
        $vale->delete();
        return redirect()->route('vales.index')
            ->with('success', 'Form deleted successfully.');
    }
}
