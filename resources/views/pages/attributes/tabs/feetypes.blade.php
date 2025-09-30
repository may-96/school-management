<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h5 class="mb-3 mb-sm-0">Fee Types List</h5>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#add-fee_type-modal" class="btn btn-primary">
                        Add Fee Type
                    </a>
                </div>
            </div>

            <div class="card-body table-card">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Fee Type</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feeTypes as $feeType)
                                <tr>
                                    <td>{{ $feeType->name }}</td>
                                    <td class="text-end">
                                        {{-- Edit --}}
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#edit-fee_type-modal-{{ $feeType->id }}"
                                            class="avtar avtar-xs btn-link-secondary" title="Edit">
                                            <i class="ti ti-edit f-20"></i>
                                        </a>

                                        {{-- Delete --}}
                                        <form action="{{ route('fee-types.destroy', $feeType->id) }}" method="POST"
                                            class="d-inline" id="delete-form-{{ $feeType->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"
                                                data-id="{{ $feeType->id }}" data-bs-toggle="modal"
                                                data-bs-target="#delete-fee_type-modal-{{ $feeType->id }}"
                                                data-bs-toggle="tooltip" title="Delete">
                                                <i class="ti ti-trash f-20"></i>
                                            </a>
                                        </form>

                                    </td>
                                </tr>

                                {{-- Edit Fee Type Modal --}}
                                <div class="modal fade" id="edit-fee_type-modal-{{ $feeType->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('fee-types.update', $feeType->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-header">
                                                    <h4 class="mb-0">Edit Fee Type</h4>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Fee Type Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ old('name', $feeType->name) }}">
                                                        @error('name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                </div>

                                                <div class="modal-footer text-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
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
