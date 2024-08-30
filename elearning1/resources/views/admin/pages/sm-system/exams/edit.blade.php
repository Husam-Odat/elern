@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Add Departments</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.exams.update', $exam->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Exam Title</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-account" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="exam_title"
                                            value="{{ $exam->exam_title }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Exam Salary</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-rename-box" id="mdi-rename-box"></span>
                                        </div>
                                        <input type="number" class="form-control" name="salary"
                                            value="{{ $exam->salary }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Exam Description</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-format-list-bulleted-type"
                                                id="basic-addon1"></span>
                                        </div>
                                        <textarea rows="5" class="form-control" name="exam_desc">{{ $exam->exam_desc }}</textarea>
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
