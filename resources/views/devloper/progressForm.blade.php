@extends('layouts.app')

@section('content')
    <div class="container w-50">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Project Progress</h5>
                </div>
                <div class="modal-body mt-3">
                    <!-- Form for adding a new record -->
                    <form action="/developer/add-progress-request" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="comment">Comment</label>
                            <textarea name="comment" cols="30" class="form-control" rows="5">

                            </textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date">
                        </div>

                        <div class="form-group mb-3">
                            <label for="status">Status </label>
                            <select required value='ahead of schedule' class="form-control" name="status">
                                <option value="ahead of schedule">
                                    Ahead of Schedule
                                </option>
                                <option value="on schedule">
                                    on Schedule
                                </option>
                                <option value="delayed">
                                    Delayed
                                </option>
                                <option value="completed">
                                    Completed
                                </option>
                            </select>
                        </div>
                        <?php echo $project->id ? '<input type="hidden" name="id" value="' . $project->id . '" />' : 'none'; ?>

                        <button type="submit" class="btn btn-primary">Add Progress</button>
                    </form>
                </div>
            </div>
    </div>
@endsection
