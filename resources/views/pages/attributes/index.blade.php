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
                                 <li class="breadcrumb-item" aria-current="page">Attributes</li>
                             </ul>
                         </div>
                         <div class="col-md-12">
                             <div class="page-header-title">
                                 <h2 class="mb-0">List</h2>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

            <x-alerts />

             {{-- @if (session('error'))
                 <div class="alert alert-danger">
                     {{ session('error') }}
                 </div>
             @endif --}}


             <div class="row">
                 <div class="col-sm-12">
                     <div class="card">
                         <div class="card-body py-0">
                             <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">

                                 <li class="nav-item">
                                     <a class="nav-link {{ session('active_tab', 'profile-1') == 'profile-1' ? 'active' : '' }}"
                                         id="profile-tab-1" data-bs-toggle="tab" href="#profile-1" role="tab"
                                         aria-selected="{{ session('active_tab', 'profile-1') == 'profile-1' ? 'true' : 'false' }}">
                                         <i class="ti ti-school me-2"></i>Classes
                                     </a>
                                 </li>

                                 <li class="nav-item">
                                     <a class="nav-link {{ session('active_tab') == 'profile-2' ? 'active' : '' }}"
                                         id="profile-tab-2" data-bs-toggle="tab" href="#profile-2" role="tab"
                                         aria-selected="{{ session('active_tab') == 'profile-2' ? 'true' : 'false' }}">
                                         <i class="ti ti-layout-grid me-2"></i>Sections
                                     </a>
                                 </li>

                                 <li class="nav-item">
                                     <a class="nav-link {{ session('active_tab') == 'profile-3' ? 'active' : '' }}"
                                         id="profile-tab-3" data-bs-toggle="tab" href="#profile-3" role="tab"
                                         aria-selected="{{ session('active_tab') == 'profile-3' ? 'true' : 'false' }}">
                                         <i class="ti ti-notebook me-2"></i>Subjects
                                     </a>
                                 </li>

                                 <li class="nav-item">
                                     <a class="nav-link {{ session('active_tab') == 'profile-4' ? 'active' : '' }}"
                                         id="profile-tab-4" data-bs-toggle="tab" href="#profile-4" role="tab"
                                         aria-selected="{{ session('active_tab') == 'profile-4' ? 'true' : 'false' }}">
                                         <i class="ti ti-receipt me-2"></i>Fee Types
                                     </a>
                                 </li>

                                 <li class="nav-item">
                                     <a class="nav-link {{ session('active_tab') == 'profile-5' ? 'active' : '' }}"
                                         id="profile-tab-5" data-bs-toggle="tab" href="#profile-5" role="tab"
                                         aria-selected="{{ session('active_tab') == 'profile-5' ? 'true' : 'false' }}">
                                         <i class="ti ti-coin me-2"></i>Pay Types
                                     </a>
                                 </li>

                             </ul>
                         </div>

                     </div>
                     <div class="tab-content">

                         <div class="tab-pane fade {{ session('active_tab', 'profile-1') == 'profile-1' ? 'show active' : '' }}"
                             id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                             @include('pages.attributes.tabs.classes')
                         </div>

                         <div class="tab-pane fade {{ session('active_tab') == 'profile-2' ? 'show active' : '' }}"
                             id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
                             @include('pages.attributes.tabs.sections')
                         </div>

                         <div class="tab-pane fade {{ session('active_tab') == 'profile-3' ? 'show active' : '' }}"
                             id="profile-3" role="tabpanel" aria-labelledby="profile-tab-3">
                             @include('pages.attributes.tabs.subjects')
                         </div>

                         <div class="tab-pane fade {{ session('active_tab') == 'profile-4' ? 'show active' : '' }}"
                             id="profile-4" role="tabpanel" aria-labelledby="profile-tab-4">
                             @include('pages.attributes.tabs.feetypes')
                         </div>

                         <div class="tab-pane fade {{ session('active_tab') == 'profile-5' ? 'show active' : '' }}"
                             id="profile-5" role="tabpanel" aria-labelledby="profile-tab-5">
                             @include('pages.attributes.tabs.paytypes')
                         </div>


                     </div>
                 </div>
             </div>
         </div>
     </div>

     {{-- add class modal --}}
     <div class="modal fade" id="add-class-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog modal-md modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header justify-content-between">
                     <h4 class="mb-0">Add Class</h4>
                     <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal">
                         <i class="ti ti-x f-20"></i>
                     </a>
                 </div>
                 <div class="modal-body">
                     <form action="{{ route('classes.store') }}" method="POST">
                         @csrf
                         <div class="mb-3">
                             <label class="form-label">Class Name <span class="text-danger">*</span></label>
                             <input type="text" name="class_name" class="form-control" placeholder="Enter class name"
                                 value="{{ old('class_name') }}">
                             @error('class_name')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>

                         <div class="mb-3">
                             <label class="form-label">Assign Sections:</label><br>
                             <div class="row">
                                 @foreach ($sections as $section)
                                     <div class="col-md-6">
                                         <div class="form-check">
                                             <input type="checkbox" name="sections[]" value="{{ $section->id }}"
                                                 class="form-check-input" id="section-checkbox-{{ $section->id }}">
                                             <label class="form-check-label" for="section-checkbox-{{ $section->id }}">
                                                 {{ $section->name }}
                                             </label>
                                         </div>
                                     </div>
                                 @endforeach
                             </div>

                         </div>

                         <div class="text-end">
                             <button class="btn btn-primary">Add</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>

     {{-- add section modal --}}
     <div class="modal fade" id="add-section-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog modal-md modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header justify-content-between">
                     <h4 class="mb-0">Add Section</h4>
                     <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal">
                         <i class="ti ti-x f-20"></i>
                     </a>
                 </div>
                 <div class="modal-body">
                     <form action="{{ route('sections.store') }}" method="POST">
                         @csrf
                         <div class="mb-3">
                             <label class="form-label">Section Name <span class="text-danger">*</span></label>
                             <input type="text" name="section_name" class="form-control"
                                 placeholder="Enter section name" value="{{ old('section_name') }}">
                             @error('section_name')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>

                         <div class="mb-3">
                             <label class="form-label">Assign Classes:</label><br>
                             <div class="row">
                                 @foreach ($classes as $class)
                                     <div class="col-md-6">
                                         <div class="form-check">
                                             <input type="checkbox" name="classes[]" value="{{ $class->id }}"
                                                 class="form-check-input" id="class_{{ $class->id }}">
                                             <label class="form-check-label"
                                                 for="class_{{ $class->id }}">{{ $class->name }}</label>
                                         </div>
                                     </div>
                                 @endforeach
                             </div>
                         </div>

                         <div class="text-end">
                             <button class="btn btn-primary">Add</button>
                         </div>
                     </form>

                 </div>
             </div>
         </div>
     </div>

     {{-- add subject modal --}}
     <div class="modal fade" id="add-subject-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog modal-md modal-dialog-centered">
             <div class="modal-content">
                 <div class="modal-header justify-content-between">
                     <h4 class="mb-0">Add Subject</h4>
                     <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal">
                         <i class="ti ti-x f-20"></i>
                     </a>
                 </div>
                 <div class="modal-body">
                     <form action="{{ route('subjects.store') }}" method="POST">
                         @csrf
                         <div class="mb-3">
                             <label class="form-label">Subject Name <span class="text-danger">*</span></label>
                             <input type="text" name="name" class="form-control" placeholder="Enter subject name"
                                 value="{{ old('name') }}">
                             @error('name')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>

                         <div class="text-end">
                             <button class="btn btn-primary">Add</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>

     {{-- add fee_type modal --}}
     <div class="modal fade" id="add-fee_type-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog modal-md modal-dialog-centered">
             <div class="modal-content">

                 <div class="modal-header justify-content-between">
                     <h4 class="mb-0">Add Fee Type</h4>
                     <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal">
                         <i class="ti ti-x f-20"></i>
                     </a>
                 </div>

                 <div class="modal-body">
                     <form action="{{ route('fee-types.store') }}" method="POST">
                         @csrf

                         <div class="mb-3">
                             <label class="form-label">Fee Type Name <span class="text-danger">*</span></label>
                             <input type="text" name="name" class="form-control" placeholder="Enter fee type name"
                                 value="{{ old('name') }}">
                             @error('name')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>
                         <div class="text-end">
                             <button type="submit" class="btn btn-primary">Add</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>

     {{-- add pay_type modal --}}
     <div class="modal fade" id="add-pay_type-modal" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
         <div class="modal-dialog modal-md modal-dialog-centered">
             <div class="modal-content">

                 <div class="modal-header justify-content-between">
                     <h4 class="mb-0">Add Pay Type</h4>
                     <a href="#" class="avtar avtar-s btn-link-danger" data-bs-dismiss="modal">
                         <i class="ti ti-x f-20"></i>
                     </a>
                 </div>

                 <div class="modal-body">
                     <form action="{{ route('pay-types.store') }}" method="POST">
                         @csrf

                         <div class="mb-3">
                             <label class="form-label">Pay Type Name <span class="text-danger">*</span></label>
                             <input type="text" name="name" class="form-control" placeholder="Enter pay type name"
                                 value="{{ old('name') }}" required>
                             @error('name')
                                 <small class="text-danger">{{ $message }}</small>
                             @enderror
                         </div>

                         <div class="form-check mb-3">
                             <input class="form-check-input" type="checkbox" value="1" id="confirm"
                                 name="confirm">
                             <label class="form-check-label" for="confirm">
                                 Is this deductible type?
                             </label>
                         </div>

                         <div class="text-end">
                             <button type="submit" class="btn btn-primary">Add</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>

     {{-- Error Handling Script --}}
     @if ($errors->has('class_name'))
         <script>
             document.addEventListener("DOMContentLoaded", function() {
                 var modal = new bootstrap.Modal(document.getElementById('add-class-modal'));
                 modal.show();
             });
         </script>
     @endif

     @if ($errors->has('section_name'))
         <script>
             document.addEventListener("DOMContentLoaded", function() {
                 var modal = new bootstrap.Modal(document.getElementById('add-section-modal'));
                 modal.show();
             });
         </script>
     @endif

     <script>
         document.querySelectorAll('.modal').forEach(function(modalEl) {
             modalEl.addEventListener('hidden.bs.modal', function() {
                 modalEl.querySelectorAll('.text-danger').forEach(el => el.remove());

                 if (modalEl.id.includes('add-')) {
                     modalEl.querySelectorAll('input, textarea, select').forEach(el => {
                         if (el.type === 'checkbox' || el.type === 'radio') {
                             el.checked = false;
                         } else {
                             el.value = '';
                         }
                     });
                 }
             });
         });
     </script>

     {{-- Tooltip Initialization --}}
     <script>
         document.addEventListener("DOMContentLoaded", function() {
             const tooltipTriggerList = [].slice.call(document.querySelectorAll('[title]'));
             tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                 new bootstrap.Tooltip(tooltipTriggerEl);
             });
         });
     </script>
 @endsection
