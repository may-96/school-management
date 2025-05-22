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
                                 <li class="breadcrumb-item"><a href="javascript: void(0)">Voucher</a></li>
                                 <li class="breadcrumb-item" aria-current="page">Edit</li>
                             </ul>
                         </div>
                         <div class="col-md-12">
                             <div class="page-header-title">
                                 <h2 class="mb-0">Edit</h2>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             
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
                 <div class="col-sm-12">
                     <div class="card">
                         <div class="card-body">
                             <form id="voucher-form" method="POST" action="{{ route('voucher.update', $voucher->id) }}">
                                 @csrf
                                 @method('PUT')

                                 <!-- Hidden Fields -->
                                 <input type="hidden" name="student_id" value="{{ $voucher->student_id }}">
                                 <input type="hidden" name="invoice_id" value="{{ $voucher->invoice_id }}">
                                 <input type="hidden" name="reference_no" value="{{ $voucher->reference_no }}">

                                 <input type="hidden" name="amount" value="{{ $voucher->amount ?? 0.0 }}">

                                 <div class="row g-3">
                                     <div class="col-sm-6 col-xl-3">
                                         <label class="form-label">Payment Method</label>
                                         <select class="form-select" name="payment_method" required>
                                             <option value="">Please Select</option>
                                             @foreach (['Cheque', 'Cash', 'Credit Card', 'Easypaisa', 'Bank Transfer'] as $method)
                                                 <option value="{{ $method }}"
                                                     {{ $voucher->payment_method === $method ? 'selected' : '' }}>
                                                     {{ $method }}</option>
                                             @endforeach
                                         </select>
                                     </div>

                                     <div class="col-sm-6 col-xl-3">
                                         <label class="form-label">Status</label>
                                         <select class="form-select" name="status" required>
                                             <option value="">Please Select</option>
                                             @foreach (['Paid', 'Unpaid', 'Partial Paid'] as $status)
                                                 <option value="{{ $status }}"
                                                     {{ $voucher->status === $status ? 'selected' : '' }}>
                                                     {{ $status }}</option>
                                             @endforeach
                                         </select>
                                     </div>

                                     <div class="col-sm-6 col-xl-3">
                                         <label class="form-label">Notes</label>
                                         <textarea name="notes" class="form-control" rows="1">{{ $voucher->notes }}</textarea>
                                     </div>

                                     <div class="col-sm-6 col-xl-3">
                                         <label class="form-label">Due Date</label>
                                         <input type="date" name="payment_date" class="form-control"
                                             value="{{ \Carbon\Carbon::parse($voucher->payment_date)->format('Y-m-d') }}"
                                             required />

                                     </div>

                                     <!-- Fee Details -->
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
                                                 <tbody>
                                                     @foreach ($voucher->items as $index => $item)
                                                         <tr>
                                                             <td>{{ $index + 1 }}</td>
                                                             <td>
                                                                 <select name="fee_type[]" class="form-select" required>
                                                                     <option value="">Please Select</option>
                                                                     @foreach (['Admission Fees', 'Monthly Fees', 'Tuition Fees', 'Lab Fees', 'Application Fees', 'Examination Fees', 'Registration Fees', 'Accomodation Fees', 'Library Fees'] as $type)
                                                                         <option value="{{ $type }}"
                                                                             {{ $item->fee_type === $type ? 'selected' : '' }}>
                                                                             {{ $type }}</option>
                                                                     @endforeach
                                                                 </select>
                                                             </td>
                                                             <td>
                                                                 <input type="number" name="fee_amount[]"
                                                                     class="form-control fee-input"
                                                                     value="{{ $item->fee_amount }}" required />
                                                             </td>
                                                             <td class="text-center">
                                                                 <a href="#"
                                                                     class="text-danger avtar avtar-s btn-link-danger btn-pc-default remove-item"><i
                                                                         class="ti ti-trash f-20"></i></a>
                                                             </td>
                                                         </tr>
                                                     @endforeach
                                                 </tbody>
                                             </table>
                                         </div>

                                         <div class="text-start">
                                             <hr class="mb-4 mt-0 border-secondary border-opacity-50" />
                                             <button type="button" class="btn btn-light-primary" id="add-item-btn">
                                                 <i class="ti ti-plus"></i> Add new item
                                             </button>
                                         </div>
                                     </div>

                                     <!-- Grand Total -->
                                     <div class="col-12">
                                         <div class="invoice-total ms-auto">
                                             <div class="row">
                                                 <div class="col-6">
                                                     <p class="f-w-600 mb-1 text-start">Grand Total:</p>
                                                 </div>
                                                 <div class="col-6">
                                                     <p class="f-w-600 mb-1 text-end" id="grand-total">Pkr
                                                         {{ number_format($voucher->amount, 2) }}</p>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <!-- Submit -->
                                     <div class="col-12">
                                         <div class="row justify-content-end g-3">
                                             <div class="col-sm-auto">
                                                 <button type="submit" class="btn btn-primary">Update</button>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </form>
                             <script>
                                 document.addEventListener('DOMContentLoaded', function() {
                                     const addItemBtn = document.getElementById('add-item-btn');
                                     const tableBody = addItemBtn.closest('form').querySelector('tbody');
                                     const grandTotalDisplay = document.getElementById('grand-total');

                                     function calculateGrandTotal() {
                                         let total = 0;
                                         tableBody.querySelectorAll('input[name="fee_amount[]"]').forEach(input => {
                                             const val = parseFloat(input.value);
                                             if (!isNaN(val)) total += val;
                                         });
                                         grandTotalDisplay.textContent = 'Pkr ' + total.toFixed(2);
                                     }

                                     // Add new row
                                     addItemBtn.addEventListener('click', () => {
                                         const newRow = document.createElement('tr');
                                         newRow.innerHTML = `
      <td>${tableBody.children.length + 1}</td>
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
        <input type="number" name="fee_amount[]" class="form-control fee-input" required />
      </td>
      <td class="text-center">
        <a href="#" class="text-danger remove-item"><i class="ti ti-trash"></i></a>
      </td>
    `;
                                         tableBody.appendChild(newRow);
                                         calculateGrandTotal();
                                     });

                                     // Remove row (event delegation)
                                     tableBody.addEventListener('click', function(e) {
                                         if (e.target.closest('.remove-item')) {
                                             e.preventDefault();
                                             const row = e.target.closest('tr');
                                             row.remove();

                                             // Re-index row numbers
                                             [...tableBody.children].forEach((tr, idx) => {
                                                 tr.querySelector('td:first-child').textContent = idx + 1;
                                             });

                                             calculateGrandTotal();
                                         }
                                     });

                                     // Recalculate total on fee amount change
                                     tableBody.addEventListener('input', function(e) {
                                         if (e.target.classList.contains('fee-input')) {
                                             calculateGrandTotal();
                                         }
                                     });

                                     // Initial calculation
                                     calculateGrandTotal();
                                 });
                             </script>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endsection
