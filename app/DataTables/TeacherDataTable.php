<?php

namespace App\DataTables;

use App\Models\Teacher;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TeacherDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->filterColumn('name', function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('first_name', 'like', "%{$keyword}%")
                        ->orWhere('last_name', 'like', "%{$keyword}%")
                        ->orWhere('email', 'like', "%{$keyword}%");
                });
            })
            ->filterColumn('department_class', function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('department', 'like', "%{$keyword}%")
                        ->orWhere('class', 'like', "%{$keyword}%");
                });
            })
            ->addColumn('name', function ($teacher) {
                $image = $teacher->profile_image
                    ? asset('storage/teachers/' . $teacher->profile_image)
                    : asset('assets/images/user/avatar-1.jpg');

                return '
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <a href="' . route('teacher.show', $teacher->id) . '">
                                <img src="' . $image . '" alt="img" class="img-fluid rounded-circle" style="height:40px; width:40px;" />
                            </a>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-0">' . $teacher->first_name . ' ' . $teacher->last_name . '</h6>
                            <small class="text-truncate w-100 text-muted">' . $teacher->email . '</small>
                        </div>
                    </div>';
            })
            ->addColumn('department_class', function ($teacher) {
                return '
                    <div class="flex-grow-1">
                        <h6 class="mb-0">' . $teacher->department . '</h6>
                        <small class="text-truncate w-100 text-muted">' . $teacher->class . '</small>
                    </div>';
            })
            ->addColumn('action', function ($teacher) {
                return '
                    <a href="' . route('teacher.show', $teacher->id) . '" class="avtar avtar-xs btn-link-secondary">
                        <i class="ti ti-eye f-20"></i>
                    </a>
                    <a href="' . route('teacher.edit', $teacher->id) . '" class="avtar avtar-xs btn-link-secondary">
                        <i class="ti ti-edit f-20"></i>
                    </a>
                    <form id="delete-form-' . $teacher->id . '" action="' . route('teacher.destroy', $teacher->id) . '" method="POST" style="display: none;">
                        ' . csrf_field() . method_field('DELETE') . '
                    </form>
                    <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para" data-id="' . $teacher->id . '">
                        <i class="ti ti-trash f-20"></i>
                    </a>';
            })
            ->rawColumns(['name', 'department_class', 'action']);
    }

    public function query(Teacher $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('teacher-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive()
            ->autoWidth(false)
            ->orderBy(0);
    }

    protected function getColumns()
    {
        return [
            Column::computed('name')
                ->title('Name')
                ->exportable(false)
                ->printable(false)
                ->searchable(true)
                ->addClass('text-left'),

            Column::computed('department_class')
                ->title('Departments / Class')
                ->exportable(false)
                ->printable(false)
                ->searchable(true),

            Column::make('education'),
            Column::make('mobile_number')->title('Mobile'),
            Column::make('joining_date'),

            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    protected function filename(): string
    {
        return 'Teachers_' . date('YmdHis');
    }
}
