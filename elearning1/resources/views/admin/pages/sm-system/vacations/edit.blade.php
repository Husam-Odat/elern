@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Edit Vacation</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.vacations.update', $vacation->id) }}" method="POST">
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
                                            <option value="">Choose an student</option>
                                            @foreach ($students as $student)
                                                <option {{ $vacation->student_id == $student->id ? 'selected' : '' }}
                                                    value="{{ $student->id }}">{{ $student->username }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Vacation type</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-rename-box" id="mdi-rename-box"></span>
                                        </div>
                                        <input type="text" class="form-control" name="vacation_type"
                                            value="{{ $vacation->vacation_type }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Vacation Starting Date</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-phone" id="basic-addon1"></span>
                                        </div>
                                        <input type="date" class="form-control" name="start_date"
                                            value="{{ $vacation->start_date }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Vacation Ending Date</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-phone" id="basic-addon1"></span>
                                        </div>
                                        <input type="date" class="form-control" name="end_date"
                                            value="{{ $vacation->end_date }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Vacation Status</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-account-card-details"
                                                id="basic-addon1"></span>
                                        </div>
                                        <select class="form-control" name="status">
                                            <option value="">Choose a Status</option>
                                            <option {{ $vacation->status == 'pending' ? 'selected' : '' }} value="pending">
                                                Pending</option>
                                            <option {{ $vacation->status == 'approved' ? 'selected' : '' }}
                                                value="approved">Approved</option>
                                            <option {{ $vacation->status == 'denied' ? 'selected' : '' }} value="denied">
                                                Denied</option>
                                        </select>
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
