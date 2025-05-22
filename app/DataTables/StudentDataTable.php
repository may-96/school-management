<?php

namespace App\DataTables;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
// use Yajra\DataTables\EloquentDataTable;
// use Yajra\DataTables\Html\Builder as HtmlBuilder;
// use Yajra\DataTables\Html\Button;
// use Yajra\DataTables\Html\Column;
// use Yajra\DataTables\Html\Editor\Editor;
// use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class StudentDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('checkbox', function ($student) {
                return '
                <div class="d-flex align-items-center">
                    <div class="form-check form-check-inline m-0 pc-icon-checkbox">
                        <input
                            class="form-check-input student-checkbox"
                            type="checkbox"
                            id="checkbox-' . $student->id . '"
                            data-student-id="' . $student->id . '"
                            value="' . $student->id . '"
                            onchange="handleButtonState()"
                        />
                        <i class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                        <i class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                    </div>
                </div>';
            })
            ->addColumn('name_roll', function ($student) {
                $image = $student->profile_image
                    ? asset('storage/students/' . $student->profile_image)
                    : asset('assets/images/user/avatar-1.jpg');

                return '
                <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                        <a href="' . route('student.show', $student->id) . '">
                            <img src="' . $image . '" class="img-fluid rounded-circle" style="height:40px; width:40px;" />
                        </a>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-0">' . $student->first_name . ' ' . $student->last_name . '</h6>
                        <small class="text-truncate w-100 text-muted">Roll ' . $student->roll_no . '</small>
                    </div>
                </div>';
            })
            ->addColumn('admission_no', fn($student) => $student->admission_no)
            ->addColumn('class_section', function ($student) {
                return '
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="mb-0">' . $student->class . '</h6>
                        <small class="text-truncate w-100 text-muted">Sec ' . $student->section . '</small>
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
            ->addColumn('admission_date', fn($student) => Carbon::parse($student->registration_date)->format('Y/m/d'))
            ->addColumn('action', function ($student) {
                return '
                <a href="' . route('student.show', $student->id) . '" class="avtar avtar-xs btn-link-secondary">
                    <i class="ti ti-eye f-20"></i>
                </a>
                <a href="' . route('student.edit', $student->id) . '" class="avtar avtar-xs btn-link-secondary">
                    <i class="ti ti-edit f-20"></i>
                </a>
                <form id="delete-form-' . $student->id . '" action="' . route('student.destroy', $student->id) . '" method="POST" style="display: none;">
                    ' . csrf_field() . method_field('DELETE') . '
                </form>
                <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para" data-id="' . $student->id . '">
                    <i class="ti ti-trash f-20"></i>
                </a>';
            })
            ->rawColumns(['checkbox', 'name_roll', 'class_section', 'parents', 'status', 'action']);
    }

    public function query(): QueryBuilder
    {
        return Student::select([
            'id',
            'first_name',
            'last_name',
            'roll_no',
            'admission_no',
            'class',
            'section',
            'parents_name',
            'parents_mobile',
            'status',
            'registration_date',
            'profile_image'
        ]);
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
        return [
            [
                'data' => 'checkbox',
                'name' => 'checkbox',
                'title' => '
        <div class="form-check form-check-inline pc-icon-checkbox">
            <input class="form-check-input" type="checkbox" id="bulk-checkbox" />
            <i class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
            <i class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
        </div>
    ',
                'orderable' => false,
                'searchable' => false,
                'escape' => false,
            ],

            ['data' => 'name_roll', 'name' => 'first_name', 'title' => 'Name / Roll No', 'searchable' => true],

            ['data' => 'admission_no', 'name' => 'admission_no', 'title' => 'Admission No'],

            ['data' => 'class_section', 'name' => 'class', 'title' => 'Class / Section'],

            ['data' => 'parents', 'name' => 'parents_name', 'title' => 'Parents'],

            ['data' => 'status', 'name' => 'status', 'title' => 'Status'],

            ['data' => 'admission_date', 'name' => 'registration_date', 'title' => 'Admission Date'],

            ['data' => 'action', 'name' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false],
        ];
    }

    public function filename(): string
    {
        return 'Students_' . date('YmdHis');
    }
}
