@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif
                        
                    @if(Auth::user())
                        {{ __('You are logged in!') }}
                    @endif

                </div>

                @if(Auth::user() && Auth::user()->role === 'bu')
                    <a class="btn btn-primary m-2" href="{{ url('bu/busines-unit') }}">
                        Dashboard
                    </a>
                @elseif(Auth::user() && Auth::user()->role === 'manager')
                    <a class="btn btn-primary m-2" href="{{ url('manager/dashboard') }}">
                        Dashboard
                    </a>
                @elseif(Auth::user() && Auth::user()->role === 'developer')
                    <a class="btn btn-primary m-2" href="{{ url('developer/dashboard') }}">
                        Dashboard
                    </a>
                @else
                    <a class="btn btn-primary m-2" href="{{ url('/') }}">
                        Dashboard
                    </a>
                @endif


            </div>
        </div>
    </div>
</div>
@endsection
