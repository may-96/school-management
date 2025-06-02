@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">

            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/voucher') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Vouchers</a></li>
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
                    <div class="card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5 class="mb-3 mb-sm-0">Vouchers list</h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">

                                {!! $dataTable->table(['class' => 'table table-hover'], true) !!}

                                {{-- <table class="table table-hover" id="pc-dt-simple-1">
                                            <thead>
                                                <tr>
                                                    <th>Invoice Id</th>
                                                    <th>Student Name</th>
                                                    <th>Due Date</th>
                                                    <th>Amount</th>
                                                    <th>Status</th>
                                                    <th class="text-end">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($payments as $payment)
                                                    <tr>
                                                        <td>{{ $payment->invoice_id }}</td>
                                                        <td>
                                                            <div class="row align-items-center">
                                                                <div class="col-auto pe-0">
                                                                    @if ($payment->student->profile_image)
                                                                        <img src="{{ asset('storage/students/' . $payment->student->profile_image) }}"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    @else
                                                                        <img src="{{ asset('assets/images/user/avatar-1.jpg') }}"
                                                                            alt="user-image"
                                                                            class="wid-40 hei-40 rounded-circle" />
                                                                    @endif
                                                                </div>
                                                                <div class="col">
                                                                    <h6 class="mb-1">
                                                                        <span
                                                                            class="text-truncate w-100">{{ $payment->student->first_name }}
                                                                            {{ $payment->student->last_name }}</span>
                                                                    </h6>
                                                                    <p class="f-12 mb-0">
                                                                        <a href="#!" class="text-muted">
                                                                            <span
                                                                                class="text-truncate w-100">{{ $payment->student->parents_mobile }}</span>
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') }}
                                                        </td>
                                                        <td>{{ $payment->amount }} Pkr</td>
                                                        <td colspan="1">
                                                            @php
                                                                $status = strtolower($payment->status);
                                                            @endphp

                                                            @if ($status === 'paid')
                                                                <span class="badge bg-light-success">Paid</span>
                                                            @elseif ($status === 'unpaid')
                                                                <span class="badge bg-light-danger">Unpaid</span>
                                                            @elseif ($status === 'partial paid')
                                                                <span class="badge bg-light-warning">Partial Paid</span>
                                                            @else
                                                                <span class="badge bg-light-secondary">Unknown</span>
                                                            @endif
                                                        </td>
                                                        <td class="text-end">
                                                            <ul class="list-inline mb-0">
                                                                <li class="list-inline-item">
                                                                    <a data-bs-toggle="modal"
                                                                        data-bs-target="#student-add-payment_modal"
                                                                        href="#"
                                                                        class="avtar avtar-xs btn-link-secondary">
                                                                        <i class="ti ti-plus f-20"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a data-bs-toggle="modal"
                                                                        data-bs-target="#student-voucher-slip_model"
                                                                        href="#"
                                                                        class="avtar avtar-xs btn-link-secondary">
                                                                        <i class="ti ti-eye f-20"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="{{ route('voucher.edit', $payment->id) }}"
                                                                        class="avtar avtar-xs btn-link-secondary">
                                                                        <i class="ti ti-edit f-20"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <form id="delete-form-{{ $payment->id }}"
                                                                        action="{{ route('voucher.destroy', $payment->id) }}"
                                                                        method="POST" style="display: none;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                    <a href="#"
                                                                        class="avtar avtar-xs btn-link-secondary bs-pass-para"
                                                                        data-id="{{ $payment->id }}">
                                                                        <i class="ti ti-trash f-20"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
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

    {{-- student add payment model --}}

    <div class="modal fade" id="student-add-payment_modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <form id="paymentForm" action="{{ route('vouchers.payment.store') }}" method="POST">
                    @csrf
                    <div class="modal-header justify-content-between">
                        <div class="collapse multi-collapse show">
                            <h4 class="mb-0">Add Payment</h4>
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

                                    <!-- DISPLAY SECTION -->
                                    <div class="mb-3 row me-0">
                                        <label class="col-lg-4 col-form-label">INVOICE ID :</label>
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <span class="text-muted d-block" id="invoiceIdDisplay">--</span>
                                            <input type="hidden" name="invoice_id" id="invoiceIdInput">
                                            <input type="hidden" name="voucher_id" id="voucherIdInput">
                                        </div>
                                    </div>

                                    <div class="mb-3 row me-0">
                                        <label class="col-lg-4 col-form-label">REFERENCE NO :</label>
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <span class="text-muted d-block" id="referenceNumberDisplay">--</span>
                                            <input type="hidden" name="reference_number" id="referenceNumberInput">
                                        </div>
                                    </div>


                                    <!-- PAYMENT METHOD -->
                                    <div class="mb-3 row me-0">
                                        <label class="col-lg-4 col-form-label">Payment Method:
                                            <small class="text-muted d-block">Enter your Payment Method</small>
                                        </label>
                                        <div class="col-lg-8">
                                            <select class="form-select" name="payment_method" required>
                                                <option value="">Please Select</option>
                                                <option value="cheque">Cheque</option>
                                                <option value="cash">Cash</option>
                                                <option value="credit card">Credit Card</option>
                                                <option value="online transfer">Online Transfer</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- AMOUNT -->
                                    <div class="mb-3 row me-0">
                                        <label class="col-lg-4 col-form-label">Amount:
                                            <small class="text-muted d-block">Enter Amount</small>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="number" class="form-control" name="amount" required />
                                        </div>
                                    </div>

                                    <!-- PAYMENT DATE -->
                                    <div class="mb-3 row me-0">
                                        <label class="col-lg-4 col-form-label">Payment Date:
                                            <small class="text-muted d-block">Enter the Payment Date</small>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="date" class="form-control" name="payment_date" required />
                                        </div>
                                    </div>

                                    <!-- NOTES -->
                                    <div class="mb-3 row me-0">
                                        <label class="col-lg-4 col-form-label">Notes:
                                            <small class="text-muted d-block">Enter Notes</small>
                                        </label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" rows="2" name="notes" placeholder="Enter notes"></textarea>
                                        </div>
                                    </div>

                                    <!-- ACTION BUTTONS -->
                                    <div class="text-end btn-page mb-0 mt-4 me-0">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- student Payment slip model --}}
    <div class="modal fade" id="student-payment-slip_model" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <div class="collapse multi-collapse show">
                        <h5 class="mb-0">Student Payment Slip</h5>
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
                                <div class="table-responsive">
                                    <table id="payment-slip-table" class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th>Invoice Id</th>
                                                <th>Reference No</th>
                                                <th>Payment Method</th>
                                                <th>Payment Date</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody> <!-- DataTables will fill this -->
                                    </table>

                                </div>
                                <div class="text-start">
                                    <hr class="mb-2 mt-1 border-secondary border-opacity-50" />
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


    @push('scripts')
        <script>
            $(document).ready(function() {
                $(document).on('click', '.open-payment-modal', function() {
                    let invoiceId = $(this).data('invoice-id');
                    let referenceNumber = $(this).data('reference-number');
                    let voucherId = $(this).data('voucher-id');

                    // Display
                    $('#invoiceIdDisplay').text(invoiceId);
                    $('#referenceNumberDisplay').text(referenceNumber);

                    // Hidden inputs
                    $('#invoiceIdInput').val(invoiceId);
                    $('#referenceNumberInput').val(referenceNumber);
                    $('#voucherIdInput').val(voucherId);
                });
            });


            let studentId = null;
            let voucherId = null;

            $(document).on('click', '.view-payment-slip', function() {
                studentId = $(this).data('student-id');
                voucherId = $(this).data('voucher-id');
            });
            $('#student-payment-slip_model').on('hidden.bs.modal', function() {
                $('#payment-slip-table').DataTable().clear().destroy();
            });


            $('#student-payment-slip_model').on('shown.bs.modal', function() {
                $('#payment-slip-table').DataTable({
                    processing: true,
                    serverSide: true,
                    destroy: true,
                    ajax: {
                        url: "{{ route('payment.data') }}",
                        data: function(d) {
                            d.student_id = studentId;
                            d.voucher_id = voucherId;
                        }
                    },
                    columns: [{
                            data: 'invoice_id'
                        },
                        {
                            data: 'reference_number'
                        },
                        {
                            data: 'payment_method'
                        },
                        {
                            data: 'payment_date'
                        },
                        {
                            data: 'amount'
                        }
                    ]
                });
            });
        </script>
    @endpush

    @push('scripts')
        {!! $dataTable->scripts() !!}
    @endpush

    {{-- input date click event --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputs = document.querySelectorAll("input, select, textarea");

            inputs.forEach(input => {
                input.addEventListener("click", function() {
                    this.focus();

                    if (this.type === "date") {
                        this.showPicker?.();
                    }
                });
            });
        });
    </script>

@endsection
