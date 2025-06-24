@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/student') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Students</a></li>
                                <li class="breadcrumb-item" aria-current="page">List</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Students List</h2>
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
                                <h5 class="mb-3 mb-sm-0">Student list</h5>
                                <div>
                                    <a href="#" class="btn btn-outline-secondary d-inline-flex" id="idBtnSub"
                                        style="visibility: hidden;">
                                        <i class="ph-duotone ph-plus-circle me-1"></i>Create Fee Voucher
                                    </a>

                                    <a href="{{ route('student.create') }}" class="btn btn-primary">Add Student</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">

                                {!! $dataTable->table(['class' => 'table table-hover'], true) !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- JS for Button Visibility --}}
    <script>
        function handleButtonState() {
            const button = document.getElementById("idBtnSub");
            const checkedBoxes = $('.student-checkbox:checked');
            const selectedStudentIds = checkedBoxes.map(function() {
                return $(this).data('student-id');
            }).get();

            localStorage.setItem('selectedStudentIds', JSON.stringify(selectedStudentIds));

            if (selectedStudentIds.length === 1) {
                button.href = `/students/voucher/create/${selectedStudentIds[0]}`;
                button.style.visibility = "visible";
            } else if (selectedStudentIds.length > 1) {
                button.href = `/students/voucher/create`;
                button.style.visibility = "visible";
            } else {
                button.href = "#";
                button.style.visibility = "hidden";
            }
        }
    </script>

    @push('scripts')
        {!! $dataTable->scripts() !!}

        <script>
            $('#student-table').on('draw.dt', function() {
                bindCheckboxEvents();
            });

            function bindCheckboxEvents() {
                $('#bulk-checkbox').off('change').on('change', function() {
                    const isChecked = $(this).is(':checked');
                    $('.student-checkbox').prop('checked', isChecked);
                    handleButtonState();
                });

                $('.student-checkbox').off('change').on('change', function() {
                    handleButtonState();

                    const all = $('.student-checkbox').length;
                    const checked = $('.student-checkbox:checked').length;
                    $('#bulk-checkbox').prop('checked', all === checked);
                });
            }

            $(document).ready(function() {
                bindCheckboxEvents();
            });
        </script>
    @endpush

@endsection
