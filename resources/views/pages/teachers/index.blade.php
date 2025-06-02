@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/teacher') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Teachers</a></li>
                                <li class="breadcrumb-item" aria-current="page">List</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Teachers List</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Success Alert --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <script>
                    setTimeout(function() {
                        let alert = document.getElementById('success-alert');
                        if (alert) {
                            let bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                            bsAlert.close();
                        }
                    }, 3000);
                </script>

                @php
                    session()->forget('success');
                @endphp
            @endif

            {{-- Error Alert --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5 class="mb-3 mb-sm-0">Teacher list</h5>
                                <div>
                                    <a href="{{ route('teacher.create') }}" class="btn btn-primary">Add Teacher</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">

                                {{-- Yajra DataTable --}}

                                {!! $dataTable->table(['class' => 'table table-hover'], true) !!}

                                {{-- <table class="table table-hover" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Departments / Class</th>
                                            <th>Education</th>
                                            <th>Mobile</th>
                                            <th>Joining Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($teachers as $teacher)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <a href="{{ route('teacher.show', $teacher->id) }}">
                                                                @if ($teacher->profile_image)
                                                                    <img src="{{ asset('storage/teachers/' . $teacher->profile_image) }}"
                                                                        alt="img" class="img-fluid rounded-circle"
                                                                        style="height:40px; width:40px;" />
                                                                @else
                                                                    <img src="{{ asset('assets/images/user/avatar-1.jpg') }}"
                                                                        alt="img" class="img-fluid rounded-circle"
                                                                        style="height:40px; width:40px;" />
                                                                @endif
                                                            </a>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0">{{ $teacher->first_name }}
                                                                {{ $teacher->last_name }}</h6>
                                                            <small
                                                                class="text-truncate w-100 text-muted">{{ $teacher->email }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-0">{{ $teacher->department }}</h6>
                                                        <small
                                                            class="text-truncate w-100 text-muted">{{ $teacher->class }}</small>
                                                    </div>
                                                </td>
                                                <td>{{ $teacher->education }}</td>
                                                <td>{{ $teacher->mobile_number }}</td>
                                                <td>{{ $teacher->joining_date }}</td>
                                                <td>
                                                    <a href="{{ route('teacher.show', $teacher->id) }}"
                                                        class="avtar avtar-xs btn-link-secondary">
                                                        <i class="ti ti-eye f-20"></i>
                                                    </a>
                                                    <a href="{{ route('teacher.edit', $teacher->id) }}"
                                                        class="avtar avtar-xs btn-link-secondary">
                                                        <i class="ti ti-edit f-20"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $teacher->id }}"
                                                        action="{{ route('teacher.destroy', $teacher->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"
                                                        data-id="{{ $teacher->id }}">
                                                        <i class="ti ti-trash f-20"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table> --}}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script type="module">
        import {
            DataTable
        } from '../assets/js/plugins/module.js';
        window.dt = new DataTable('#pc-dt-simple');
    </script> --}}

    @push('scripts')
        {!! $dataTable->scripts() !!}
    @endpush

@endsection
