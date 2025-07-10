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
                                <li class="breadcrumb-item" aria-current="page">Teacher</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">
                                    Teacher Edit
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-alert-error />

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Basic Information</h5>
                        </div>
                        <form method="POST" action="{{ route('teacher.update', $teacher->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" class="form-control"
                                                placeholder="Enter first name" value="{{ $teacher->first_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control"
                                                placeholder="Enter last name" value="{{ $teacher->last_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter email" value="{{ $teacher->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" name="date_of_birth" class="form-control"
                                                value="{{ $teacher->date_of_birth }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Joining Date</label>
                                            <input type="date" name="joining_date" class="form-control"
                                                value="{{ $teacher->joining_date }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="number" name="mobile_number" class="form-control"
                                                placeholder="Enter Mobile number" value="{{ $teacher->mobile_number }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Gender</label>
                                            <select name="gender" class="form-select">
                                                <option>Select</option>
                                                <option {{ $teacher->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option {{ $teacher->gender == 'Female' ? 'selected' : '' }}>Female
                                                </option>
                                                {{-- <option {{ $teacher->gender == 'Other' ? 'selected' : '' }}>Other</option> --}}
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Class</label>
                                            <select name="class" class="form-select">
                                                <option>Select</option>
                                                @foreach (['Montesori', 'K.G', 'Nursery', 'Prep', '1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th'] as $class)
                                                    <option {{ $teacher->class == $class ? 'selected' : '' }}>
                                                        {{ $class }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Department</label>
                                            <input type="text" name="department" class="form-control"
                                                value="{{ old('department', $teacher->department) }}"
                                                placeholder="Enter department">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Education</label>
                                            <input type="text" name="education" class="form-control"
                                                placeholder="Education" value="{{ $teacher->education }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Teacher Profile</label>
                                            <input type="file" name="profile_photo" class="form-control">
                                        </div>
                                    </div>
                                    @error('profile_photo')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
