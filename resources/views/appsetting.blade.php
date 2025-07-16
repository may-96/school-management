@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item" aria-current="page">Application</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">
                                    App Settings
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">School Information</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('schools.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating mb-0">
                                            <input type="text" class="form-control" id="schoolName" name="name"
                                                placeholder="Enter school name"
                                                value="{{ old('name', $school->name ?? '') }}" required>
                                            <label for="schoolName">School Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating mb-0">
                                            <input type="text" class="form-control" id="description" name="description"
                                                placeholder="Enter description"
                                                value="{{ old('description', $school->description ?? '') }}">
                                            <label for="description">Description</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
