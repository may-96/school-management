 <div class="row">
     <div class="col-12">
         <div class="card">
             <div class="card-header">
                 <div class="d-sm-flex align-items-center justify-content-between">
                     <h5 class="mb-3 mb-sm-0">Section List</h5>
                     <a data-bs-toggle="modal" data-bs-target="#add-section-modal" href="#"
                         class="btn btn-primary">Add Section</a>
                 </div>
             </div>
             <div class="card-body table-card">
                 <div class="table-responsive">
                     <table class="table mb-0">
                         <thead>
                             <tr>
                                 <th>Section Name</th>
                                 <th>Classes</th>
                                 <th class="text-end">Actions</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($sections as $section)
                                 <tr>
                                     <td>
                                         {{ $section->name }}

                                     </td>
                                     <td>
                                         @foreach ($section->classes as $class)
                                             <span class="badge text-bg-warning">{{ $class->name }}</span>
                                         @endforeach
                                     </td>
                                     <td class="text-end">
                                         {{-- Edit --}}
                                         <a data-bs-toggle="modal"
                                             data-bs-target="#edit-section-modal-{{ $section->id }}" href="#"
                                             class="avtar avtar-xs btn-link-secondary" title="Edit">
                                             <i class="ti ti-edit f-20"></i>
                                         </a>

                                         {{-- Delete --}}
                                         <form id="delete-form-{{ $section->id }}" method="POST"
                                             action="{{ route('sections.destroy', $section->id) }}" class="d-inline">
                                             @csrf
                                             @method('DELETE')
                                             <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"
                                                 data-id="{{ $section->id }}" data-bs-toggle="tooltip"
                                                 data-bs-placement="top" title="Delete">
                                                 <i class="ti ti-trash f-20"></i>
                                             </a>
                                         </form>
                                     </td>
                                 </tr>

                                 {{-- Edit Modal --}}
                                 <div class="modal fade" id="edit-section-modal-{{ $section->id }}" tabindex="-1">
                                     <div class="modal-dialog modal-md modal-dialog-centered">
                                         <div class="modal-content">
                                             <form action="{{ route('sections.update', $section->id) }}" method="POST">
                                                 @csrf
                                                 @method('PUT')

                                                 <div class="modal-header">
                                                     <h4 class="mb-0">Edit Section</h4>
                                                     <button type="button" class="btn-close"
                                                         data-bs-dismiss="modal"></button>
                                                 </div>

                                                 <div class="modal-body">
                                                     {{-- Section Name Input --}}
                                                     <div class="mb-3">
                                                         <label class="form-label">Section
                                                             Name <span class="text-danger">*</span></label>
                                                         <input type="text" name="section_name" class="form-control"
                                                             value="{{ old('section_name', $section->name) }}">
                                                         @error('section_name')
                                                             <small class="text-danger">{{ $message }}</small>
                                                         @enderror
                                                     </div>

                                                     {{-- Class Checkbox List --}}
                                                     <div class="mb-3">
                                                         <label class="form-label">Assign
                                                             Classes</label>
                                                         <div class="row">
                                                             @foreach ($classes as $class)
                                                                 <div class="col-md-6">
                                                                     <div class="form-check">
                                                                         <input type="checkbox" name="classes[]"
                                                                             value="{{ $class->id }}"
                                                                             class="form-check-input"
                                                                             id="class-checkbox-{{ $section->id }}-{{ $class->id }}"
                                                                             {{ $section->classes->contains($class->id) ? 'checked' : '' }}>
                                                                         <label class="form-check-label"
                                                                             for="class-checkbox-{{ $section->id }}-{{ $class->id }}">
                                                                             {{ $class->name }}
                                                                         </label>
                                                                     </div>
                                                                 </div>
                                                             @endforeach
                                                         </div>

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
