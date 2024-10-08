@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card card-default">
                <div class="card-header">
                    <h2>Feature details</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.features.update', $feature->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Title</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-subtitles" id="mdi-account"></span>
                                        </div>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ $feature->title }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium" for="">Price</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-diamond-stone" id="mdi-account"></span>
                                        </div>
                                        <input type="number" class="form-control" name="price"
                                            value="{{ $feature->price }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Project</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi mdi-certificate" id="basic-addon1"></span>
                                        </div>
                                        <select class="form-control" name="project">
                                            <option value="">Choose a project</option>
                                            @foreach ($projects as $project)
                                                <option {{ $feature->project_id == $project->id ? ' selected' : '' }}
                                                    value="{{ $project->id }}">{{ $project->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="mb-5">
                                    <label class="text-dark font-weight-medium">Project duration</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text mdi mdi-timer" id="basic-addon1"></span>
                                        </div>
                                        <select class="form-control" name="duration">
                                            <option value="">Choose a duration</option>
                                            <option {{ $feature->deadline == '0' ? 'selected' : '' }} value="0">None
                                            </option>
                                            <option {{ $feature->deadline == '1' ? 'selected' : '' }} value="1">1 day
                                            </option>
                                            <option {{ $feature->deadline == '3' ? 'selected' : '' }} value="3">3 days
                                            </option>
                                            <option {{ $feature->deadline == '5' ? 'selected' : '' }} value="5">5 days
                                            </option>
                                            <option {{ $feature->deadline == '7' ? 'selected' : '' }} value="7">1 week
                                            </option>
                                            <option {{ $feature->deadline == '14' ? 'selected' : '' }} value="14">2
                                                weeks</option>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            })
        });
    </script>
@endsection
