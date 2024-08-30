@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit marks</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.marks.update', $marks->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Student</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-account-card-details"
                                                id="basic-addon1"></span>
                                        </div>
                                        <select class="form-control" name="student_id" id="">
                                            <option value="">Choose an Student</option>
                                            @foreach ($students as $student)
                                                <option {{ $marks->student_id == $student->id ? 'selected' : '' }}
                                                    value="{{ $student->id }}">{{ $student->username }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Jobs</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-account-card-details"
                                                id="basic-addon1"></span>
                                        </div>
                                        <select class="form-control" name="job_id" id="">
                                            <option value="">Choose a job</option>
                                            @foreach ($jobs as $job)
                                                <option {{ $marks->job_id == $job->id ? 'selected' : '' }}
                                                    value="{{ $job->id }}">{{ $job->job_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">marks Amount</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-rename-box" id="mdi-rename-box"></span>
                                        </div>
                                        <input type="number" class="form-control" name="marks_amount"
                                            value="{{ $marks->marks_amount }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">exam Starting Date</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-phone" id="basic-addon1"></span>
                                        </div>
                                        <input type="date" class="form-control" name="exam_start_date"
                                            value="{{ $marks->exam_start_date }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">marks Ending Date</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-phone" id="basic-addon1"></span>
                                        </div>
                                        <input type="date" class="form-control" name="exam_end_date"
                                            value="{{ $marks->exam_end_date }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-footer pt-5 border-top">
                                <button type="submit" class="btn btn-primary btn-pill">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
