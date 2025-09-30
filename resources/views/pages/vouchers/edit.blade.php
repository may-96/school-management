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
                                <li class="breadcrumb-item"><a href="{{ url('/voucher') }}">Vouchers</a></li>
                                <li class="breadcrumb-item" aria-current="page">{{ $voucher->invoice_id }}</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Edit Voucher</h2>
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
                            <form id="voucher-form" method="POST" action="{{ route('voucher.update', $voucher->id) }}">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="student_id" value="{{ $voucher->student_id }}">
                                <input type="hidden" name="invoice_id" value="{{ $voucher->invoice_id }}">
                                <input type="hidden" name="reference_no" value="{{ $voucher->reference_no }}">
                                <input type="hidden" name="amount" value="{{ $voucher->amount ?? 0.0 }}">
                                <input type="hidden" name="redirect_to" value="{{ request('redirect_to', 'index') }}">
                                <input type="hidden" name="student_id" value="{{ request('student_id') }}">

                                <div class="row g-3">
                                    <div class="col-sm-6 col-xl-6 mb-3">
                                        <label for="month_year" class="form-label">Month & Year <span
                                                class="text-danger">*</span></label>
                                        <input type="month" name="month_year" id="month_year" class="form-control"
                                            max="{{ date('Y-m') }}"
                                            value="{{ old('month_year', $voucher->month_year) }}" required>
                                    </div>
                                    <script>
                                        document.getElementById('month_year').addEventListener('focus', function() {
                                            this.showPicker && this.showPicker();
                                        });
                                    </script>

                                    <div class="col-sm-6 col-xl-6">
                                        <label class="form-label">Due Date <span class="text-danger">*</span></label>
                                        <input type="date" name="payment_date" class="form-control"
                                            max="{{ date('Y-m-d') }}"
                                            value="{{ \Carbon\Carbon::parse($voucher->payment_date)->format('Y-m-d') }}"
                                            required />
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
                                                    @foreach ($voucher->items as $index => $item)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>
                                                                <select name="fee_type_id[]" class="form-select" required>
                                                                    <option value="">Please Select</option>
                                                                    @foreach ($feeTypes as $type)
                                                                        <option value="{{ $type->id }}"
                                                                            {{ $item->fee_type_id == $type->id ? 'selected' : '' }}>
                                                                            {{ $type->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="number" name="fee_amount[]"
                                                                    class="form-control fee-input"
                                                                    value="{{ $item->fee_amount }}" required />
                                                            </td>
                                                            <td class="text-center">
                                                                @if ($index > 0)
                                                                    <a href="#"
                                                                        class="text-danger avtar avtar-s btn-link-danger btn-pc-default remove-item">
                                                                        <i class="ti ti-trash f-20"></i>
                                                                    </a>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
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

                                    <div class="col-12">
                                        <div class="invoice-total ms-auto">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="f-w-600 mb-1 text-start">Grand Total:</p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="f-w-600 mb-1 text-end" id="grand-total">PKR
                                                        {{ number_format($voucher->amount, 2) }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xl-12">
                                        <label class="form-label">Notes</label>
                                        <textarea name="notes" class="form-control" rows="2">{{ $voucher->notes }}</textarea>
                                    </div>

                                    <div class="col-12">
                                        <div class="row justify-content-end g-3">
                                            <div class="col-sm-auto">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            {{-- Fee Row JS --}}
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const tableBody = document.getElementById("feeTableBody");
                                    const addItemBtn = document.getElementById("add-item-btn");
                                    const grandTotalEl = document.getElementById("grand-total");
                                    const amountInput = document.querySelector('input[name="amount"]');
                                    const allFeeTypes = @json($feeTypes);

                                    function getSelectedFeeTypes() {
                                        return Array.from(document.querySelectorAll('select[name="fee_type_id[]"]'))
                                            .map(select => select.value)
                                            .filter(val => val !== "");
                                    }

                                    function generateFeeTypeOptions(currentValue = '') {
                                        const selected = getSelectedFeeTypes();
                                        return allFeeTypes
                                            .filter(type => !selected.includes(type.id.toString()) || type.id.toString() === currentValue)
                                            .map(type =>
                                                `<option value="${type.id}" ${type.id.toString() === currentValue ? 'selected' : ''}>${type.name}</option>`
                                            )
                                            .join('');
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
                                        document.querySelectorAll('select[name="fee_type_id[]"]').forEach(select => {
                                            const currentValue = select.value;
                                            select.innerHTML =
                                                '<option value="">Please Select</option>' + generateFeeTypeOptions(currentValue);
                                        });

                                        const selected = getSelectedFeeTypes();
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
                                        if (row) row.remove();
                                        updateRowNumbers();
                                        calculateTotal();
                                        refreshAllSelectOptions();
                                    }

                                    addItemBtn.addEventListener("click", function() {
                                        const selected = getSelectedFeeTypes();
                                        const available = allFeeTypes.filter(type => !selected.includes(type.id.toString()));
                                        if (available.length === 0) {
                                            alert("All fee types have been selected.");
                                            return;
                                        }

                                        const row = document.createElement("tr");
                                        row.innerHTML = `
<td>#</td>
<td>
    <select name="fee_type_id[]" class="form-select" required>
        <option value="">Please Select</option>
        ${generateFeeTypeOptions()}
    </select>
</td>
<td>
    <input type="number" name="fee_amount[]" class="form-control fee-input" placeholder="Enter amount" required />
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
                                    refreshAllSelectOptions();
                                    calculateTotal();
                                });
                            </script>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
