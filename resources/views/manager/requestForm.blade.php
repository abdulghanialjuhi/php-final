@extends('layouts.app')

@section('content')
    <div class="container w-50">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Request</h5>
                </div>
                <div class="modal-body mt-3">
                    <!-- Form for adding a new record -->
                    <form  action="/create-request" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="systemName">System Name</label>
                            <input type="text" class="form-control" name="systemName" placeholder="Enter System Name">
                        </div>
                        <div class="form-group mb-3">
                            <label for="systemDescription">System Description</label>
                            <input type="text" class="form-control" name="systemDescription" placeholder="Enter System Description">
                        </div>
                        <input type="hidden" name="enhance" value = "something" />

                        <button type="submit" class="btn btn-primary">Create Request</button>
                    </form>
                </div>
            </div>
    </div>
@endsection
