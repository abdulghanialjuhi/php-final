@extends('layouts.app')

@section('content')
    <div class="container mt-5">
    <ul class="nav nav-tabs" id="myTabs">
        <li class="nav-item">
            <a class="nav-link active" id="tab1" data-toggle="tab" href="/bu/busines-unit">Systems</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2" data-toggle="tab" href="/bu/busines-unit/requests">Requests</a>
        </li>
    </ul>

    <div class="container mt-5">
        <h2>Systems List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Version</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($systems as $system) 
                    <tr>
                        <td>{{$system['name']}}</td>
                        <td>{{$system['version']}}</td>
                        <td>{{$system['system_platform']}}</td>
                        <td>
                            <a href="{{"/bu/enhancement-request/".$system['id']}}" class="btn btn-warning">
                                Enhance
                            </a>
                        </td>
                    </tr>
                @endforeach
                        <!-- <th scope="row">Id</th>
                        <td>name</td>
                        <td>
                            
                        </td> -->
            </tbody>
        </table>

        <a href="/bu/request" class="btn btn-primary mt-3">
        Add New Record
        </a>
        </div>
    </div>

@endsection
