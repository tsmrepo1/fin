@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Instructor Information Form') }}</div>

                <div class="card-body">
                    <form action="{{route('beainstructor')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="designation">Designation:</label>
                            <input type="text" class="form-control" id="designation" name="designation" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="current_working">Current Working:</label>
                            <input type="text" class="form-control" id="current_working" name="current_working" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="last_qualification">Last Qualification:</label>
                            <input type="text" class="form-control" id="last_qualification" name="last_qualification" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="specialization">Specialization:</label>
                            <input type="text" class="form-control" id="specialization" name="specialization" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="teaching_experience">Experience in Teaching (in years):</label>
                            <input type="number" class="form-control" id="teaching_experience" name="teaching_experience" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="file_upload">Last Qualification Certificate (PDF only):</label>
                            <input type="file" class="form-control-file" id="file_upload" name="file_upload" accept=".pdf" required>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

