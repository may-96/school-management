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
                                 <li class="breadcrumb-item" aria-current="page">Class & Section</li>
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

             <div class="row">
                 <div class="col-sm-12">
                     <div class="card">
                         <div class="card-body py-0">
                             <ul class="nav nav-tabs profile-tabs" id="myTab" role="tablist">
                                 <li class="nav-item">
                                     <a class="nav-link active" id="profile-tab-1" data-bs-toggle="tab" href="#profile-1"
                                         role="tab" aria-selected="true">
                                         <i class="ti ti-school me-2"></i>Classes
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" id="profile-tab-2" data-bs-toggle="tab" href="#profile-2"
                                         role="tab" aria-selected="true">
                                         <i class="ti ti-layout-grid me-2"></i>Sections
                                     </a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" id="profile-tab-3" data-bs-toggle="tab" href="#profile-3"
                                         role="tab" aria-selected="true">
                                         <i class="ti ti-notebook me-2"></i>Subjects
                                     </a>
                                 </li>
                             </ul>
                         </div>

                     </div>
                     <div class="tab-content">
                         <div class="tab-pane show active" id="profile-1" role="tabpanel" aria-labelledby="profile-tab-1">
                             <div class="row">
                                 <div class="col-12">
                                     <div class="card">
                                         <div class="card-header d-flex align-items-center justify-content-between">
                                             <h5>Class List</h5>
                                             <a data-bs-toggle="modal" data-bs-target="#add-class-modal" href="#"
                                                 class="btn btn-primary">Add Class</a>
                                         </div>
                                         <div class="card-body">
                                             <h1>Work is Pending</h1>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="tab-pane" id="profile-2" role="tabpanel" aria-labelledby="profile-tab-2">
                             <div class="row">
                                 <div class="col-12">
                                     <div class="card">
                                         <div class="card-header">
                                             <div class="d-sm-flex align-items-center justify-content-between">
                                                 <h5 class="mb-3 mb-sm-0">Section List</h5>
                                                 <a data-bs-toggle="modal" data-bs-target="#add-section-modal"
                                                     href="#" class="btn btn-primary">Add Section</a>
                                             </div>
                                         </div>
                                         <div class="card-body">

                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="tab-pane" id="profile-3" role="tabpanel" aria-labelledby="profile-tab-3">
                             <div class="row">
                                 <div class="col-12">
                                     <div class="card">
                                         <div class="card-header">
                                             <div class="d-sm-flex align-items-center justify-content-between">
                                                 <h5 class="mb-3 mb-sm-0">Subject List</h5>
                                                 <a data-bs-toggle="modal" data-bs-target="#add-subject-modal"
                                                     href="#" class="btn btn-primary">Add Subject</a>
                                             </div>
                                         </div>
                                         <div class="card-body">

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
 @endsection
