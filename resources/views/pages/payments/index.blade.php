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
                                <li class="breadcrumb-item" aria-current="page">Payments</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Payments List</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-alert-success />

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
                                    <input type="date" name="payment_date" id="edit_payment_date" class="form-control"
                                        max="{{ date('Y-m-d') }}" required>
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

    @push('scripts')
        {!! $dataTable->scripts() !!}
        <script>
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
                const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            }

            document.addEventListener('DOMContentLoaded', initTooltips);

            $(document).on('draw.dt', function() {
                initTooltips();
            });
        </script>
    @endpush
@endsection
