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

            if (checkedBoxes.length === 1) {
                const studentId = checkedBoxes.first().data('student-id');
                button.href = `/voucher/create/${studentId}`;
                button.style.visibility = "visible";
            } else if (checkedBoxes.length > 1) {
                button.href = "#"; // Optional bulk route
                button.style.visibility = "visible";
            } else {
                button.href = "#";
                button.style.visibility = "hidden";
            }
        }

        // function updateIcons() {
        //     $('.student-checkbox').each(function() {
        //         const container = $(this).closest('.pc-icon-checkbox');
        //         const checked = $(this).prop('checked');
        //         container.find('.pc-icon-check').toggle(checked);
        //         container.find('.pc-icon-uncheck').toggle(!checked);
        //     });

        //     const bulkCheckbox = $('#bulk-checkbox');
        //     const container = bulkCheckbox.closest('.pc-icon-checkbox');
        //     const checked = bulkCheckbox.prop('checked');
        //     container.find('.pc-icon-check').toggle(checked);
        //     container.find('.pc-icon-uncheck').toggle(!checked);
        // }

        // $(document).ready(function() {
        //     // When DataTable redraws (pagination, search, etc.)
        //     $('#student-table').on('draw.dt', function() {
        //         updateIcons();
        //         handleButtonState();
        //     });

        //     // Bulk checkbox click
        //     $(document).on('change', '#bulk-checkbox', function() {
        //         const isChecked = $(this).is(':checked');

        //         // Only checkboxes on current page
        //         $('#student-table tbody .student-checkbox').each(function() {
        //             $(this).prop('checked', isChecked);
        //         });

        //         updateIcons();
        //         handleButtonState();
        //     });

        //     // Individual checkbox change
        //     $(document).on('change', '.student-checkbox', function() {
        //         updateIcons();
        //         handleButtonState();
        //     });

        //     // Initial run
        //     updateIcons();
        //     handleButtonState();
        // });
    </script>

    @push('scripts')
        {!! $dataTable->scripts() !!}
    @endpush

@endsection
