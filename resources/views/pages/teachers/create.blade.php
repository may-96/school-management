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
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Teacher</a></li>
                                <li class="breadcrumb-item" aria-current="page">Create</li>
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

            <x-alert-error />

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
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="first_name" class="form-control"
                                                placeholder="Enter first name" required />
                                        </div>
                                    </div>

                                    {{-- Last Name --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="last_name" class="form-control"
                                                placeholder="Enter last name" required />
                                        </div>
                                    </div>

                                    {{-- Email --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter email" required />
                                        </div>
                                    </div>

                                    {{-- Date of Birth --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Date of Birth</label>
                                            <input type="date" name="date_of_birth" class="form-control" />
                                        </div>
                                    </div>

                                    {{-- Joining Date --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Joining Date</label>
                                            <input type="date" name="joining_date" class="form-control" />
                                        </div>
                                    </div>

                                    {{-- Mobile Number --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="number" name="mobile_number" class="form-control"
                                                placeholder="Enter Mobile number" />
                                        </div>
                                    </div>

                                    {{-- Gender --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Gender</label>
                                            <select name="gender" class="form-select">
                                                <option>Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Class --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Class</label>
                                            <select name="class" class="form-select">
                                                <option>Select</option>
                                                <option>Montesori</option>
                                                <option>K.G</option>
                                                <option>Nursery</option>
                                                <option>Prep</option>
                                                <option>1st</option>
                                                <option>2nd</option>
                                                <option>3rd</option>
                                                <option>4th</option>
                                                <option>5th</option>
                                                <option>6th</option>
                                                <option>7th</option>
                                                <option>8th</option>
                                                <option>9th</option>
                                                <option>10th</option>
                                                <option>11th</option>
                                                <option>12th</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Department --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Department</label>
                                            <select name="department" class="form-select">
                                                <option>Developer</option>
                                                <option>Javascript Developer</option>
                                                <option>Frontend Developer</option>
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Education --}}
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Education</label>
                                            <input type="text" name="education" class="form-control"
                                                placeholder="Education" />
                                        </div>
                                    </div>

                                    {{-- Teacher Profile (file) --}}
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Teacher Profile</label>
                                            <input class="form-control" type="file" name="profile_photo" />
                                        </div>
                                    </div>

                                    {{-- Submit --}}
                                    <div class="col-md-12 text-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @error('profile_image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
