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
                                <li class="breadcrumb-item"><a href="{{ url('/employees') }}">Employees</a></li>
                                <li class="breadcrumb-item" aria-current="page">{{ $employee->first_name }}
                                    {{ $employee->last_name }}</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">{{ $employee->first_name }} {{ $employee->last_name }}</h2>
                                <p class="mb-1 text-muted">Employee Profile</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-alerts />
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body py-0">
                            <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="profile-tab-1" data-bs-toggle="tab" href="#profile-1"
                                        role="tab" aria-selected="true">
                                        <i class="ti ti-user me-2"></i>Profile
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">

                        <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                            <div class="row">
                                <div class="col-lg-8 col-xxl-12">

                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Personal Details</h5>
                                        </div>

                                        <div class="card-body">
                                            <div class="col-sm-12 text-start mb-3">
                                                <div class="user-upload wid-75">
                                                    @if ($employee->employee_profile)
                                                        <img src="{{ asset('storage/' . $employee->employee_profile) }}"
                                                            alt="img" class="img-fluid" />
                                                    @else
                                                        <img src="{{ asset('assets/images/user/avatar-7.jpg') }}"
                                                            alt="img" class="img-fluid" />
                                                    @endif
                                                </div>
                                            </div>

                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item px-0 pt-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">First Name</p>
                                                            <p class="mb-0">{{ $employee->first_name }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Last Name</p>
                                                            <p class="mb-0">{{ $employee->last_name }}</p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Joining Date</p>
                                                            <p class="mb-0">
                                                                {{ $employee->joining_date ?? 'Not Available' }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Date of Birth</p>
                                                            <p class="mb-0">
                                                                {{ $employee->date_of_birth ?? 'Not Available' }}</p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Email</p>
                                                            <p class="mb-0">{{ $employee->email ?? 'N/A' }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Gender</p>
                                                            <p class="mb-0">{{ $employee->gender ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Department</p>
                                                            <p class="mb-0">
                                                                {{ $employee->department ?? 'Not Available' }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Mobile</p>
                                                            <p class="mb-0">
                                                                {{ $employee->mobile_no ?? 'Not Available' }}</p>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="list-group-item px-0">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Monthly Salary</p>
                                                            <p class="mb-0">{{ $employee->monthly_salary ?? 'Not Available' }}</p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <p class="mb-1 text-muted">Address</p>
                                                            <p class="mb-0">{{ $employee->address ?? 'N/A' }}</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
