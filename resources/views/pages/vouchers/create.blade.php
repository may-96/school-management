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
                                 <li class="breadcrumb-item" aria-current="page">Create</li>
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
                             <form id="voucher-form" method="POST" action="{{ route('students.vouchers.store', $student->id) }}">

                                 @csrf

                                 <!-- Hidden Fields -->
                                 <input type="hidden" name="student_id" value="{{ $student->id ?? '' }}">
                                 <input type="hidden" name="invoice_id" value="{{ $invoiceId ?? '' }}">
                                 <input type="hidden" name="reference_no" value="{{ $referenceNo ?? '' }}">

                                 <input type="hidden" name="amount" value="0.00">

                                 <div class="row g-3">
                                     <div class="col-sm-6 col-xl-3">
                                         <label class="form-label">Payment Method</label>
                                         <select class="form-select" name="payment_method" required>
                                             <option value="">Please Select</option>
                                             <option>Cheque</option>
                                             <option>Cash</option>
                                             <option>Credit Card</option>
                                             <option>Easypaisa</option>
                                             <option>Bank Transfer</option>
                                         </select>
                                     </div>

                                     <div class="col-sm-6 col-xl-3">
                                         <label class="form-label">Status</label>
                                         <select class="form-select" name="status" required>
                                             <option value="">Please Select</option>
                                             <option>Paid</option>
                                             <option>Unpaid</option>
                                             <option>Partial Paid</option>
                                         </select>
                                     </div>

                                     <div class="col-sm-6 col-xl-3">
                                         <label class="form-label">Notes</label>
                                         <textarea name="notes" class="form-control" rows="1"></textarea>
                                     </div>

                                     <div class="col-sm-6 col-xl-3">
                                         <label class="form-label">Due Date</label>
                                         <input type="date" name="payment_date" class="form-control" required />
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
                                                     <!-- Dynamic rows added with JavaScript -->
                                                     <script>
                                                         document.addEventListener("DOMContentLoaded", function() {
                                                             const tableBody = document.querySelector("tbody");
                                                             const addItemBtn = document.getElementById("add-item-btn");
                                                             const grandTotalEl = document.getElementById("grand-total");
                                                             const amountInput = document.querySelector('input[name="amount"]');

                                                             function updateRowNumbers() {
                                                                 tableBody.querySelectorAll("tr").forEach((row, i) => {
                                                                     row.querySelector("td:first-child").textContent = i + 1;
                                                                 });
                                                             }

                                                             function calculateTotal() {
                                                                 let total = 0;
                                                                 document.querySelectorAll(".fee-input").forEach(input => {
                                                                     let val = parseFloat(input.value);
                                                                     if (!isNaN(val)) total += val;
                                                                 });
                                                                 grandTotalEl.textContent = `Pkr ${total.toFixed(2)}`;
                                                                 amountInput.value = total.toFixed(2);
                                                             }

                                                             function attachListeners() {
                                                                 document.querySelectorAll(".fee-input").forEach(input => {
                                                                     input.addEventListener("input", calculateTotal);
                                                                 });
                                                             }

                                                             addItemBtn.addEventListener("click", function() {
                                                                 const row = document.createElement("tr");
                                                                 row.innerHTML = `
                <td>#</td>
                <td>
                    <select name="fee_type[]" class="form-select" required>
                        <option value="">Please Select</option>
                        <option>Admission Fees</option>
                        <option>Monthly Fees</option>
                        <option>Tuition Fees</option>
                        <option>Lab Fees</option>
                        <option>Application Fees</option>
                        <option>Examination Fees</option>
                        <option>Registration Fees</option>
                        <option>Accomodation Fees</option>
                        <option>Library Fees</option>
                    </select>
                </td>
                <td>
                    <input type="number" name="fee_amount[]" class="form-control fee-input" required />
                </td>
                <td class="text-center">
                    <a href="#" class="text-danger avtar avtar-s btn-link-danger btn-pc-default remove-item"><i class="ti ti-trash f-20"></i></a>
                </td>
            `;
                                                                 tableBody.appendChild(row);
                                                                 updateRowNumbers();
                                                                 attachListeners();
                                                             });

                                                             tableBody.addEventListener("click", function(e) {
                                                                 if (e.target.closest(".remove-item")) {
                                                                     e.preventDefault();
                                                                     e.target.closest("tr").remove();
                                                                     updateRowNumbers();
                                                                     calculateTotal();
                                                                 }
                                                             });
                                                         });
                                                     </script>
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
                                                     <p class="f-w-600 mb-1 text-end" id="grand-total">Pkr 0.00</p>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <!-- Submit -->
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
 @endsection
 <script>
     document.addEventListener("DOMContentLoaded", function() {
         // Saare input fields select karo
         const inputs = document.querySelectorAll("input, select, textarea");

         // Har ek input pe click event lagao
         inputs.forEach(input => {
             input.addEventListener("click", function() {
                 this.focus();

                 // Agar input date type ka hai, to open the picker
                 if (this.type === "date") {
                     this.showPicker?.(); // Modern browsers
                 }
             });
         });
     });
 </script>
