 <div class="row">
     <div class="col-12">
         <div class="card">
             <div class="card-header">
                 <div class="d-sm-flex align-items-center justify-content-between">
                     <h5 class="mb-3 mb-sm-0">Subject List</h5>
                     <a data-bs-toggle="modal" data-bs-target="#add-subject-modal" href="#"
                         class="btn btn-primary">Add Subject</a>
                 </div>
             </div>
             <div class="card-body table-card">
                 <div class="table-responsive">
                     <table class="table mb-0">
                         <thead>
                             <tr>
                                 <th>Subject Name</th>
                                 <th class="text-end">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($subjects as $subject)
                                 <tr>
                                     <td>{{ $subject->name }}</td>

                                     <td class="text-end">
                                         <a href="#" data-bs-toggle="modal"
                                             data-bs-target="#edit-subject-modal-{{ $subject->id }}"
                                             class="avtar avtar-xs btn-link-secondary" title="Edit">
                                             <i class="ti ti-edit f-20"></i>
                                         </a>

                                         <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST"
                                             class="d-inline" id="delete-form-{{ $subject->id }}">
                                             @csrf
                                             @method('DELETE')
                                             <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"
                                                 data-id="{{ $subject->id }}" data-bs-toggle="modal"
                                                 data-bs-target="#delete-subject-modal-{{ $subject->id }}"
                                                 data-bs-toggle="tooltip" title="Delete">
                                                 <i class="ti ti-trash f-20"></i>
                                             </a>
                                         </form>
                                     </td>
                                 </tr>

                                 <div class="modal fade" id="edit-subject-modal-{{ $subject->id }}" tabindex="-1">
                                     <div class="modal-dialog modal-md modal-dialog-centered">
                                         <div class="modal-content">
                                             <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
                                                 @csrf
                                                 @method('PUT')

                                                 <div class="modal-header">
                                                     <h4 class="mb-0">Edit Subject</h4>
                                                     <button type="button" class="btn-close"
                                                         data-bs-dismiss="modal"></button>
                                                 </div>

                                                 <div class="modal-body">
                                                     <div class="mb-3">
                                                         <label class="form-label">Subject
                                                             Name <span class="text-danger">*</span></label>
                                                         <input type="text" name="name" class="form-control"
                                                             value="{{ old('name', $subject->name) }}">
                                                         @error('name')
                                                             <small class="text-danger">{{ $message }}</small>
                                                         @enderror
                                                     </div>
                                                 </div>

                                                 <div class="modal-footer text-end">
                                                     <button class="btn btn-primary">Update</button>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
