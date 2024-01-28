<?php

namespace App\Http\Controllers;

use App\Models\BusinessUnit;
use App\Models\Developer;
use App\Models\Manager;
use App\Models\Progress;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Request as RequestModel;
use App\Models\System;
use Carbon\Carbon;
use DateTime;

class ManagerController extends Controller
{
    public function index()
    {
        $data = RequestModel::where('status', 'pending')->get();

        foreach ($data as $item) {
            $bu_date = BusinessUnit::where('id', $item->bu_id)->first();
            $item->name = $bu_date->name;
        }
        

        return view('manager.dashboard', ['requests'=>$data]);
    }

    public function listProjects()
    {
        // $data = Project::all();
        $data = Project::where('approved', false)->get();

        return view('manager.projects', ['projects'=>$data]);
    }

    public function projectDetails($id)
    {
        $data = Project::where('id', $id)->first();
        if (!$data)
        abort(404); 

        $developer = Developer::where('id', $data->lead_dev)->first();

        $project_progress = Progress::where('project_id', $data->id)->get();

        $data->leader_name = $developer->name;

        return view('manager.projectDetails', ['project'=>$data, 'project_progress'=>$project_progress]);
    }


    public function createProjectForm($id)
    {

        $data = RequestModel::where('id', $id)->first();

        $bu_date = BusinessUnit::where('id', $data->bu_id)->first();
        $data->name = $bu_date->name;

        $developers = Developer::all();

        return view('manager.projectForm', ['request'=>$data, 'developers'=>$developers]);
    }

    public function createProjectRequest(Request $request)
    {
        $requestData = RequestModel::where('id', $request->requestId)->first(); 

        if(!$requestData)
        abort(404);
    
        if($requestData->status == 'approved')
        abort(409, "Confelict, Request already approved"); 
    

        $user = auth()->user()->user_id;

        $bu = Manager::where('id', $user)->first();

        $startDate = Carbon::parse($request->startDate);
        $endDate = Carbon::parse($request->endDate);
        $duration = $endDate->diffInDays($startDate);

        // Check if start date is before the end date
        if ($endDate->lessThan($startDate))
            abort(409, "Start Date should be before end date");

        if(in_array($request->projectLeader, $request->developers))
            abort(409, "Confelict, Leader developer can't be in developers list");


        $newProject = Project::create([
            'bu_name' => $request->buName,
            'system_name' => $request->systemName,
            'bu_id' => $request->buId,
            'start_date' => $request->startDate,
            'end_date' => $request->endDate,
            'duration' => $duration,
            'request_type' => $request->requestType,
            'development_methodology' => $request->developmentMethodology,
            'system_platform' => $request->systemPlatform,
            'deployment_type' => $request->deploymentType,
            'lead_dev' => $request->projectLeader,
            'system_pic' => $bu->id,
            'approved' => false,
            'status' => "on progress",
            'system_id' => $request->requestType === 'enhancement' ? $request->systemId : '',

        ]);
        
        $newProject->developers()->attach($request->input('developers', []));
        // $newProject->save();

        $requestData->status = 'approved';
        $requestData->save();


        return response()->redirectTo('manager/projects');

    }


    public function closeProject($id)
    {

        $project = Project::where('id', $id)->first();


        if ($project->request_type == 'enhancement') {
            $system = System::where('id', $project->system_id)->first();

            if (!$system)
                abort(409, "System not found");

            $system->increment('version', 1);
            $system->save();
            
        } else {

            $newSystem = new System();

            $newSystem->name = $project->system_name;
            $newSystem->bu_id = $project->bu_id;
            $newSystem->version = 1;
            $newSystem->system_platform = $project->system_platform;
            $newSystem->deployment_type = $project->deployment_type;
            $newSystem->save();

        }

        $project->status = 'complete';
        $project->approved = true;
        $project->save();

        return response()->redirectTo('manager/projects');
    }


}
