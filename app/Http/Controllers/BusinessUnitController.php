<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use App\Models\System;
use Illuminate\Support\Facades\Auth;

class BusinessUnitController extends Controller
{
    
    public function index()
    {
        $user = auth()->user()?->user_id;
        // echo "user: ", $user;
        $data = System::where('bu_id', $user)->get();
        return view('bu.dashboard', ['systems'=>$data]);
    }

    public function requests()
    {
        $user = auth()->user()?->user_id;
        // echo "user: ", $user;
        $data = RequestModel::where('bu_id', $user)->get();
        return view('bu.displayRequests', ['requests'=>$data]);
    }


    public function store(Request $request)
    {
        $user = auth()->user()?->user_id;

        $bu = BusinessUnit::where('id', $user)->first();

        $newRequest = new RequestModel();

        $newRequest->system_name = $request->systemName;
        $newRequest->description = $request->systemDescription;
        $newRequest->status = "pending";
        $newRequest->type = "new";
        $newRequest->bu_id = $bu->id;

        $newRequest->save();

        return response()->redirectTo('bu/busines-unit/requests');
    }

    public function enhancement($id)
    {
        $data = System::where('id', $id)->first();
        return view('bu.requestEnhanceForm', ['system'=>$data, 'id'=>$id]);
    }

    public function storeEnhancement(Request $request)
    {
        $user = auth()->user()->user_id;

        $bu = BusinessUnit::where('id', $user)->first();

        $newRequest = new RequestModel();

        $newRequest->system_name = $request->systemName;
        $newRequest->description = $request->systemDescription;
        $newRequest->status = "pending";
        $newRequest->type = "enhancement";
        $newRequest->system_id = $request->enhance;
        $newRequest->bu_id = $bu->id;

        $newRequest->save();

        return response()->redirectTo('bu/busines-unit/requests');
    }

    
    public function deleteRequest($id) 
    {
        $data = RequestModel::find($id);
        $data->delete();

        return redirect('bu/busines-unit/requests');
    }

}
