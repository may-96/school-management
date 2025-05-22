@extends('layouts.master')

@section('content')
    <!-- [ Main Content ] start -->
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/payments/index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Payment</a></li>
                                <li class="breadcrumb-item" aria-current="page">List</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">List</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
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
                    // Clear the session manually after showing it once
                    session()->forget('success');
                @endphp
            @endif

            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5 class="mb-3 mb-sm-0">Payments list</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="analytics-tab-1-pane" role="tabpanel"
                                    aria-labelledby="analytics-tab-1" tabindex="0">
                                    <div class="table-responsive">


                                        {!! $dataTable->table(['class' => 'table table-hover', 'id' => 'payments-table']) !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- [ Main Content ] end -->

    {{-- student edit fees model  --}}

    <div class="modal fade" id="student-edit-payment_modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h4 class="mb-0">Edit Payment</h4>
                    </div>
                    <div class="d-flex align-items-center justify-content-end">
                        <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal" title="Close">
                            <i class="ti ti-x f-20"></i>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="collapse multi-collapse show">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">INVOICE ID : </label>
                                    <div class="col-lg-8 d-flex align-items-center">
                                        <span class="text-muted d-block">8943769870</span>
                                    </div>
                                </div>

                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Payment
                                        Method : <small class="text-muted d-block">Enter
                                            your Payment Method</small></label>
                                    <div class="col-lg-8">
                                        <select class="form-select" id="exampleFormControlSelect1">
                                            <option>Please Select</option>
                                            <option>cheque</option>
                                            <option>cash</option>
                                            <option>credit card</option>
                                            <option>online transfer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label"> Amount
                                        :<small class="text-muted d-block">Enter
                                            Amount</small></label>
                                    <div class="col-lg-8">
                                        <input type="number" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Payment
                                        Date:<small class="text-muted d-block">Enter the
                                            Payment Date</small></label>
                                    <div class="col-lg-8">
                                        <input type="date" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label"> Refrence No
                                        :<small class="text-muted d-block">Enter
                                            Refrence No</small></label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                <div class="mb-3 row me-0">
                                    <label class="col-lg-4 col-form-label">Notes
                                        :<small class="text-muted d-block">Enter
                                            Notes</small></label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" rows="2" placeholder="Enter address"></textarea>
                                    </div>
                                </div>
                                <div class="text-end btn-page mb-0 mt-4 me-0">
                                    <button class="btn btn-outline-secondary" type="button" data-bs-dismiss="modal"
                                        data-bs-toggle="tooltip">Cancel</button>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
                                </div>
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
        window.dt = new DataTable('#pc-dt-simple-1');
        window.dt = new DataTable('#pc-dt-simple-2');
        window.dt = new DataTable('#pc-dt-simple-3');
        window.dt = new DataTable('#pc-dt-simple-4');
    </script> --}}
@endsection
@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
