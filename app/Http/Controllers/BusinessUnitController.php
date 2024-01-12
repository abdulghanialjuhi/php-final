<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use Illuminate\Support\Facades\Auth;

class BusinessUnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = RequestModel::all();
        // return view('adminPage', ['systems'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user()->user_id;

        $bu = BusinessUnit::where('id', $user)->first();

        $newRequest = new RequestModel();

        $newRequest->system_name = $request->systemName;
        $newRequest->description = $request->systemDescription;
        $newRequest->status = "New";
        $newRequest->bu_id = $bu->id;

        $newRequest->save();


        // Optionally, you can return a response or redirect
        return response()->json(['message' => 'Record created successfully', 'data' => $newRequest]);
    }

    public function storeEnhancement(Request $request)
    {
        $user = auth()->user()->user_id;

        $bu = BusinessUnit::where('id', $user)->first();

        $newRequest = new RequestModel();

        $newRequest->system_name = $request->systemName;
        $newRequest->description = $request->systemDescription;
        $newRequest->status = "enhancement";
        $newRequest->system_id = $request->enhance;
        $newRequest->bu_id = $bu->id;

        $newRequest->save();


        // Optionally, you can return a response or redirect
        return response()->json(['message' => 'Record created successfully', 'data' => $newRequest]);
    }

    /**
     * Display the specified resource.
     */
    public function show(BusinessUnit $businessUnit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BusinessUnit $businessUnit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BusinessUnit $businessUnit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BusinessUnit $businessUnit)
    {
        //
    }
}
