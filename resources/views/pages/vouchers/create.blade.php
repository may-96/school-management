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
                                <li class="breadcrumb-item" aria-current="page">Voucher</li>
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

            @if ($errors->any())
                <div id="errorAlert" class="alert alert-danger alert-dismissible fade show" role="alert"
                    style="display: none;">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <script>
                    if (!sessionStorage.getItem('errorShown')) {
                        const alertBox = document.getElementById('errorAlert');
                        alertBox.style.display = 'block';

                        setTimeout(() => {
                            alertBox.classList.remove('show');
                            setTimeout(() => alertBox.remove(), 300);
                        }, 3000);

                        sessionStorage.setItem('errorShown', 'true');
                    }
                </script>
            @endif


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

                                <div class="row g-3">

                                    <div class="col-sm-6 col-xl-6 mb-3">
                                        <label for="month_year" class="form-label">Month & Year <span
                                                class="text-danger">*</span></label>
                                        <input type="month" name="month_year" id="month_year" class="form-control" max="{{ date('Y-m') }}"
                                            required>
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
                                                <tbody id="feeTableBody">
                                                    <tr>
                                                        <td>1</td>
                                                        <td>
                                                            <select name="fee_type[]" class="form-select" required>
                                                                <option value="">Please Select</option>
                                                                <option value="Admission Fees">Admission Fees</option>
                                                                <option value="Monthly Fees">Monthly Fees</option>
                                                                <option value="Tuition Fees">Tuition Fees</option>
                                                                <option value="Lab Fees">Lab Fees</option>
                                                                <option value="Application Fees">Application Fees</option>
                                                                <option value="Examination Fees">Examination Fees</option>
                                                                <option value="Registration Fees">Registration Fees</option>
                                                                <option value="Accomodation Fees">Accomodation Fees</option>
                                                                <option value="Library Fees">Library Fees</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="fee_amount[]"
                                                                class="form-control fee-input" required />
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="text-start">
                                            <hr class="mb-4 mt-0 border-secondary border-opacity-50" />
                                            <button type="button" class="btn btn-light-primary d-flex" id="add-item-btn">
                                                <i class="ti ti-plus"></i> Add new item
                                            </button>
                                        </div>
                                    </div>

                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const tableBody = document.getElementById("feeTableBody");
                                            const addItemBtn = document.getElementById("add-item-btn");
                                            const grandTotalEl = document.getElementById("grand-total");
                                            const amountInput = document.querySelector('input[name="amount"]');

                                            const allFeeTypes = [
                                                "Admission Fees",
                                                "Monthly Fees",
                                                "Tuition Fees",
                                                "Lab Fees",
                                                "Application Fees",
                                                "Examination Fees",
                                                "Registration Fees",
                                                "Accomodation Fees",
                                                "Library Fees"
                                            ];

                                            function getSelectedFeeTypes() {
                                                return Array.from(document.querySelectorAll('select[name="fee_type[]"]'))
                                                    .map(select => select.value)
                                                    .filter(val => val !== "");
                                            }

                                            function generateFeeTypeOptions() {
                                                const selected = getSelectedFeeTypes();
                                                return allFeeTypes
                                                    .filter(type => !selected.includes(type))
                                                    .map(type => `<option value="${type}">${type}</option>`)
                                                    .join("");
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
                                                document.querySelectorAll('select[name="fee_type[]"]').forEach(select => {
                                                    const currentValue = select.value;
                                                    select.innerHTML =
                                                        '<option value="">Please Select</option>' +
                                                        allFeeTypes
                                                        .filter(type => !selected.includes(type) || type === currentValue)
                                                        .map(type =>
                                                            `<option value="${type}" ${type === currentValue ? 'selected' : ''}>${type}</option>`
                                                        )
                                                        .join("");
                                                });
                                            }

                                            function attachListeners() {
                                                document.querySelectorAll(".fee-input").forEach(input => {
                                                    input.removeEventListener("input", calculateTotal);
                                                    input.addEventListener("input", calculateTotal);
                                                });

                                                document.querySelectorAll('select[name="fee_type[]"]').forEach(select => {
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
                                                if (row && row.rowIndex !== 1) {
                                                    row.remove();
                                                    updateRowNumbers();
                                                    calculateTotal();
                                                    refreshAllSelectOptions();
                                                }
                                            }

                                            addItemBtn.addEventListener("click", function() {
                                                const options = generateFeeTypeOptions();

                                                if (!options) {
                                                    alert("All fee types have been selected.");
                                                    return;
                                                }

                                                const row = document.createElement("tr");
                                                row.innerHTML = `
                        <td>#</td>
                        <td>
                            <select name="fee_type[]" class="form-select" required>
                                <option value="">Please Select</option>
                                ${options}
                            </select>
                        </td>
                        <td>
                            <input type="number" name="fee_amount[]" class="form-control fee-input" required />
                        </td>
                        <td class="text-center">
                            <a href="#" class="text-danger avtar avtar-s btn-link-danger btn-pc-default remove-item">
                                <i class="ti ti-trash f-20"></i>
                            </a>
                        </td>
                    `;
                                                tableBody.appendChild(row);

                                                updateRowNumbers();
                                                attachListeners();
                                                refreshAllSelectOptions();
                                            });

                                            updateRowNumbers();
                                            attachListeners();
                                        });
                                    </script>

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
                                        <textarea name="notes" class="form-control" rows="2"></textarea>
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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const form = document.getElementById("voucher-form");

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
        });

        document.getElementById('studentForm').addEventListener('submit', function(e) {
            var studentIds = localStorage.getItem('selectedStudentIds');

            document.getElementById('student_ids_input').value = studentIds;
        });
    </script>
@endsection
