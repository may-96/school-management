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
                                <li class="breadcrumb-item" aria-current="page">Payrolls</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Payrolls List</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

           <x-alerts />

            <div class="row">
                <div class="col-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h5 class="mb-3 mb-sm-0">Payroll list</h5>
                                <div>

                                    <!-- Bulk Remove Payments Button -->
                                    <button type="button" id="bulk-remove-btn"
                                        class="btn btn-outline-danger d-inline-flex align-items-center me-2"
                                        data-bs-toggle="modal" data-bs-target="#bulk-remove-payroll-modal" disabled>
                                        <i class="ph-duotone ph-minus-circle me-1"></i>
                                        Remove Payment
                                    </button>

                                    <button type="button" id="bulk-pay-btn"
                                        class="btn btn-outline-secondary d-inline-flex align-items-center me-2"
                                        data-bs-toggle="modal" data-bs-target="#bulk-payroll-modal" disabled>
                                        <i class="ph-duotone ph-plus-circle me-1"></i>
                                        Add Payment
                                    </button>

                                    @if ($eligibleStaffCount > 0)
                                        <a href="{{ route('payrolls.create') }}"
                                            class="btn btn-light-success d-inline-flex align-items-center">
                                            {{ $alreadyRun ? 'Run Payroll Register' : 'Run Payroll Register' }}
                                        </a>
                                    @else
                                        <a href="#"
                                            class="btn btn-outline-secondary d-inline-flex align-items-center disabled">
                                            Payroll already generated for {{ now()->format('F Y') }}.
                                        </a>
                                    @endif

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

    {{-- Add payroll modal --}}
    <div class="modal fade" id="add-payroll-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h4 class="mb-0">Payroll Payment</h4>
                    <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal">
                        <i class="ti ti-x f-20"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('payments_details.store') }}" method="POST" id="payroll-payment-form">
                        @csrf
                        <input type="hidden" name="payroll_id" id="modal-payroll-id">

                        <div class="mb-3">
                            <label class="form-label">Payment Method <span class="text-danger">*</span></label>
                            <select name="payment_method" class="form-control" required>
                                <option value="">Select</option>
                                <option value="cash">Cash</option>
                                <option value="cheque">Cheque</option>
                                <option value="bank-transfer">Bank Transfer</option>
                            </select>
                            @error('payment_method')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Payment Date <span class="text-danger">*</span></label>
                            <input type="date" name="payment_date" class="form-control" max="{{ date('Y-m-d') }}">
                            @error('payment_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Transaction ID</label>
                            <input type="text" name="transaction_id" class="form-control"
                                placeholder="Enter transaction ID">
                            @error('transaction_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary">Add Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Bulk Payroll Payment Modal  --}}
    <div class="modal fade" id="bulk-payroll-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h4 class="mb-0">Payroll Payment</h4>
                    <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal">
                        <i class="ti ti-x f-20"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('payrolls.bulkPayment') }}" method="POST" id="bulk-payroll-form">
                        @csrf
                        <!-- hidden field for multiple payroll IDs -->
                        <input type="hidden" name="payroll_ids" id="bulk-payroll-ids">

                        <div class="mb-3">
                            <label class="form-label">Payment Method <span class="text-danger">*</span></label>
                            <select name="payment_method" class="form-control" required>
                                <option value="">Select</option>
                                <option value="cash">Cash</option>
                                <option value="cheque">Cheque</option>
                                <option value="bank-transfer">Bank Transfer</option>
                            </select>
                            @error('payment_method')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Payment Date <span class="text-danger">*</span></label>
                            <input type="date" name="payment_date" class="form-control" max="{{ date('Y-m-d') }}"
                                required>
                            @error('payment_date')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Transaction ID</label>
                            <input type="text" name="transaction_id" class="form-control"
                                placeholder="Enter transaction ID">
                            @error('transaction_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="text-end">
                            <button class="btn btn-primary">Add Payment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bulk Remove Payments Modal -->
    <div class="modal fade" id="bulk-remove-payroll-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header justify-content-between">
                    <h4 class="mb-0">Remove Payroll Payments</h4>
                    <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal">
                        <i class="ti ti-x f-20"></i>
                    </a>
                </div>
                <div class="modal-body">
                    <form action="{{ route('payrolls.bulkRemovePayment') }}" method="POST"
                        id="bulk-remove-payroll-form">
                        @csrf
                        <input type="hidden" name="payroll_ids" id="bulk-remove-payroll-ids">

                        <p>Are you sure you want to remove payments for selected payrolls?</p>

                        <div class="text-end">
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-danger">Yes, Remove</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Confirmation Modal  --}}
    <div class="modal fade" id="deletePaymentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Remove Payrolls Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove this payment?</p>
                </div>
                <div class="modal-footer">
                    <form id="deletePaymentForm" method="POST" action="{{ route('payrolls.togglePayment') }}">
                        @csrf
                        <input type="hidden" name="payroll_id" id="deletePayrollId">

                        <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Yes, Remove</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        {!! $dataTable->scripts() !!}
        {{-- tooltips --}}
        <script>
            function initTooltips() {
                const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-hover="tooltip"]'));
                tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            }

            document.addEventListener('DOMContentLoaded', initTooltips);

            $(document).on('draw.dt', function() {
                initTooltips();
            });
        </script>

        <script>
            // When the modal is opened via any Action button, inject that row's ID
            document.getElementById('add-payroll-modal').addEventListener('show.bs.modal', function(event) {
                const trigger = event.relatedTarget;
                if (!trigger) return;
                const payrollId = trigger.getAttribute('data-id');
                this.querySelector('#modal-payroll-id').value = payrollId;
            });
        </script>

        {{-- Bulk select checkboxes --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const bulkBtn = document.getElementById("bulk-pay-btn");
                const bulkInput = document.getElementById("bulk-payroll-ids");

                document.addEventListener("change", function(e) {
                    if (e.target.classList.contains("bulk-checkbox")) {
                        const selected = [...document.querySelectorAll(".bulk-checkbox:checked")].map(cb => cb
                            .value);
                        bulkBtn.disabled = selected.length === 0;
                        bulkInput.value = selected.join(",");
                    }

                    if (e.target.id === "bulk-select-all") {
                        const all = document.querySelectorAll(".bulk-checkbox");
                        all.forEach(cb => cb.checked = e.target.checked);
                        const selected = [...document.querySelectorAll(".bulk-checkbox:checked")].map(cb => cb
                            .value);
                        bulkBtn.disabled = selected.length === 0;
                        bulkInput.value = selected.join(",");
                    }
                });
            });
        </script>

        {{-- Delete Payment Modal --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var deleteModal = document.getElementById("deletePaymentModal");
                var payrollIdInput = document.getElementById("deletePayrollId");

                deleteModal.addEventListener("show.bs.modal", function(event) {
                    var button = event.relatedTarget;
                    var payrollId = button.getAttribute("data-id");

                    payrollIdInput.value = payrollId;
                });
            });
        </script>
        {{-- Bulk Remove Payments --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const bulkRemoveBtn = document.getElementById("bulk-remove-btn");
                const bulkRemoveInput = document.getElementById("bulk-remove-payroll-ids");

                document.addEventListener("change", function(e) {
                    if (e.target.classList.contains("bulk-checkbox")) {
                        const selected = [...document.querySelectorAll(".bulk-checkbox:checked")].map(cb => cb
                            .value);
                        bulkRemoveBtn.disabled = selected.length === 0;
                        bulkRemoveInput.value = selected.join(",");
                    }

                    if (e.target.id === "bulk-select-all") {
                        const all = document.querySelectorAll(".bulk-checkbox");
                        all.forEach(cb => cb.checked = e.target.checked);
                        const selected = [...document.querySelectorAll(".bulk-checkbox:checked")].map(cb => cb
                            .value);
                        bulkRemoveBtn.disabled = selected.length === 0;
                        bulkRemoveInput.value = selected.join(",");
                    }
                });
            });
        </script>
    @endpush
@endsection
