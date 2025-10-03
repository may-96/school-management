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

            <x-alerts />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">School Information</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('schools.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating mb-0">
                                            <input type="text" class="form-control" id="schoolName" name="name"
                                                placeholder="Enter school name"
                                                value="{{ old('name', $school->name ?? '') }}" required>
                                            @error('name')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <label for="schoolName">School Name <span class="text-danger">*</span></label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-floating mb-0">
                                            <input type="text" class="form-control" id="description" name="description"
                                                placeholder="Enter description"
                                                value="{{ old('description', $school->description ?? '') }}">
                                            @error('description')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <label for="description">Description</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">School Logo</label>
                                        <input type="file" class="form-control" id="logo" name="logo">
                                    </div>

                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary">
                                            @if (isset($school))
                                                Update
                                            @else
                                                Save
                                            @endif
                                        </button>
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
