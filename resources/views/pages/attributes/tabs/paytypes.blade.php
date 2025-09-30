<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between">
                    <h5 class="mb-3 mb-sm-0">Pay Types List</h5>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#add-pay_type-modal" class="btn btn-primary">
                        Add Pay Type
                    </a>
                </div>
            </div>

            <div class="card-body table-card">
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>Pay Type</th>
                                <th>Is Deductible?</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($payTypes as $payType)
                                <tr>
                                    <td>{{ $payType->name }}</td>
                                    <td>
                                        @if ($payType->is_deductible)
                                            <span class="badge bg-light-danger">Yes</span>
                                        @else
                                            <span class="badge bg-light-success">No</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        @if ($payType->name !== 'Basic Salary')
                                            {{-- Edit --}}
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#edit-pay_type-modal-{{ $payType->id }}"
                                                class="avtar avtar-xs btn-link-secondary" title="Edit">
                                                <i class="ti ti-edit f-20"></i>
                                            </a>

                                            {{-- Delete --}}
                                            <form action="{{ route('pay-types.destroy', $payType->id) }}" method="POST"
                                                class="d-inline" id="delete-form-{{ $payType->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"
                                                    data-id="{{ $payType->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#delete-pay_type-modal-{{ $payType->id }}"
                                                    data-bs-toggle="tooltip" title="Delete">
                                                    <i class="ti ti-trash f-20"></i>
                                                </a>
                                            </form>
                                        @else
                                            <span class="badge bg-light-warning">Default</span>
                                        @endif

                                    </td>
                                </tr>

                                {{-- Edit Pay Type Modal --}}
                                <div class="modal fade" id="edit-pay_type-modal-{{ $payType->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-md modal-dialog-centered">
                                        <div class="modal-content">
                                            <form action="{{ route('pay-types.update', $payType->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="modal-header">
                                                    <h4 class="mb-0">Edit Pay Type</h4>
                                                    <button type="button" class="btn-close"
                                                        data-bs-dismiss="modal"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Pay Type Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ old('name', $payType->name) }}" required>
                                                        @error('name')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" value="1"
                                                            id="confirm-{{ $payType->id }}" name="confirm"
                                                            {{ $payType->is_deductible ? 'checked' : '' }}>
                                                        <label class="form-check-label"
                                                            for="confirm-{{ $payType->id }}">
                                                            Is this deductible type?
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="modal-footer text-end">
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                {{-- <tr>
                                    <td colspan="3" class="text-center">No Pay Types found.</td>
                                </tr> --}}
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
