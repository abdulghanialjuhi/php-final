@extends('layouts.app')

@section('content')
    <div class="container mt-5">
    <ul class="nav nav-tabs" id="myTabs">
        <li class="nav-item">
            <a class="nav-link active" id="tab1" data-toggle="tab" href="/manager/projects">Projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2" data-toggle="tab" href="/manager/dashboard">Requests</a>
        </li>
    </ul>
    <div class="container mt-5">
        <h2>Project List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Business Unit Name</th>
                    <th scope="col">System Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">View Details</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project) 
                    <tr>
                        <td>{{$project['bu_name']}}</td>
                        <td>{{$project['system_name']}}</td>
                        <td>{{$project['status']}}</td>
                        <td>
                            <a href="{{"/manager/project/details/".$project['id']}}" class="btn btn-primary">
                                Details
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
