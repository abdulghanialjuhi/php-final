@extends('layouts.app')

@section('content')
    <div class="container mt-5">
    <ul class="nav nav-tabs" id="myTabs">
        <li class="nav-item">
            <a class="nav-link " id="tab1" data-toggle="tab" href="/bu/busines-unit">Systems</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" id="tab2" data-toggle="tab" href="/bu/busines-unit/requests">Requests</a>
        </li>
    </ul>
    <div class="container mt-5">
        <h2>Request List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">System Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Type</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $request) 
                    <tr>
                        <td>{{$request['system_name']}}</td>
                        <td>{{$request['status']}}</td>
                        <td>{{$request['type']}}</td>
                        <td>
                            <a href="{{"/bu/delete-request/".$request['id']}}" class="btn @if($request['status'] == 'approved') disabled @endif btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
    </div>
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
@endsection
