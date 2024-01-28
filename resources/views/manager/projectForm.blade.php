@extends('layouts.app')

@section('content')
    <div class="container w-50">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Project</h5>
                </div>
                <div class="modal-body mt-3">
                    <!-- Form for adding a new record -->
                    <form  action="/manager/create-project-request" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="systemName">Business Name</label>
                            <input required  value="{{$request->name}}" type="text" class="form-control" placeholder="Enter System Name" disabled>
                             <?php echo $request->id ? '<input type="hidden" name="buId" value="' . $request->id . '" />' : 'none'; ?>
                             <?php echo $request->name ? '<input type="hidden" name="buName" value="' . $request->name . '" />' : 'none'; ?>

                        </div>
                        <div class="form-group mb-3">
                            <label for="systemDescription">System Name</label>
                            <input required type="text" class="form-control" name="systemName" 
                            value="@if($request->type == 'enhancement') {{$request->system_name}} @endif">
                        </div>
                        <div class="form-group mb-3">
                            <label for="systemDescription">Start Date</label>
                            <input required type="date" class="form-control" name="startDate">
                        </div>
                        <div class="form-group mb-3">
                            <label for="systemDescription">End Date</label>
                            <input required type="date" class="form-control" name="endDate">
                        </div>

                        <div class="form-group mb-3">
                            <label for="requestStatus">Development Methodology </label>
                            <select required value='agile' class="form-control" name="developmentMethodology">
                                    <option value="agile">
                                        Agile
                                    </option>
                                    <option value="waterfall">
                                        Waterfall
                                    </option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="requestStatus">System Platform </label>
                            <select required value='web-based' class="form-control" name="systemPlatform">
                                    <option value="web-based">
                                        web based
                                    </option>
                                    <option value="mobile">
                                        mobile
                                    </option>
                                    <option value="stand-alone">
                                        stand-alone
                                    </option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="requestStatus">Deployment Type </label>
                            <select required value='cloud' class="form-control" name="deploymentType">
                                <option value="cloud">
                                    cloud
                                </option>
                                <option value="on-premises">
                                    on-premises
                                </option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="systemDescription">Project Leader</label>
                            <select required class="form-control" name="projectLeader">
                                @foreach($developers as $developer) 
                                    <option value="{{$developer->id}}">
                                        {{$developer->name}}
                                    </option>
                                    @endforeach
                            </select>
                        </div>
    
                        <div class="form-group mb-3">
                            <label for="developers">Project Developers</label>
                            <div class="form-group mb-3">

                                @foreach($developers as $developer) 
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="developers[]" value="{{$developer->id}}">
                                    <label class="form-check-label" for="inlineCheckbox2">{{$developer->name}}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <?php echo $request->id ? '<input type="hidden" name="requestId" value="' . $request->id . '" />' : 'none'; ?>

                        <?php echo $request->id ? '<input type="hidden" name="requestType" value="' . $request->type . '" />' : 'none'; ?>
                        <?php echo $request->id ? '<input type="hidden" name="systemId" value="' . $request->system_id . '" />' : 'none'; ?>

                        <button type="submit" class="btn btn-primary">Create Project</button>
                    </form>
                </div>
            </div>
    </div>
@endsection
