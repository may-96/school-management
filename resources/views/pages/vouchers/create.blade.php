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
                                <li class="breadcrumb-item">Voucher</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Create</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-alerts />

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="studentForm"
                                action="{{ route('students.vouchers.store', ['student' => $student ? $student->id : null]) }}"
                                method="POST">
                                @csrf

                                {{-- Hidden Fields --}}
                                <input type="hidden" name="student_id" value="{{ $student ? $student->id : '' }}">
                                <input type="hidden" name="student_ids" id="student_ids_input">
                                <input type="hidden" name="invoice_id" value="{{ $invoiceId ?? '' }}">
                                <input type="hidden" name="amount" value="0.00">
                                <input type="hidden" name="redirect_to"
                                    value="{{ request()->get('redirect_to', 'index') }}">

                                <div class="row g-3">
                                    <div class="col-sm-6 col-xl-6 mb-3">
                                        <label for="month_year" class="form-label">Month & Year<span
                                                class="text-danger">*</span></label>
                                        <input type="month" name="month_year" id="month_year" class="form-control"
                                            max="{{ date('Y-m') }}" required>
                                    </div>

                                    <script>
                                        document.getElementById('month_year').addEventListener('focus', function() {
                                            this.showPicker && this.showPicker();
                                        });
                                    </script>

                                    <div class="col-sm-6 col-xl-6">
                                        <label class="form-label">Due Date <span class="text-danger">*</span></label>
                                        <input type="date" name="payment_date" class="form-control"
                                            max="{{ date('Y-m-d') }}" required />
                                    </div>

                                    <div class="col-12">
                                        <h5>Fee Details</h5>
                                        <div class="table-responsive">
                                            <table class="table table-hover mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Fee Type</th>
                                                        <th>Amount</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="feeTableBody"></tbody>
                                            </table>
                                        </div>

                                        <div class="text-start">
                                            <hr class="mb-4 mt-0 border-secondary border-opacity-50" />
                                            <button type="button" class="btn btn-light-primary d-flex" id="add-item-btn">
                                                <i class="ti ti-plus"></i> Add new item
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="invoice-total ms-auto">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="f-w-600 mb-1 text-start">Grand Total:</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="f-w-600 mb-1 text-end" id="grand-total">PKR 0.00</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xl-12">
                                        <label class="form-label">Notes</label>
                                        <textarea name="notes" class="form-control" rows="2" placeholder="Enter any notes here..."></textarea>
                                    </div>

                                    <div class="col-12">
                                        <div class="row justify-content-end g-3">
                                            <div class="col-sm-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            {{-- Scripts --}}
                            <script>
                                const allFeeTypes = @json($feeTypes);

                                document.addEventListener("DOMContentLoaded", function() {
                                    const tableBody = document.getElementById("feeTableBody");
                                    const addItemBtn = document.getElementById("add-item-btn");
                                    const grandTotalEl = document.getElementById("grand-total");
                                    const amountInput = document.querySelector('input[name="amount"]');

                                    function getSelectedFeeTypes() {
                                        return Array.from(document.querySelectorAll('select[name="fee_type_id[]"]'))
                                            .map(select => select.value)
                                            .filter(val => val !== "");
                                    }

                                    function updateRowNumbers() {
                                        tableBody.querySelectorAll("tr").forEach((row, index) => {
                                            row.querySelector("td:first-child").textContent = index + 1;
                                        });
                                    }

                                    function calculateTotal() {
                                        let total = 0;
                                        document.querySelectorAll(".fee-input").forEach(input => {
                                            const value = parseFloat(input.value);
                                            if (!isNaN(value)) total += value;
                                        });
                                        grandTotalEl.textContent = `PKR ${total.toFixed(2)}`;
                                        amountInput.value = total.toFixed(2);
                                    }

                                    function refreshAllSelectOptions() {
                                        const selected = getSelectedFeeTypes();

                                        document.querySelectorAll('select[name="fee_type_id[]"]').forEach(select => {
                                            const currentValue = select.value;
                                            select.innerHTML =
                                                '<option value="">Please Select</option>' +
                                                allFeeTypes
                                                .filter(type => !selected.includes(type.id.toString()) || type.id.toString() ===
                                                    currentValue)
                                                .map(type =>
                                                    `<option value="${type.id}" ${type.id.toString() === currentValue ? 'selected' : ''}>${type.name}</option>`
                                                )
                                                .join("");
                                        });

                                        const addItemBtn = document.getElementById("add-item-btn");
                                        if (selected.length >= allFeeTypes.length) {
                                            addItemBtn.disabled = true;
                                        } else {
                                            addItemBtn.disabled = false;
                                        }
                                    }


                                    function attachListeners() {
                                        document.querySelectorAll(".fee-input").forEach(input => {
                                            input.removeEventListener("input", calculateTotal);
                                            input.addEventListener("input", calculateTotal);
                                        });

                                        document.querySelectorAll('select[name="fee_type_id[]"]').forEach(select => {
                                            select.removeEventListener("change", refreshAllSelectOptions);
                                            select.addEventListener("change", refreshAllSelectOptions);
                                        });

                                        document.querySelectorAll(".remove-item").forEach(btn => {
                                            btn.removeEventListener("click", handleRemove);
                                            btn.addEventListener("click", handleRemove);
                                        });
                                    }

                                    function handleRemove(e) {
                                        e.preventDefault();
                                        const row = e.target.closest("tr");
                                        if (row) {
                                            row.remove();
                                            updateRowNumbers();
                                            calculateTotal();
                                            refreshAllSelectOptions();
                                        }
                                    }

                                    function addFeeRow() {
                                        const selected = getSelectedFeeTypes();
                                        const availableOptions = allFeeTypes.filter(
                                            type => !selected.includes(type.id.toString())
                                        );

                                        const row = document.createElement("tr");
                                        row.innerHTML = `
        <td>#</td>
        <td>
            <select name="fee_type_id[]" class="form-select" required>
                <option value="">Please Select</option>
                ${availableOptions.map(type =>
                    `<option value="${type.id}">${type.name}</option>`
                ).join("")}
            </select>
        </td>
        <td>
            <input type="number" name="fee_amount[]" class="form-control fee-input" placeholder="Enter amount" required />
        </td>
        <td class="text-center">
            ${tableBody.children.length === 0 ? '<span class="text-muted"></span>' : `
                                                                                                                                                                                                                                                                            <a href="#" class="text-danger avtar avtar-s btn-link-danger btn-pc-default remove-item">
                                                                                                                                                                                                                                                                                <i class="ti ti-trash f-20"></i>
                                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                                        `}
        </td>
    `;

                                        tableBody.appendChild(row);
                                        updateRowNumbers();
                                        attachListeners();
                                        calculateTotal();
                                        refreshAllSelectOptions();
                                    }

                                    addItemBtn.addEventListener("click", addFeeRow);
                                    addFeeRow(); // Add first row on load
                                });
                            </script>

                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const form = document.getElementById("studentForm");

                                    form.addEventListener("submit", function(e) {
                                        const existingInputs = form.querySelectorAll("input[name='student_ids[]']");
                                        if (existingInputs.length === 0) {
                                            const selectedIds = JSON.parse(localStorage.getItem("selectedStudentIds") || "[]");

                                            selectedIds.forEach(function(id) {
                                                const input = document.createElement("input");
                                                input.type = "hidden";
                                                input.name = "student_ids[]";
                                                input.value = id;
                                                form.appendChild(input);
                                            });
                                        }
                                    });

                                    document.getElementById('studentForm').addEventListener('submit', function(e) {
                                        var studentIds = localStorage.getItem('selectedStudentIds');
                                        document.getElementById('student_ids_input').value = studentIds;
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const redirectFlag = sessionStorage.getItem('redirect_to') || 'index';
                sessionStorage.removeItem('redirect_to'); // clear after using

                // set value to hidden field
                const redirectInput = document.querySelector('input[name="redirect_to"]');
                if (redirectInput) {
                    redirectInput.value = redirectFlag;
                }
            });
        </script>
    @endpush
@endsection
