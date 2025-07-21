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
                                <li class="breadcrumb-item" aria-current="page">Vouchers</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Vouchers List</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-alert-success />
            <x-alert-error />

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

                                    {{-- DISPLAY SECTION --}}
                                    <div class="mb-3 row me-0" style="display:none;">
                                        <label class="col-lg-4 col-form-label">Payment ID :</label>
                                        <div class="col-lg-8 d-flex align-items-center">
                                            <span class="text-muted d-block" id="invoiceIdDisplay">--</span>
                                            <input type="hidden" name="invoice_id" id="invoiceIdInput">
                                            <input type="hidden" name="voucher_id" id="voucherIdInput">
                                        </div>
                                    </div>


                                    {{-- PAYMENT METHOD --}}
                                    <div class="mb-3 row me-0">
                                        <label class="col-lg-4 col-form-label">Payment Method: <span
                                                class="text-danger">*</span>
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

                                    {{-- Voucher Amount Editable --}}
                                    <div class="mb-3 row me-0">
                                        <label class="col-lg-4 col-form-label">Amount: <span
                                                class="text-danger">*</span></label>
                                        <div class="col-lg-8">
                                            <input type="number" step="0.01" id="voucherAmountDisplay"
                                                class="form-control" name="amount">
                                            <input type="hidden" id="voucherAmountOriginal">
                                        </div>
                                    </div>

                                    {{-- PAYMENT DATE --}}
                                    <div class="mb-3 row me-0">
                                        <label class="col-lg-4 col-form-label">Payment Date: <span
                                                class="text-danger">*</span>
                                            <small class="text-muted d-block">Enter the Payment Date</small>
                                        </label>
                                        <div class="col-lg-8">
                                            <input type="date" class="form-control" max="{{ date('Y-m-d') }}"
                                                name="payment_date" required />
                                                @error('payment_date')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>

                                    {{-- REFERENCE NUMBER --}}
                                    <div class="mb-3 row me-0">
                                        <label class="col-lg-4 col-form-label">Refrence No :</label>
                                        <div class="col-lg-8">
                                            <input type="text" name="reference_number" id="referenceNumberInput"
                                                class="form-control" placeholder="Enter reference number">
                                        </div>
                                    </div>

                                    {{-- NOTES --}}
                                    <div class="mb-3 row me-0">
                                        <label class="col-lg-4 col-form-label">Notes:
                                            <small class="text-muted d-block">Enter Notes</small>
                                        </label>
                                        <div class="col-lg-8">
                                            <textarea class="form-control" rows="2" name="notes" placeholder="Enter notes"></textarea>
                                        </div>
                                    </div>

                                    {{-- ACTION BUTTONS --}}
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

    {{-- Student Edit Payment Modal --}}
    <div class="modal fade" id="student-edit-payment_modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <form id="edit-payment-form" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="payment_id" id="edit_payment_id">
                <div class="modal-content">
                    <div class="modal-header justify-content-between">
                        <h4 class="mb-0">Edit Payment</h4>
                        <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal" title="Close">
                            <i class="ti ti-x f-20"></i>
                        </a>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <!-- Invoice ID & Voucher ID (readonly) -->
                            <div class="mb-3 row">
                                <label class="col-lg-4 col-form-label">Payment & Voucher ID:</label>
                                <div class="col-lg-8 d-flex align-items-center justify-content-between">
                                    <span class="text-muted" id="edit_invoice_id"></span><span class="text-muted"
                                        id="edit_voucher_invoice_id"></span>
                                </div>
                            </div>

                            <!-- Payment Method -->
                            <div class="mb-3 row">
                                <label class="col-lg-4 col-form-label">Payment Method: <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <select class="form-select" name="payment_method" id="edit_payment_method" required>
                                        <option value="">Please Select</option>
                                        <option value="cash">Cash</option>
                                        <option value="cheque">Cheque</option>
                                        <option value="credit card">Credit Card</option>
                                        <option value="online transfer">Online Transfer</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Amount -->
                            <div class="mb-3 row">
                                <label class="col-lg-4 col-form-label">Amount: <span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="number" name="amount" id="edit_amount" class="form-control" readonly>
                                </div>
                            </div>

                            <!-- Payment Date -->
                            <div class="mb-3 row">
                                <label class="col-lg-4 col-form-label">Payment Date: <span
                                        class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input type="date" name="payment_date" id="edit_payment_date"
                                        class="form-control" max="{{ date('Y-m-d') }}" required>
                                    @error('payment_date')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <!-- Reference No -->
                            <div class="mb-3 row me-0">
                                <label class="col-lg-4 col-form-label">Refrence No :</label>
                                <div class="col-lg-8">
                                    <input type="text" id="edit_reference_number" name="reference_number"
                                        class="form-control" placeholder="Enter reference number">
                                </div>
                            </div>

                            <!-- Notes -->
                            <div class="mb-3 row">
                                <label class="col-lg-4 col-form-label">Notes:</label>
                                <div class="col-lg-8">
                                    <textarea name="notes" id="edit_notes" class="form-control" rows="2"></textarea>
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="text-end mt-4">
                                <button type="button" class="btn btn-outline-secondary"
                                    data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
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

    @push('scripts')
        <script>
            $(document).ready(function() {
                $(document).on('click', '.open-payment-modal', function() {
                    let invoiceId = $(this).data('invoice-id');
                    let referenceNumber = $(this).data('reference-number');
                    let voucherId = $(this).data('voucher-id');
                    let voucherAmount = parseFloat($(this).data('voucher-amount'));

                    $('#invoiceIdDisplay').text(invoiceId);
                    $('#referenceNumberDisplay').text(referenceNumber);
                    $('#invoiceIdInput').val(invoiceId);
                    $('#referenceNumberInput').val(referenceNumber);
                    $('#voucherIdInput').val(voucherId);

                    $('#voucherAmountDisplay').val(voucherAmount.toFixed(2));
                    $('#voucherAmountOriginal').val(voucherAmount.toFixed(2));
                });

                $('#voucherAmountDisplay').on('input', function() {
                    let original = parseFloat($('#voucherAmountOriginal').val());
                    let current = parseFloat($(this).val());

                    if (current > original) {
                        $(this).val(original.toFixed(2));
                    }
                });
            });

            let studentId = null;
            let voucherId = null;

            $(document).on('click', '.view-payment-slip', function() {
                studentId = $(this).data('student-id');
                voucherId = $(this).data('voucher-id');
            });

            // $('#student-payment-slip_model').on('hidden.bs.modal', function() {
            //     $('#payment-slip-table').DataTable().clear().destroy();
            // });

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
                        },
                        {
                            data: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ]
                });
            });

            $(document).on('click', '.edit-payment-btn', function(e) {
                e.preventDefault();

                const id = $(this).data('id');
                const maxAmount = parseFloat($(this).data('max-amount'));

                $('#edit_payment_id').val(id);
                $('#edit_invoice_id').text($(this).data('invoice_id'));
                $('#edit_voucher_invoice_id').text($(this).data('voucher_invoice_id'));

                $('#edit_payment_method').val($(this).data('payment_method'));
                $('#edit_amount').val($(this).data('amount')).attr('max', maxAmount);
                $('#edit_payment_date').val($(this).data('payment_date'));
                $('#edit_reference_number').val($(this).data('reference_number'));
                $('#edit_notes').val($(this).data('notes'));

                $('#edit-payment-form').attr('action', '/payments/' + id);

                $('#edit_amount').data('max-amount', maxAmount);
            });

            $('#edit_amount').on('input', function() {
                const max = parseFloat($(this).data('max-amount'));
                let val = parseFloat($(this).val());

                if (val > max) {
                    $(this).val(max);
                }
            });
        </script>

        {{-- tooltips --}}
        <script>
            function initTooltips() {
                document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function(el) {
                    if (bootstrap.Tooltip.getInstance(el)) {
                        bootstrap.Tooltip.getInstance(el).dispose();
                    }
                    new bootstrap.Tooltip(el);
                });
            }

            document.addEventListener("DOMContentLoaded", initTooltips);
            $(document).on('draw.dt', function() {
                initTooltips();
            });
        </script>
    @endpush

    @push('scripts')
        {!! $dataTable->scripts() !!}
    @endpush
@endsection
