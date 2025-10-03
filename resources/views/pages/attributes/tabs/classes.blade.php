<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5>Class List</h5>
                <a data-bs-toggle="modal" data-bs-target="#add-class-modal" href="#" class="btn btn-primary">Add
                    Class</a>
            </div>
            <div class="card-body table-card">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Class Name</th>
                                <th>Sections</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classes as $class)
                                <tr>
                                    <td>
                                        {{ $class->name }}
                                    </td>
                                    <td>
                                        @foreach ($class->sections as $section)
                                            <span class="badge badge text-bg-success">{{ $section->name }}</span>
                                        @endforeach
                                    </td>
                                    <td class="text-end">
                                        {{-- Edit --}}
                                        <a data-bs-toggle="modal" data-bs-target="#edit-class-modal-{{ $class->id }}"
                                            href="#" class="avtar avtar-xs btn-link-secondary" title="Edit">
                                            <i class="ti ti-edit f-20"></i>
                                        </a>

                                        {{-- Delete --}}
                                        <form id="delete-form-{{ $class->id }}" method="POST"
                                            action="{{ route('classes.destroy', $class->id) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"
                                                data-id="{{ $class->id }}" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Delete">
                                                <i class="ti ti-trash f-20"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>

                                {{-- Edit Modal --}}
                                <div class="modal fade" id="edit-class-modal-{{ $class->id }}" tabindex="-1">
                                    <div class="modal-dialog modal-md modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('classes.update', $class->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-header">
                                                    <h4 class="mb-0">Edit Class</h4>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    {{-- Class Name --}}
                                                    <div class="mb-3">
                                                        <label class="form-label">Class
                                                            Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="class_name" class="form-control"
                                                            value="{{ old('class_name', $class->name) }}">
                                                        @error('class_name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    {{-- Section Checkboxes --}}
                                                    <div class="mb-3">
                                                        <label class="form-label">Assign
                                                            Sections</label>
                                                        <div class="row">
                                                            @foreach ($sections as $section)
                                                                <div class="col-md-6">
                                                                    <div class="form-check">
                                                                        <input type="checkbox" name="sections[]"
                                                                            value="{{ $section->id }}"
                                                                            class="form-check-input"
                                                                            id="section-{{ $class->id }}-{{ $section->id }}"
                                                                            {{ $class->sections->contains($section->id) ? 'checked' : '' }}>
                                                                        <label class="form-check-label"
                                                                            for="section-{{ $class->id }}-{{ $section->id }}">
                                                                            {{ $section->name }}
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
