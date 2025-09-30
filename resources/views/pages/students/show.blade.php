 @extends('layouts.master')
 @php use Yajra\DataTables\Html\Builder; @endphp

 @section('content')
     <div class="pc-container">
         <div class="pc-content">
             <div class="page-header">
                 <div class="page-block">
                     <div class="row align-items-center">
                         <div class="col-md-12">
                             <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                                 <li class="breadcrumb-item"><a href="{{ url('/students') }}">Students</a></li>
                                 <li class="breadcrumb-item" aria-current="page">{{ $student->first_name }}
                                     {{ $student->last_name }}</li>
                             </ul>
                         </div>
                         <div class="col-md-12">
                             <div class="page-header-title">
                                 <h2 class="mb-0">{{ $student->first_name }} {{ $student->last_name }}</h2>
                                 <p class="mb-1 text-muted">Student Profile</p>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <x-alerts />

             <div class="row">
                 <div class="col-sm-12">
                     <div class="card">
                         <div class="card-body py-0">
                             <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                                 <li class="nav-item">
                                     <a class="nav-link {{ session('active_tab', 'profile-1') == 'profile-1' ? 'active' : '' }}"
                                         id="profile-tab-1" data-bs-toggle="tab" href="#profile-1" role="tab"
                                         aria-selected="{{ session('active_tab', 'profile-1') == 'profile-1' ? 'true' : 'false' }}">
                                         Profile
                                     </a>
                                 </li>

                                 <li class="nav-item">
                                     <a class="nav-link {{ session('active_tab') == 'profile-2' ? 'active' : '' }}"
                                         id="profile-tab-2" data-bs-toggle="tab" data-bs-target="#profile-2" type="button"
                                         role="tab" aria-controls="profile-2"
                                         aria-selected="{{ session('active_tab') == 'profile-2' ? 'true' : 'false' }}">
                                         Vouchers
                                     </a>
                                 </li>
                             </ul>
                         </div>

                     </div>
                     <div class="tab-content">
                         <div class="tab-pane fade {{ session('active_tab', 'profile-1') == 'profile-1' ? 'show active' : '' }}"
                             id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                             <div class="row">
                                 <div class="col-lg-8 col-xxl-12">
                                     <div class="card">
                                         <div class="card-header">
                                             <h5>Personal Details</h5>
                                         </div>
                                         <div class="card-body">
                                             <div class="col-sm-12 text-start mb-3">
                                                 <div class="user-upload wid-75">
                                                     @if ($student->profile_image)
                                                         <img src="{{ asset('storage/students/' . $student->profile_image) }}"
                                                             alt="img" class="img-fluid" />
                                                     @else
                                                         <img src="{{ asset('assets/images/user/avatar-2.jpg') }}"
                                                             alt="img" class="img-fluid" />
                                                     @endif
                                                 </div>
                                             </div>

                                             <ul class="list-group list-group-flush">
                                                 <li class="list-group-item px-0 pt-0">
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                             <p class="mb-1 text-muted">Full Name</p>
                                                             <p class="mb-0">{{ $student->first_name }}
                                                                 {{ $student->last_name }}</p>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <p class="mb-1 text-muted">Father Name</p>
                                                             <p class="mb-0">{{ $student->parents_name }}</p>
                                                         </div>
                                                     </div>
                                                 </li>
                                                 <li class="list-group-item px-0">
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                             <p class="mb-1 text-muted">Registration Date</p>
                                                             <p class="mb-0">
                                                                 {{ \Carbon\Carbon::parse($student->registration_date)->format('d-m-Y') }}
                                                             </p>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <p class="mb-1 text-muted">Date of Birth</p>
                                                             <p class="mb-0">
                                                                 {{ \Carbon\Carbon::parse($student->dob)->format('d-m-Y') }}
                                                             </p>
                                                         </div>
                                                     </div>
                                                 </li>
                                                 <li class="list-group-item px-0">
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                             <p class="mb-1 text-muted">Class / Section</p>
                                                             <p class="mb-0">
                                                                 {{ optional(optional($student->classSection)->class)->name ?? 'N/A' }}
                                                                 /
                                                                 {{ optional(optional($student->classSection)->section)->name ?? 'N/A' }}
                                                             </p>


                                                         </div>
                                                         <div class="col-md-6">
                                                             <p class="mb-1 text-muted">Roll No</p>
                                                             <p class="mb-0">{{ $student->roll_no ?? 'N/A' }}</p>
                                                         </div>
                                                     </div>
                                                 </li>
                                                 <li class="list-group-item px-0">
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                             <p class="mb-1 text-muted">Admission No</p>
                                                             <p class="mb-0">{{ $student->admission_no ?? 'N/A' }}</p>
                                                         </div>
                                                         <div class="col-md-6">
                                                             <p class="mb-1 text-muted">Phone</p>
                                                             <p class="mb-0">{{ $student->parents_mobile ?? 'N/A' }}</p>
                                                         </div>
                                                     </div>
                                                 </li>
                                                 <li class="list-group-item px-0">
                                                     <div class="row">
                                                         <div class="col-md-6">
                                                             <p class="mb-1 text-muted">Status</p>
                                                             <p class="mb-0">
                                                                 <span
                                                                     class="badge {{ $student->status === 'Active' ? 'bg-light-success' : 'bg-light-danger' }}">
                                                                     {{ $student->status }}
                                                                 </span>
                                                             </p>

                                                         </div>
                                                         <div class="col-md-6">
                                                             <p class="mb-1 text-muted">Secondary Mobile No</p>
                                                             <p class="mb-0">{{ $student->secondary_mobile ?? 'N/A' }}
                                                             </p>
                                                         </div>
                                                     </div>
                                                 </li>
                                                 <li class="list-group-item px-0 pb-0">
                                                     <p class="mb-1 text-muted">Address</p>
                                                     <p class="mb-0">{{ $student->address ?? 'N/A' }}</p>
                                                 </li>
                                             </ul>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="tab-pane fade {{ session('active_tab') == 'profile-2' ? 'show active' : '' }}"
                             id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">

                             <div class="row">
                                 <div class="col-12">
                                     <div class="card">
                                         <div class="card-header">
                                             <div class="d-sm-flex align-items-center justify-content-between">
                                                 <h5 class="mb-3 mb-sm-0">Vouchers list</h5>
                                                 <input type="hidden" id="active_student_id"
                                                     value="{{ $student->id }}">

                                                 @if ($student->status === 'Active')
                                                     <a href="#"
                                                         class="btn btn-outline-secondary d-inline-flex align-items-center"
                                                         id="idBtnSub">
                                                         <i class="ph-duotone ph-plus-circle me-1"></i>Create Fee Voucher
                                                     </a>
                                                 @else
                                                     <span
                                                         class="btn btn-outline-secondary d-inline-flex align-items-center disabled"
                                                         data-bs-toggle="tooltip"
                                                         title="Inactive students cannot be assigned vouchers">
                                                         <i class="ph-duotone ph-plus-circle me-1 text-muted"></i> Create
                                                         Fee Voucher
                                                     </span>
                                                 @endif
                                             </div>
                                         </div>
                                         <div class="card-body">
                                             <div class="tab-content" id="myTabContent">
                                                 <div class="tab-pane fade show active" id="analytics-tab-1-pane"
                                                     role="tabpanel" aria-labelledby="analytics-tab-1" tabindex="0">
                                                     <div class="table-responsive">
                                                         <table class="table table-hover" id="pc-dt-simple-1">
                                                             <thead>
                                                                 <tr>
                                                                     <th>Voucher Id</th>
                                                                     <th>Student Name</th>
                                                                     <th>Due Date</th>
                                                                     <th>Amount</th>
                                                                     <th>Status</th>
                                                                     @if (auth()->check() && auth()->user()->role === 'admin')
                                                                         <th>Added By</th>
                                                                     @endif
                                                                     <th class="text-end">Actions</th>
                                                                 </tr>
                                                             </thead>
                                                         </table>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
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
                             <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal"
                                 title="Close">
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
                                             <small class="text-muted d-block">Select the Payment Method</small>
                                         </label>
                                         <div class="col-lg-8">
                                             <select class="form-select" name="payment_method" required>
                                                 <option value="">Please Select</option>
                                                 <option value="Cash">Cash</option>
                                                 <option value="Cheque">Cheque</option>
                                                 <option value="Credit Card">Credit Card</option>
                                                 <option value="Online Transfer">Online Transfer</option>
                                             </select>
                                         </div>
                                     </div>

                                     <!-- Voucher Amount Editable -->
                                     <div class="mb-3 row me-0">
                                         <label class="col-lg-4 col-form-label">Amount: <span class="text-danger">*</span>
                                             <small class="text-muted d-block">Enter the Amount</small>
                                         </label>
                                         <div class="col-lg-8">
                                             <input type="number" step="0.01" id="voucherAmountDisplay"
                                                 class="form-control" name="amount">
                                             <input type="hidden" id="voucherAmountOriginal">
                                         </div>
                                     </div>

                                     <!-- PAYMENT DATE -->
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

                                     <!-- REFERENCE NUMBER -->
                                     <div class="mb-3 row me-0">
                                         <label class="col-lg-4 col-form-label">Refrence No :
                                             <small class="text-muted d-block">Enter the Reference Number</small>
                                         </label>
                                         <div class="col-lg-8">
                                             <input type="text" name="reference_number" id="referenceNumberInput"
                                                 class="form-control" placeholder="Enter reference number">
                                         </div>
                                     </div>

                                     <!-- NOTES -->
                                     <div class="mb-3 row me-0">
                                         <label class="col-lg-4 col-form-label">Notes:
                                             <small class="text-muted d-block">Enter the Notes</small>
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

     {{-- Student Edit Payment Modal --}}
     <div class="modal fade" id="student-edit-payment_modal" data-bs-keyboard="false" tabindex="-1"
         aria-hidden="true">
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
                                 <label class="col-lg-4 col-form-label">Payment Method: <span class="text-danger">*</span>
                                     <small class="text-muted d-block">Select the Payment Method</small>
                                 </label>
                                 <div class="col-lg-8">
                                     <select class="form-select" name="payment_method" id="edit_payment_method" required>
                                         <option value="">Please Select</option>
                                         <option value="Cash">Cash</option>
                                         <option value="Cheque">Cheque</option>
                                         <option value="Credit Card">Credit Card</option>
                                         <option value="Online Transfer">Online Transfer</option>
                                     </select>
                                 </div>
                             </div>

                             <!-- Amount -->
                             <div class="mb-3 row">
                                 <label class="col-lg-4 col-form-label">Amount:
                                     <small class="text-muted d-block">Amount only readable</small>
                                 </label>
                                 <div class="col-lg-8">
                                     <input type="number" name="amount" id="edit_amount" class="form-control"
                                         readonly>
                                 </div>
                             </div>

                             <!-- Payment Date -->
                             <div class="mb-3 row">
                                 <label class="col-lg-4 col-form-label">Payment Date: <span class="text-danger">*</span>
                                     <small class="text-muted d-block">Enter the Payment Date</small>
                                 </label>
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
                                 <label class="col-lg-4 col-form-label">Refrence No :
                                     <small class="text-muted d-block">Enter the Reference Number</small>
                                 </label>
                                 <div class="col-lg-8">
                                     <input type="text" id="edit_reference_number" name="reference_number"
                                         class="form-control" placeholder="Enter reference number">
                                 </div>
                             </div>

                             <!-- Notes -->
                             <div class="mb-3 row">
                                 <label class="col-lg-4 col-form-label">Notes:
                                     <small class="text-muted d-block">Enter the Notes</small>
                                 </label>
                                 <div class="col-lg-8">
                                     <textarea name="notes" placeholder="Enter notes" id="edit_notes" class="form-control" rows="2"></textarea>
                                 </div>
                             </div>

                             <!-- Submit -->
                             <div class="text-end mt-4">
                                 <button type="button" class="btn btn-outline-secondary me-2"
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
     <div class="modal fade" id="student-payment-slip_model" data-bs-keyboard="false" tabindex="-1"
         aria-hidden="true">
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


     @push('scripts')
         <script>
             $(document).ready(function() {
                 $('#pc-dt-simple-1').DataTable({
                     processing: true,
                     serverSide: true,
                     ajax: '{{ route('student.payments.data', $student->id) }}',
                     columns: [{
                             data: 'invoice_id',
                             name: 'invoice_id'
                         },
                         {
                             data: 'student_info',
                             name: 'student_info',
                             orderable: false,
                             searchable: false
                         },
                         {
                             data: 'payment_date',
                             name: 'payment_date'
                         },
                         {
                             data: 'amount',
                             name: 'amount'
                         },

                         {
                             data: 'status',
                             name: 'status',
                             orderable: false,
                             searchable: false
                         },

                         @if (auth()->check() && auth()->user()->role === 'admin')
                             {
                                 data: 'added_by',
                                 name: 'added_by'
                             },
                         @endif {
                             data: 'actions',
                             name: 'actions',
                             orderable: false,
                             searchable: false,
                             className: 'text-end'
                         }
                     ]
                 });
             });
         </script>
     @endpush

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

             //  $('#student-payment-slip_model').on('hidden.bs.modal', function() {
             //      $('#payment-slip-table').DataTable().clear().destroy();
             //  });

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
         </script>

         <script>
             $(document).on('click', '.edit-payment-btn', function(e) {
                 e.preventDefault();

                 const id = $(this).data('id');
                 const maxAmount = parseFloat($(this).data('max-amount'));

                 $('#edit_payment_id').val(id);
                 $('#edit_invoice_id').text($(this).data('invoice_id'));
                 $('#edit_voucher_invoice_id').text($(this).data('voucher_invoice_id'));

                 $('#edit_payment_method').val($(this).data('payment_method'));
                 $('#edit_amount')
                     .val($(this).data('amount'))
                     .attr('max', maxAmount)
                     .prop('readonly', true);

                 $('#edit_payment_date').val($(this).data('payment_date'));
                 $('#edit_reference_number').val($(this).data('reference_number'));
                 $('#edit_notes').val($(this).data('notes'));

                 $('#edit-payment-form').attr('action', '/payments/' + id);
                 $('#edit_amount').data('max-amount', maxAmount);
             });
         </script>

         <script>
             $(document).ready(function() {
                 $('#idBtnSub').on('click', function(e) {
                     e.preventDefault();
                     const studentId = $('#active_student_id').val();

                     // normal URL without query string
                     const url = `/students/voucher/create/${studentId}`;

                     // save redirect flag in sessionStorage (temporary)
                     sessionStorage.setItem('redirect_to', 'show');

                     window.location.href = url;
                 });
             });
         </script>


         <script>
             document.addEventListener('DOMContentLoaded', function() {
                 const hash = window.location.hash;
                 if (hash) {
                     const tabTrigger = document.querySelector(`a[href="${hash}"]`);
                     if (tabTrigger) {
                         new bootstrap.Tab(tabTrigger).show();
                     }
                 }
             });
         </script>
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
             document.addEventListener("DOMContentLoaded", function() {
                 let editModalEl = document.getElementById('student-edit-payment_modal');
                 let viewModalEl = document.getElementById('student-payment-slip_model');

                 // Cancel button click
                 $(editModalEl).on('click', '.btn-cancel', function() {
                     let editModal = bootstrap.Modal.getInstance(editModalEl);
                     if (editModal) editModal.hide();

                     let viewModal = new bootstrap.Modal(viewModalEl);
                     viewModal.show();
                 });

                 // Modal X button / backdrop close
                 editModalEl.addEventListener('hidden.bs.modal', function() {
                     if (!editModalEl.dataset.closedByUpdate) {
                         let viewModal = new bootstrap.Modal(viewModalEl);
                         viewModal.show();
                     }
                     // Reset after every close
                     editModalEl.dataset.closedByUpdate = "";
                 });

                 // Submit form (Update Payment)
                 $('#edit-payment-form').on('submit', function(e) {
                     e.preventDefault();

                     let form = $(this);
                     let url = form.attr('action');
                     let data = form.serialize();

                     $.ajax({
                         url: url,
                         type: 'POST',
                         data: data,
                         success: function(response) {
                             // Mark as closed by update
                             editModalEl.dataset.closedByUpdate = "true";

                             let editModal = bootstrap.Modal.getInstance(editModalEl);
                             if (editModal) editModal.hide();

                             let viewModal = new bootstrap.Modal(viewModalEl);
                             viewModal.show();

                             let body = viewModalEl.querySelector('.modal-body');
                             if (body) {
                                 let alertBox = document.createElement('div');
                                 alertBox.className =
                                     'alert alert-success alert-dismissible fade show';
                                 alertBox.role = 'alert';
                                 alertBox.innerHTML = `
        Payment updated successfully!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
                                 body.prepend(alertBox);

                                 setTimeout(() => {
                                     alertBox.classList.remove('show'); // bootstrap fade-out
                                     alertBox.addEventListener('transitionend', () =>
                                         alertBox.remove());
                                 }, 3000);
                             }


                             // DataTable reload
                             $('#payment-slip-table').DataTable().ajax.reload(null, false);
                         },
                         error: function(xhr) {
                             alert('Something went wrong!');
                         }
                     });
                 });
             });
         </script>
     @endpush
 @endsection
