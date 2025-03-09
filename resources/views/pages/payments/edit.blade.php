 @extends('layouts.master')

 @section('content')
     <div class="pc-container">
         <div class="pc-content">
             <div class="page-header">
                 <div class="page-block">
                     <div class="row align-items-center">
                         <div class="col-md-12">
                             <ul class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="#">Home</a></li>
                                 <li class="breadcrumb-item"><a href="javascript: void(0)">Student Fees</a></li>
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


             <div class="row">
                 <div class="col-sm-12">
                     <div class="card">
                         <div class="card-body">
                             <div class="row g-3">
                                <div class="col-12">
                                    <div class="row align-items-center g-3">
                                        <div class="col-sm-6">
                                            <div class="m-0">
                                                <p class="f-w-400 mb-1 text-start">Admission No : <span
                                                        class="f-w-600 mb-1 text-end">AD837568378</span></p>
                                                <p class="f-w-400 mb-1 text-start">Student Name : <span
                                                        class="f-w-600 mb-1 text-end">Saqib Din</span></p>
                                                <p class="f-w-400 mb-1 text-start">Father Name : <span
                                                        class="f-w-600 mb-1 text-end">Muhammad Khan</span></p>
                                                <p class="f-w-400 mb-1 text-start">Class / Section : <span
                                                        class="f-w-600 mb-1 text-end">10th Green</span></p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 text-sm-end">
                                            <h6>Due Date :<span class="text-muted f-w-600">10/8/2023</span></h6>
                                            <p class="f-w-400 mb-1 text-end">INV ID - <span
                                                    class="text-muted f-w-600">23452353</span></p>
                                            <span class="badge bg-light-success rounded-pill ms-2">Paid</span>

                                        </div>
                                    </div>
                                </div>


                                 <div class="col-12">
                                     <h5>Detail</h5>
                                     <div class="table-responsive">
                                         <table class="table table-hover mb-0">
                                             <thead>
                                                 <tr>
                                                     <th>#</th>
                                                     <th><span class="text-danger">*</span>Fees Type</th>
                                                     <th><span class="text-danger">*</span>Fees</th>
                                                     <th class="text-center">Action</th>
                                                 </tr>
                                             </thead>
                                             <tbody>

                                             </tbody>
                                         </table>
                                     </div>
                                     <div class="text-start">
                                         <hr class="mb-4 mt-0 border-secondary border-opacity-50" />
                                         <button class="btn btn-light-primary d-flex align-items-center gap-2"><i
                                                 class="ti ti-plus"></i> Add new item</button>
                                     </div>
                                 </div>
                                 <script>
                                     document.addEventListener("DOMContentLoaded", function() {
                                         // Button ko select karo
                                         let addButton = document.querySelector(".btn-light-primary");

                                         addButton.addEventListener("click", function() {
                                             let tableBody = document.querySelector("tbody");

                                             // New row ka HTML
                                             let newRow = document.createElement("tr");
                                             newRow.innerHTML = `
                                                <td>#</td>
                                                <td>
                                                    <select class="form-select" id="exampleFormControlSelect1">
                                                    <option>Please Select</option>
                                                    <option selected>Admission Fees</option>
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
                                                <td><input type="number" class="form-control" placeholder="Fees" /></td>
                                                <td class="text-center">
                                                    <a href="#" class="avtar avtar-s btn-link-danger btn-pc-default remove-item">
                                                        <i class="ti ti-trash f-20"></i>
                                                    </a>
                                                </td>
                                            `;

                                             // Row add karo table me
                                             tableBody.appendChild(newRow);

                                             // Row numbers ko update karne ka function call karo
                                             updateRowNumbers();
                                         });

                                         // Delete button ka event listener add karna (event delegation use kiya gaya hai)
                                         document.querySelector("tbody").addEventListener("click", function(e) {
                                             if (e.target.closest(".remove-item")) {
                                                 e.preventDefault();
                                                 e.target.closest("tr").remove();
                                                 updateRowNumbers();
                                             }
                                         });

                                         // Row numbers ko update karne ka function
                                         function updateRowNumbers() {
                                             let rows = document.querySelectorAll("tbody tr");
                                             rows.forEach((row, index) => {
                                                 row.querySelector("td:first-child").textContent = index + 1;
                                             });
                                         }
                                     });
                                 </script>
                                 <div class="col-12">
                                     <div class="invoice-total ms-auto">
                                         <div class="row">

                                             <div class="col-6">
                                                 <p class="f-w-600 mb-1 text-start">Grand Total :</p>
                                             </div>
                                             <div class="col-6">
                                                 <p class="f-w-600 mb-1 text-end">$25.00</p>
                                             </div>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-12">
                                     <div class="row align-items-end justify-content-end g-3">

                                         <div class="col-sm-auto btn-page">

                                             <a href="{{ route('payment.show') }}" class="btn btn-primary">Update</a>
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
