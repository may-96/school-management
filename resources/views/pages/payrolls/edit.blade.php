@extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            {{-- Page Header --}}
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('payrolls.index') }}">Payrolls</a></li>
                                <li class="breadcrumb-item active">Edit Payroll</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Edit Payroll</h2>
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
                            <form action="{{ route('payrolls.update', $payroll->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                {{-- Hidden fields --}}
                                <input type="hidden" name="employee_type"
                                    value="{{ $payroll->employee_type === \App\Models\Teacher::class ? 'teacher' : 'employee' }}">
                                <input type="hidden" name="employee_id" value="{{ $payroll->employee_id }}">
                                <input type="hidden" name="payroll_month"
                                    value="{{ \Carbon\Carbon::parse($payroll->payroll_month)->format('Y-m-d') }}">

                                {{-- Payroll Month --}}
                                <div class="col-sm-12 mb-3">
                                    <label class="form-label">Payroll Month</label>
                                    <input type="month" class="form-control"
                                        value="{{ \Carbon\Carbon::parse($payroll->payroll_month)->format('Y-m') }}"
                                        disabled>
                                </div>

                                {{-- Pay Details --}}
                                <div class="col-12 mt-4">
                                    <h5>Pay Details</h5>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0" id="payTable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Pay Type</th>
                                                    <th>Amount</th>
                                                    <th class="text-center">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                {{-- Existing Pay Details load from DB --}}
                                                @foreach ($payDetails as $detail)
                                                    <tr>
                                                        <td>#</td>
                                                        <td>
                                                            <select name="pay_type_id[]" class="form-select">
                                                                <option value="">Select Type</option>
                                                                @foreach ($payTypes as $type)
                                                                    <option value="{{ $type->id }}"
                                                                        data-deductible="{{ $type->is_deductible }}"
                                                                        {{ $detail->pay_type_id == $type->id ? 'selected' : '' }}>
                                                                        {{ $type->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <input type="number" name="pay_amount[]" min="0"
                                                                value="{{ abs($detail->amount) }}"
                                                                class="form-control pay-input">
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="#"
                                                                class="text-danger avtar avtar-s btn-link-danger remove-item">
                                                                <i class="ti ti-trash f-20"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>

                                    {{-- Add Pay Item --}}
                                    <div class="text-start mt-3">
                                        <button type="button" class="btn btn-light-primary d-flex" id="addPayRowBtn">
                                            <i class="ti ti-plus"></i> Add Pay Item
                                        </button>
                                    </div>
                                </div>

                                {{-- Grand Total --}}
                                <div class="col-12 mt-4">
                                    <div class="invoice-total ms-auto">
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="f-w-600 mb-1 text-start">Grand Total:</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="f-w-600 mb-1 text-end" id="grandTotal">
                                                    PKR {{ number_format($payroll->net_salary, 2) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- Notes --}}
                                <div class="col-12 mt-3">
                                    <label class="form-label">Notes</label>
                                    <textarea name="notes" class="form-control" rows="2">{{ old('notes', $payroll->notes) }}</textarea>
                                </div>

                                {{-- Submit --}}
                                <div class="col-12 mt-3">
                                    <div class="row justify-content-end g-3">
                                        <div class="col-sm-auto">
                                            <button type="submit" class="btn btn-primary">
                                                Update
                                            </button>
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

    {{-- JS Section --}}
    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const tableBody = document.querySelector("#payTable tbody");
                const addPayRowBtn = document.getElementById("addPayRowBtn");
                const grandTotalEl = document.getElementById("grandTotal");

                const payTypes = @json($payTypes);

                function formatPKR(num) {
                    return new Intl.NumberFormat("en-PK").format(num);
                }

                function updateRowNumbers() {
                    tableBody.querySelectorAll("tr").forEach((row, i) => {
                        row.querySelector("td:first-child").textContent = i + 1;
                    });
                }

                function refreshDropdowns() {
                    const selected = Array.from(tableBody.querySelectorAll("select"))
                        .map(s => s.value)
                        .filter(v => v);

                    tableBody.querySelectorAll("select").forEach(select => {
                        const currentValue = select.value;
                        select.innerHTML = `<option value="">Select Type</option>`;
                        payTypes.forEach(pt => {
                            if (!selected.includes(pt.id.toString()) || pt.id.toString() ===
                                currentValue) {
                                const option = document.createElement("option");
                                option.value = pt.id;
                                option.textContent = pt.name;
                                option.setAttribute("data-deductible", pt.is_deductible);
                                if (pt.id.toString() === currentValue) option.selected = true;
                                select.appendChild(option);
                            }
                        });
                    });

                    const availableTypes = payTypes.length;
                    addPayRowBtn.disabled = selected.length >= availableTypes;
                }

                function calculateTotal() {
                    let total = 0;
                    tableBody.querySelectorAll("tr").forEach((row) => {
                        const amountInput = row.querySelector(".pay-input");
                        const select = row.querySelector("select");
                        if (amountInput && select) {
                            const amount = parseFloat(amountInput.value) || 0;
                            const isDeductible = select.selectedOptions[0]?.getAttribute("data-deductible") ===
                                "1";
                            if (isDeductible) total -= amount;
                            else total += amount;
                        }
                    });
                    grandTotalEl.textContent = `PKR ${formatPKR(total)}`;
                }

                function addPayRow(typeId = '', amount = '') {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>#</td>
                        <td>
                            <select name="pay_type_id[]" class="form-select"></select>
                        </td>
                        <td>
                            <input type="number" name="pay_amount[]" min="0" value="${amount}" class="form-control pay-input" placeholder="Enter Amount">
                        </td>
                        <td class="text-center">
                            <a href="#" class="text-danger avtar avtar-s btn-link-danger remove-item">
                                <i class="ti ti-trash f-20"></i>
                            </a>
                        </td>
                    `;
                    tableBody.appendChild(row);
                    updateRowNumbers();
                    refreshDropdowns();

                    if (typeId) row.querySelector("select").value = typeId;
                    calculateTotal();
                }

                // Add row button
                addPayRowBtn.addEventListener("click", (e) => {
                    e.preventDefault();
                    addPayRow();
                });

                // Remove row
                tableBody.addEventListener("click", (e) => {
                    if (e.target.closest(".remove-item")) {
                        e.preventDefault();
                        e.target.closest("tr").remove();
                        updateRowNumbers();
                        refreshDropdowns();
                        calculateTotal();
                    }
                });

                // Dropdown change
                tableBody.addEventListener("change", (e) => {
                    if (e.target.tagName === "SELECT") {
                        refreshDropdowns();
                        calculateTotal();
                    }
                });

                // Amount input change
                tableBody.addEventListener("input", (e) => {
                    if (e.target.classList.contains("pay-input")) {
                        calculateTotal();
                    }
                });

                // Initialize
                updateRowNumbers();
                refreshDropdowns();
                calculateTotal();
            });
        </script>
    @endpush
@endsection
