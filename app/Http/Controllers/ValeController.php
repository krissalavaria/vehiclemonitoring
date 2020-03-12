<?php

namespace App\Http\Controllers;

use App\Vale;
use Illuminate\Http\Request;
use Redirect;
use Response;
use DB;
use Config;

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

    public function adminmain()
    {
      return view('admin.adminmain');
    }

    public function totalamount()
    {
      return Vale::whereMonth('date', date('m'))->sum('total_amount');
    }

    public function indexarray()
    {
        $valesarray = Vale::all()->toArray();
        return array_reverse($valesarray);
    }

    public function addarray(Request $request)
    {
      $valesarray = new Vale([
        'customer_name' => $request->input('customer_name'),
        'date' => $request->input('date'),
        'address' => $request->input('address'),
        'plate_number' => $request->input('plate_number'),
        'description' => $request->input('description'),
        'quantity' => $request->input('quantity'),
        'unit_cost' => $request->input('unit_cost'),
        'total_amount' => $request->input('total_amount'),
        'receipt_number' => $request->input('receipt_number'),
        'form_status' => $request->input('form_status'),
      ]);
      return response()->json('Request successfully added.');
    }

    public function editarray($id)
    {
      $valesarray = Vale::find($id);
      return response()->json($valesarray);
    }

    public function updatearray($id, Request $request)
    {
      $valesarray = Vale::find($id);
      $valesarray->update($request->all());

      return response()->json('Request successfully updated!');
    }

    public function deletearray($id)
    {
      $valesarray = Vale::find($id);
      $valesarray->delete();

      return response()->json('Request deleted.');
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
            'receipt_number' => 'required',
            'form_status' => 'required'
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

    // FILTERS
    public function getallRequests()
    {
      $valesarray = Vale::all()->toArray();
      return response()->json($valesarray);
    }

    public function getStatus(Request $request)
    {
      $vale = Vale::where('form_status', $request->form_status)->get();
      return response()->json($vale);
    }

    public function getRequestbyDate(Request $request)
    {
      $vale = Vale::whereMonth('date', $request->date)->get();
      return response()->json($vale);
    }
    public function getRequestbyCustomer(Request $request)
    {
      $vale = Vale::where('customer_name', $request->customer_name)->get();
      return response()->json($vale);
    }
}
