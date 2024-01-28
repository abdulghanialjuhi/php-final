@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body d-flex">
                <div class="card-body p-0" style="width: 35%;">
                    <h5 class="card-title">{{$project['system_name']}}</h5>

                    <div class="card-text w-100 mb-4 mt-4">
                        <div class="row mb-1">
                            <div class="col-md-6 text-start">Business Unit Name:</div>
                            <div class="col-md-6 fw-bolder text-start">{{$project['bu_name']}}</div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-6 text-start">status:</div>
                            <div class="col-md-6 fw-bolder text-start">{{$project['status']}}</div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-6 text-start">Project Leader:</div>
                            <div class="col-md-6 fw-bolder text-start">{{$project['leader_name']}}</div>
                        </div>

                        <div class="my-3">
                            <div class="col-md-6 text-start">Project Devlopers:</div>
                            @foreach($project->developers as $developer) 
                                <div style="padding: 3px 10px; border-radius: 5px; background-color: #e5e5e5;" class="col-md-3 my-1 fw-bolder text-start">{{$developer['name']}}</div>
                            @endforeach
                        </div>

                        <div class="row mb-1">
                            <div class="col-md-6 text-start">Start Date:</div>
                            <div class="col-md-6 fw-bolder text-start">{{$project['start_date']}}</div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-6 text-start">End Date:</div>
                            <div class="col-md-6 fw-bolder text-start">{{$project['end_date']}}</div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-6 text-start">Duration:</div>
                            <div class="col-md-6 fw-bolder text-start">{{$project['duration']}}</div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-6 text-start">Request Type:</div>
                            <div class="col-md-6 fw-bolder text-start">{{$project['request_type']}} System</div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-6 text-start">Development Methodology:</div>
                            <div class="col-md-6 fw-bolder text-start">{{$project['development_methodology']}} System</div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-6 text-start">System Platform:</div>
                            <div class="col-md-6 fw-bolder text-start">{{$project['system_platform']}} System</div>
                        </div>
                        <div class="row mb-1">
                            <div class="col-md-6 text-start">Deployment Type:</div>
                            <div class="col-md-6 fw-bolder text-start">{{$project['deployment_type']}} System</div>
                        </div>
                    </div>
                    <a href="/developer/dashboard" class="btn btn-primary">Go back</a>
                    @if(Auth::user() && Auth::user()->user_id === $project['lead_dev'])
                        <a href="{{"/developer/add-progress/".$project['id']}}" class="btn btn-primary">Add Progress</a>
                    @endif

                </div>

                
                <div class="card-body p-0" style="width: 65%;">
                    <h5 class="card-title text-center">Project Progress</h5>

                    <div class="w-75 mx-auto mt-3" style="max-height: 400px; overflow: scroll;">
                        @if(count($project_progress) > 0)
                            @foreach($project_progress as $progress)
                                <div class="card p-2 my-2 bg-white">
                                    <div class="row my-2">
                                        <div class="col-md-6 text-start">Date:</div>
                                        <div class="col-md-6 fw-bolder text-start">{{$progress['date']}}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-6 text-start">Comment:</div>
                                        <div class="col-md-6 fw-bolder text-start">{{$progress['comment']}}</div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-6 text-start">Status:</div>
                                        <div class="col-md-6 fw-bolder text-start">{{$progress['status']}}</div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center">
                                <span class="text-center text-muted">No Progress Yet</span>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
