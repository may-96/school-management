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
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Student</a></li>
                                <li class="breadcrumb-item" aria-current="page">Create</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">
                                    Student Add
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
                        <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control"
                                            placeholder="Enter first name" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control"
                                            placeholder="Enter last name" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Registration Date</label>
                                        <input type="date" name="registration_date" class="form-control" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Admission No</label>
                                        <input type="number" name="admission_no" class="form-control"
                                            placeholder="Enter ID number" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Roll No</label>
                                        <input type="number" name="roll_no" class="form-control"
                                            placeholder="Enter roll no" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Class</label>
                                        <select name="class" class="form-select">
                                            <option>Select</option>
                                            <option>K.G</option>
                                            <option>Montesori</option>
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
                                            <option>1st Year</option>
                                            <option>2nd Year</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Section</label>
                                        <input type="text" name="section" class="form-control"
                                            placeholder="Enter Section" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Gender</label>
                                        <select name="gender" class="form-select">
                                            <option>Select</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Status</label>
                                        <select name="status" class="form-select">
                                            <option>Select</option>
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Parents Name</label>
                                        <input type="text" name="parents_name" class="form-control"
                                            placeholder="Enter parents name" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Parents Mobile Number</label>
                                        <input type="number" name="parents_mobile" class="form-control"
                                            placeholder="Enter parents mobile number" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Secondary Mobile Number</label>
                                        <input type="text" name="secondary_mobile" class="form-control"
                                            placeholder="Enter Secondary Mobile Number" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Student Profile</label>
                                        <input type="file" name="profile_photo" class="form-control" />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label class="form-label">Address</label>
                                        <textarea name="address" class="form-control" rows="2" placeholder="Enter address"></textarea>
                                    </div>
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
