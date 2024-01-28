@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="card p-3">
            <label for=""> Error message: </label>
            <h5> {{ $exception->getMessage() }} </h5>
        </div>
    </div>
@endsection