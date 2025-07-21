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
                                    Teacher Add
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
                            <h5 class="mb-0">Basic Information</h5>
                        </div>
                        <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    {{-- First Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">First Name <span class="text-danger">*</span></label>
                                        <input type="text" name="first_name" class="form-control"
                                            value="{{ old('first_name') }}" placeholder="Enter first name" />
                                        @error('first_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Last Name --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Last Name <span class="text-danger">*</span></label>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ old('last_name') }}" placeholder="Enter last name" />
                                        @error('last_name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Gender --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender <span class="text-danger">*</span></label>
                                        <select name="gender" class="form-select">
                                            <option value="">Select</option>
                                            @foreach (['Male', 'Female', 'Other'] as $gender)
                                                <option value="{{ $gender }}"
                                                    {{ old('gender') == $gender ? 'selected' : '' }}>{{ $gender }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('gender')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Mobile Number --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                        <input type="text" name="mobile_number" class="form-control"
                                            value="{{ old('mobile_number') }}" placeholder="Enter Mobile number" />
                                        @error('mobile_number')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>



                                    {{-- Date of Birth --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Date of Birth <span class="text-danger">*</span></label>
                                        <input type="date" name="date_of_birth" class="form-control" max="{{ date('Y-m-d') }}"
                                            value="{{ old('date_of_birth') }}" />
                                        @error('date_of_birth')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Joining Date --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Joining Date <span class="text-danger">*</span></label>
                                        <input type="date" name="joining_date" class="form-control" max="{{ date('Y-m-d') }}"
                                            value="{{ old('joining_date') }}" />
                                        @error('joining_date')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    {{-- Email --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}" placeholder="Enter email" />
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    {{-- Class --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Class</label>
                                        <select name="class" class="form-select">
                                            <option value="">Select</option>
                                            @foreach (['Montesori', 'K.G', 'Nursery', 'Prep', '1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th', '11th', '12th'] as $class)
                                                <option value="{{ $class }}"
                                                    {{ old('class') == $class ? 'selected' : '' }}>{{ $class }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Department --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Department</label>
                                        <input type="text" name="department" class="form-control"
                                            value="{{ old('department') }}" placeholder="Enter department">
                                        @error('department')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Education --}}
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Education</label>
                                        <input type="text" name="education" class="form-control"
                                            value="{{ old('education') }}" placeholder="Education" />
                                        @error('education')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Teacher Profile --}}
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Teacher Profile</label>
                                        <input class="form-control" type="file" name="profile_photo" />
                                    </div>

                                    {{-- Submit --}}
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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
