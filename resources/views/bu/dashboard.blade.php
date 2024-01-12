@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Record List</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Record Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <th scope="row">Id</th>
                        <td>name</td>
                        <td>
                            <!-- Add actions buttons here -->
                            <!-- <button type="button" class="btn btn-warning btn-sm">Enhance</button> -->
                            <a href="/bu/enhancement-request/1235" class="btn btn-warning mt-3">
                                Enhance
                            </a>
                        </td>
                    </tr>
            </tbody>
        </table>

        <a href="/bu/request" class="btn btn-primary mt-3">
        Add New Record
        </a>

    </div>

@endsection
