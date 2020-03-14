<?php

namespace App\Http\Controllers;

use App\Vale;
use Illuminate\Http\Request;
use Redirect;
use Response;
use DB;
use Config;
use Carbon\Carbon;

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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function adminmain()
    {
        return view('admin.adminmain');
    }

    /**
     * @return mixed
     */
    public function totalamount()
    {
        return Vale::whereMonth('date', date('m'))->sum('total_amount');
    }

    /**
     * @return array
     */
    public function indexarray()
    {
        $valesarray = Vale::all()->toArray();
        return array_reverse($valesarray);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
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
            'vehicle_description' => $request->input('vehicle_description'),
        ]);
        return response()->json('Request successfully added.');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editarray($id)
    {
        $valesarray = Vale::find($id);
        return response()->json($valesarray);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatearray($id, Request $request)
    {
        $valesarray = Vale::find($id);
        $valesarray->update($request->all());

        return response()->json('Request successfully updated!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
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
     * @param \Illuminate\Http\Request $request
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
     * @param \App\Vale $vale
     * @return \Illuminate\Http\Response
     */
    public function show(Vale $vale)
    {
        return view('vales.show', compact('vale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Vale $vale
     * @return \Illuminate\Http\Response
     */
    public function edit(Vale $vale)
    {
        return view('vales.edit', compact('vale'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Vale $vale
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
     * @param \App\Vale $vale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vale $vale)
    {
        $vale->delete();
        return redirect()->route('vales.index')
            ->with('success', 'Form deleted successfully.');
    }

    /**
     * REQUESTS FILTER REPORTS
     */

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getallRequests()
    {
        $valesarray = Vale::all()->toArray();
        return response()->json($valesarray);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStatus(Request $request)
    {
        $vale = Vale::where('form_status', $request->form_status)->get();
        return response()->json($vale);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRequestbyDate(Request $request)
    {
        $vale = Vale::whereMonth('date', $request->date)->get();
        return response()->json($vale);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getRequestbyCustomer(Request $request)
    {
        $vale = Vale::where('customer_name', $request->customer_name)->get();
        return response()->json($vale);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getReportsTotal()
    {
        $total = DB::table('vales')->sum('total_amount');
        return response()->json($total);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getVehicleReports(Request $request)
    {
        $vehicles = Vale::where('plate_number', $request->plate_number)->get();
        return response()->json($vehicles);
    }

    /**
     * GET MONTHLY SUM OF REQUESTS
     * CHARTS
     */

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function JanuaryExpense()
    {
        $january = Vale::whereYear('created_at', date('Y'))->whereMonth('date', date('1'))->sum('total_amount');
        return response()->json($january);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function FebruaryExpense()
    {
        $january = Vale::whereYear('created_at', date('Y'))->whereMonth('date', date('2'))->sum('total_amount');
        return response()->json($january);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function MarchExpense()
    {
        $january = Vale::whereYear('created_at', date('Y'))->whereMonth('date', date('3'))->sum('total_amount');
        return response()->json($january);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function AprilExpense()
    {
        $january = Vale::whereYear('created_at', date('Y'))->whereMonth('date', date('4'))->sum('total_amount');
        return response()->json($january);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function MayExpense()
    {
        $january = Vale::whereYear('created_at', date('Y'))->whereMonth('date', date('5'))->sum('total_amount');
        return response()->json($january);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function JuneExpense()
    {
        $january = Vale::whereYear('created_at', date('Y'))->whereMonth('date', date('6'))->sum('total_amount');
        return response()->json($january);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function JulyExpense()
    {
        $january = Vale::whereYear('created_at', date('Y'))->whereMonth('date', date('7'))->sum('total_amount');
        return response()->json($january);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function AugustExpense()
    {
        $january = Vale::whereYear('created_at', date('Y'))->whereMonth('date', date('8'))->sum('total_amount');
        return response()->json($january);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function SeptemberExpense()
    {
        $january = Vale::whereYear('created_at', date('Y'))->whereMonth('date', date('9'))->sum('total_amount');
        return response()->json($january);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function OctoberExpense()
    {
        $january = Vale::whereYear('created_at', date('Y'))->whereMonth('date', date('10'))->sum('total_amount');
        return response()->json($january);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function NovemberExpense()
    {
        $january = Vale::whereYear('created_at', date('Y'))->whereMonth('date', date('11'))->sum('total_amount');
        return response()->json($january);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function DecemberExpense()
    {
        $january = Vale::whereYear('created_at', date('Y'))->whereMonth('date', date('12'))->sum('total_amount');
        return response()->json($january);
    }
}
