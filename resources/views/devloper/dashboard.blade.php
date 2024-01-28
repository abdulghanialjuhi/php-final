@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Projects List</h2>
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
                            <a href="{{"/developer/project/details/".$project['id']}}" class="btn btn-primary">
                                Details
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
