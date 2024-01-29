<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Progress;
use App\Models\Project;
use Illuminate\Http\Request;

class DevloperController extends Controller
{
    public function index()
    {
        $user = auth()->user()->user_id;
        $developer = Developer::with(['projects', 'leadProjects'])->find($user);
        
        $projects = $developer->projects->merge($developer->leadProjects);

        return view('devloper.dashboard', ['projects'=>$projects]);
    }

    public function projectDetails($id)
    {
        $data = Project::where('id', $id)->first();
        if (!$data)
        abort(404); 

        $leadDeveloper = Developer::where('id', $data->lead_dev)->first();


        $project_progress = Progress::where('project_id', $data->id)->get();

        $data->leader_name = $leadDeveloper->name;
        // $data->developers = $developers;

        return view('devloper.projectDetails', ['project'=>$data, 'project_progress'=>$project_progress]);
    }

    public function projectProgress($id) 
    {
        $data = Project::where('id', $id)->first();
        return view('devloper.progressForm', ['project'=>$data]);

    }

    public function addProgressRequest(Request $request) 
    {

        $newProgress = new Progress();

        $newProgress->comment = $request->comment;
        $newProgress->date = $request->date;
        $newProgress->status = $request->status;
        $newProgress->project_id = $request->id;

        $newProgress->save();

        $project = Project::where('id', $request->id)->first();
        $project->status = $request->status;
        $project->save();

        return response()->redirectTo('developer/project/details/'.$request->id);


    }


}
