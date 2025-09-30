<?php

namespace App\DataTables;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class StudentDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = datatables()
            ->eloquent($query)

            ->addColumn('checkbox', function ($student) {
                $disabled = $student->status !== 'Active' ? 'disabled' : '';
                return '
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                        <input class="form-check-input student-checkbox" type="checkbox"
                            id="checkbox-' . $student->id . '"
                            data-student-id="' . $student->id . '"
                            data-status="' . $student->status . '"
                            value="' . $student->id . '"
                            onchange="handleButtonState()" ' . $disabled . ' />
                        <i class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                        <i class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                    </div>
                </div>';
            })

            ->addColumn('name_roll', function ($student) {
                $image = $student->profile_image
                    ? asset('storage/students/' . $student->profile_image)
                    : asset('assets/images/user/avatar-2.jpg');
                $profileUrl = route('students.show', $student->id);

                return '
                <a href="' . $profileUrl . '" class="text-dark text-decoration-none">
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <img src="' . $image . '" class="img-fluid rounded-circle" style="height:40px; width:40px;" />
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0">' . $student->first_name . ' ' . $student->last_name . '</h6>
                            <small class="text-truncate w-100 text-muted">Roll ' . $student->roll_no . '</small>
                        </div>
                    </div>
                </a>';
            })

            ->addColumn('admission_no', fn($student) => $student->admission_no)

            ->addColumn('class_section', function ($student) {
                $className = $student->classSection?->class?->name ?? 'N/A';
                $sectionName = $student->classSection?->section?->name ?? 'N/A';

                return '
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="mb-0">' . e($className) . '</h6>
                        <small class="text-truncate w-100 text-muted">Sec ' . e($sectionName) . '</small>
                    </div>
                </div>';
            })

            ->addColumn('parents', function ($student) {
                return '
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="mb-0">' . $student->parents_name . '</h6>
                        <small class="text-truncate w-100 text-muted">' . $student->parents_mobile . '</small>
                    </div>
                </div>';
            })

            ->addColumn('status', function ($student) {
                $badge = $student->status == 'Active' ? 'bg-light-success' : 'bg-light-danger';
                return '<span class="badge ' . $badge . '">' . $student->status . '</span>';
            })

            ->addColumn('admission_date', fn($student) => Carbon::parse($student->registration_date)->format('Y/m/d'));

        if (Auth::user()?->role === 'admin') {
            $dataTable->addColumn('added_by', function ($student) {
                return $student->user
                    ? trim($student->user->first_name . ' ' . $student->user->last_name)
                    : 'Unknown';
            });
        }

        $dataTable->addColumn('action', function ($student) {
            return '
            ' . ($student->status === 'Active'
                ? '<a href="' . route('students.vouchers.create', ['student' => $student->id]) . '" class="avtar avtar-xs btn-link-secondary single-voucher-btn" data-bs-toggle="tooltip" title="Create Voucher" data-student-id="' . $student->id . '">
                        <i class="ti ti-file-plus f-20" ></i>
                   </a>'
                : '<span class="avtar avtar-xs btn-link-secondary disabled" data-bs-toggle="tooltip" title="Inactive Student">
                        <i class="ti ti-file-plus f-20 text-muted"></i>
                   </span>') . '
            <a href="' . route('students.show', $student->id) . '" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="tooltip" title="View">
                <i class="ti ti-eye f-20" ></i>
            </a>
            <a href="' . route('students.edit', $student->id) . '" class="avtar avtar-xs btn-link-secondary" data-bs-toggle="tooltip" title="Edit">
                <i class="ti ti-edit f-20" ></i>
            </a>
            <form id="delete-form-' . $student->id . '" action="' . route('students.destroy', $student->id) . '" method="POST" style="display: none;">
                ' . csrf_field() . method_field('DELETE') . '
            </form>
            <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para" data-bs-toggle="tooltip" title="Delete" data-id="' . $student->id . '">
                <i class="ti ti-trash f-20" ></i>
            </a>';
        });

        $raw = ['checkbox', 'name_roll', 'class_section', 'parents', 'status', 'action'];
        if (Auth::user()?->role === 'admin') {
            $raw[] = 'added_by';
        }
        $dataTable->rawColumns($raw);

        $dataTable->filterColumn('name_roll', function ($query, $keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                    ->orWhere('last_name', 'like', "%{$keyword}%")
                    ->orWhere('roll_no', 'like', "%{$keyword}%");
            });
        });

        $dataTable->filterColumn('class_section', function ($query, $keyword) {
            $query->whereHas('classSection.class', fn($q) => $q->where('name', 'like', "%{$keyword}%"))
                ->orWhereHas('classSection.section', fn($q) => $q->where('name', 'like', "%{$keyword}%"));
        });

        $dataTable->filterColumn('added_by', function ($query, $keyword) {
            $query->whereHas('user', function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%")
                    ->orWhere('last_name', 'like', "%{$keyword}%");
            });
        });

        return $dataTable;
    }

    public function query(): QueryBuilder
    {
        return Student::with(['user', 'classSection.class', 'classSection.section'])
            ->select(['id', 'first_name', 'last_name', 'roll_no', 'admission_no', 'class_section_id', 'parents_name', 'parents_mobile', 'status', 'registration_date', 'profile_image', 'user_id']);
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('student-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive(true)
            ->autoWidth(false);
    }

    public function getColumns()
    {
        $columns = [
            [
                'data' => 'checkbox',
                'name' => 'checkbox',
                'title' => '
                <div class="form-check form-check-inline pc-icon-checkbox">
                    <input class="form-check-input" type="checkbox" id="bulk-checkbox" />
                    <i class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                    <i class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                </div>',
                'orderable' => false,
                'searchable' => false,
                'escape' => false,
            ],
            ['data' => 'name_roll', 'name' => null, 'title' => 'Name / Roll No'],
            ['data' => 'admission_no', 'name' => 'admission_no', 'title' => 'Admission No'],
            ['data' => 'class_section', 'name' => null, 'title' => 'Class / Sec'],
            ['data' => 'parents', 'name' => 'parents_name', 'title' => 'Parents'],
            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],
            ['data' => 'admission_date', 'name' => 'registration_date', 'title' => 'Admission Date'],
        ];

        if (Auth::user()?->role === 'admin') {
            $columns[] = ['data' => 'added_by', 'name' => null, 'title' => 'Added By'];
        }

        $columns[] = ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false];

        return $columns;
    }

    public function filename(): string
    {
        return 'Students_' . now()->format('YmdHis');
    }
}
