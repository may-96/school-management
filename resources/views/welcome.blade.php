   {{-- // function toggleButton(element) {
        //     const studentId = element.dataset.studentId;
        //     studentIds.push(studentId);
        //     console.log("Student ID:", studentId);
        //     let checkboxes = document.querySelectorAll(".checkboxes");
        //     let button = document.getElementById("idBtnSub");

        //     let anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);

        //     button.style.visibility = anyChecked ? "visible" : "hidden";
        // }


        // function addVoucher() {
        //     const form = document.getElementById("voucher-form");
        //     const formData = new FormData(form);

        //     // Get selected checkboxes
        //     let selectedCheckboxes = document.querySelectorAll(".checkboxes:checked");
        //     let studentIds = Array.from(selectedCheckboxes).map(cb => cb.dataset.studentId);

        //     // If no student is selected, show an alert
        //     if (studentIds.length === 0) {
        //         alert("Please select at least one student.");
        //         return;
        //     }

        //     // Prepare the data to be sent to the server
        //     let data = {
        //         student_ids: studentIds,
        //         payment_method: formData.get('payment_method'),
        //         amount: formData.get('amount'),
        //         payment_date: formData.get('payment_date'),
        //         notes: formData.get('notes'),
        //     };

        //     // Send AJAX request
        //     fetch("/students/vouchers", {
        //             method: "POST",
        //             headers: {
        //                 "Content-Type": "application/json",
        //                 "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
        //             },
        //             body: JSON.stringify(data)
        //         })
        //         .then(response => {
        //             if (!response.ok) {
        //                 throw new Error("Network response was not ok");
        //             }
        //             return response.json();
        //         })
        //         .then(data => {
        //             // Dynamically add success alert to the page
        //             const alertMessage = `
    //     <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
    //         ${data.message}
    //         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    //     </div>`;

        //             // Insert the alert message into the page
        //             document.body.insertAdjacentHTML('afterbegin', alertMessage);

        //             // Auto-close the alert after 2 seconds
        //             setTimeout(function() {
        //                 let alert = document.getElementById('success-alert');
        //                 if (alert) {
        //                     let bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
        //                     bsAlert.close();
        //                 }
        //             }, 2000);

        //             // Reload the page after a short delay (1 second)
        //             setTimeout(() => {
        //                 location.reload();
        //             }, 1000);
        //         })
        //         .catch(error => {
        //             console.error("Error:", error);
        //             alert("Something went wrong.");
        //         });
        // } --}}




   {{-- <table class="table table-hover" id="pc-dt-simple">
                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Name / Roll No</th>
                                            <th>Admission NO</th>
                                            <th>Class / Section</th>
                                            <th>Parents</th>
                                            <th>Status</th>
                                            <th>Admission Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                                                            <input onChange="toggleButton(this);"
                                                                class="form-check-input checkboxes" type="checkbox"
                                                                id="checkbox-{{ $student->id }}"
                                                                data-student-id="{{ $student->id }}" />
                                                            <i
                                                                class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                                                            <i
                                                                class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                                                            <input type="hidden" id="student-id" name="student_id"
                                                                value="">
                                                        </div>

                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <a href="{{ route('student.show', $student->id) }}">
                                                                @if ($student->profile_image)
                                                                    <img src="{{ asset('storage/students/' . $student->profile_image) }}"
                                                                        alt="img" class="img-fluid rounded-circle"
                                                                        style="height:40px; width:40px;" />
                                                                @else
                                                                    <img src="{{ asset('assets/images/user/avatar-1.jpg') }}"
                                                                        alt="img" class="img-fluid rounded-circle"
                                                                        style="height:40px; width:40px;" />
                                                                @endif
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-0">{{ $student->first_name }}
                                                                {{ $student->last_name }}</h6>
                                                            <small class="text-truncate w-100 text-muted">Roll
                                                                {{ $student->roll_no }}</small>
                                                        </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>{{ $student->admission_no }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-0">{{ $student->class }}</h6>
                                                            <small class="text-truncate w-100 text-muted">Sec
                                                                {{ $student->section }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <h6 class="mb-0">{{ $student->parents_name }}</h6>
                                                            <small
                                                                class="text-truncate w-100 text-muted">{{ $student->parents_mobile }}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span
                                                        class="badge {{ $student->status == 'Active' ? 'bg-light-success' : 'bg-light-danger' }}">
                                                        {{ $student->status }}
                                                    </span>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($student->registration_date)->format('Y/m/d') }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('student.show', $student->id) }}"
                                                        class="avtar avtar-xs btn-link-secondary">
                                                        <i class="ti ti-eye f-20"></i>
                                                    </a>
                                                    <a href="{{ route('student.edit', $student->id) }}"
                                                        class="avtar avtar-xs btn-link-secondary">
                                                        <i class="ti ti-edit f-20"></i>
                                                    </a>
                                                    <form id="delete-form-{{ $student->id }}"
                                                        action="{{ route('student.destroy', $student->id) }}"
                                                        method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                    <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"
                                                        data-id="{{ $student->id }}">
                                                        <i class="ti ti-trash f-20"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table> --}}




   {{-- @extends('layouts.master')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Students</a></li>
                                <li class="breadcrumb-item" aria-current="page">List</li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Students List</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Success Alert --}}
   @if (session('success'))
       <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
           {{ session('success') }}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>

       <script>
           setTimeout(function() {
               let alert = document.getElementById('success-alert');
               if (alert) {
                   let bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                   bsAlert.close();
               }
           }, 2000);
       </script>
   @endif

   {{-- Error Alert --}}
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
       <div class="col-12">
           <div class="card table-card">
               <div class="card-header">
                   <div class="d-sm-flex align-items-center justify-content-between">
                       <h5 class="mb-3 mb-sm-0">Student list</h5>
                       <div>
                           <a href="#" class="btn btn-outline-secondary d-inline-flex" id="idBtnSub"
                               style="visibility: hidden;">
                               <i class="ph-duotone ph-plus-circle me-1"></i>Create Fee Voucher
                           </a>
                           <a href="{{ route('student.create') }}" class="btn btn-primary">Add Student</a>
                       </div>
                   </div>
               </div>
               <div class="card-body pt-3">
                   <div class="table-responsive">
                       {!! $dataTable->table(['class' => 'table table-hover table-bordered'], true) !!}
                   </div>
               </div>
           </div>
       </div>
   </div>
   </div>
   </div>

   {{-- JS for Button Visibility --}}
   <script>
       $(document).on('click', '#bulk-checkbox', function() {
           $('.student-checkbox').prop('checked', this.checked);
           handleButtonState();
       });

       $(document).on('change', '.student-checkbox', function() {
           handleButtonState();
       });

       function handleButtonState() {
           const button = document.getElementById("idBtnSub");
           const checkedBoxes = $('.student-checkbox:checked');

           if (checkedBoxes.length === 1) {
               const studentId = checkedBoxes.first().data('student-id');
               button.href = `/voucher/create/${studentId}`;
               button.style.visibility = "visible";
           } else if (checkedBoxes.length > 1) {
               button.href = "#"; // Optional: Set this to a bulk voucher route
               button.style.visibility = "visible";
           } else {
               button.href = "#";
               button.style.visibility = "hidden";
           }
       }
   </script>
{{-- @endsection --}}

{{-- @push('scripts') --}}
   {{-- Yajra DataTables Scripts --}}
   {{-- {!! $dataTable->scripts() !!} --}}

   {{-- Delete Confirmation --}}
   {{-- <script>
       document.addEventListener('DOMContentLoaded', function() {
           document.querySelectorAll('.bs-pass-para').forEach(function(element) {
               element.addEventListener('click', function(e) {
                   e.preventDefault();
                   const id = this.getAttribute('data-id');
                   if (confirm('Are you sure you want to delete this student?')) {
                       document.getElementById('delete-form-' + id).submit();
                   }
               });
           });
       });
   </script> --}}
{{-- @endpush --}}
