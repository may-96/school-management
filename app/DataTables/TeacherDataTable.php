<?php

namespace App\DataTables;

use App\Models\Teacher;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class TeacherDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = datatables()
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
                    $q->where('department', 'like', "%{$keyword}%")->orWhere('class', 'like', "%{$keyword}%");
                });
            })
            ->addColumn('name', function ($teacher) {
                $image = $teacher->profile_image
                    ? asset('storage/teachers/' . $teacher->profile_image)
                    : asset('assets/images/user/avatar-5.jpg');

                $route = route('teachers.show', $teacher->id);

                return '
        <a href="' . $route . '" class="text-decoration-none text-dark">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <img src="' . $image . '" alt="img" class="img-fluid rounded-circle" style="height:40px; width:40px;" />
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="mb-0">' . $teacher->first_name . ' ' . $teacher->last_name . '</h6>
                    <small class="text-truncate w-100 text-muted">' . $teacher->email . '</small>
                </div>
            </div>
        </a>';
            })

            ->filterColumn('department_class', function ($query, $keyword) {
                $query->where('department', 'like', "%{$keyword}%");
            })

            ->addColumn('department_class', function ($teacher) {
                return '
        <div class="flex-grow-1">
            <h6 class="mb-0">' . $teacher->department . '</h6>
        </div>';
            })

            ->addColumn('status', function ($teacher) {
                $badge = $teacher->status == 'Active' ? 'bg-light-success' : 'bg-light-danger';
                return '<span class="badge ' . $badge . '">' . $teacher->status . '</span>';
            });

        if (Auth::user() && Auth::user()->role === 'admin') {
            $dataTable->addColumn('added_by', function ($teacher) {
                if ($teacher->user) {
                    return trim($teacher->user->first_name . ' ' . $teacher->user->last_name);
                }
                return 'Unknown';
            });
        }

        $dataTable->addColumn('action', function ($teacher) {
            return '

             <a href="#" 
           class="avtar avtar-xs btn-link-secondary open-modal" data-bs-hover="tooltip" data-bs-placement="top" title="Assign"
           data-bs-toggle="modal" 
           data-bs-target="#add-teacher-assign-modal"
           data-teacher-id="' . $teacher->id . '">
            <i class="ti ti-arrow-right-circle f-20" ></i>
        </a>

            ' . ($teacher->status === 'Active'
                ? '<a href="' . route('payrolls.create.single', ['employee_type' => 'teacher', 'employee_id' => $teacher->id]) . '" 
          class="avtar avtar-xs btn-link-secondary" 
          data-bs-hover="tooltip" 
          title="Create Payroll">
            <i class="ti ti-cash f-20"></i>
       </a>'
                : '<span class="avtar avtar-xs btn-link-secondary disabled" 
            data-bs-hover="tooltip" 
            title="Inactive Teacher">
            <i class="ti ti-cash f-20 text-muted"></i>
       </span>') . '

        <a href="' . route('teachers.show', $teacher->id) . '" class="avtar avtar-xs btn-link-secondary" data-bs-hover="tooltip" data-bs-placement="top" title="View">
            <i class="ti ti-eye f-20" ></i>
        </a>

        <a href="' . route('teachers.edit', $teacher->id) . '" class="avtar avtar-xs btn-link-secondary"  data-bs-hover="tooltip" data-bs-placement="top" title="Edit">
            <i class="ti ti-edit f-20"></i>
        </a>

        <form id="delete-form-' . $teacher->id . '" action="' . route('teachers.destroy', $teacher->id) . '" method="POST" style="display: none;">
            ' . csrf_field() . method_field('DELETE') . '
        </form>

        <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para" data-bs-hover="tooltip" data-bs-placement="top" title="Delete" data-id="' . $teacher->id . '">
            <i class="ti ti-trash f-20" ></i>
        </a>';
        });


        $rawCols = ['name', 'department_class', 'status', 'action'];
        if (Auth::user() && Auth::user()->role === 'admin') {
            $rawCols[] = 'added_by';
        }

        return $dataTable->rawColumns($rawCols);
    }

    public function query(Teacher $model)
    {
        return $model->newQuery()->with('user');
    }

    public function html()
    {
        return $this->builder()->setTableId('teacher-table')->columns($this->getColumns())->minifiedAjax()->responsive()->autoWidth(false)->orderBy(0);
    }

    protected function getColumns()
    {
        $columns = [Column::computed('name')->title('Name')->exportable(false)->printable(false)->searchable(true)->addClass('text-left'), Column::computed('department_class')->title('Departments')->exportable(false)->printable(false)->searchable(true), Column::make('education'), Column::make('mobile_number')->title('Mobile'), Column::make('joining_date'), Column::computed('status')->exportable(false)->printable(false)->searchable(false)->addClass('text-center')->width(80)];

        if (Auth::user() && Auth::user()->role === 'admin') {
            $columns[] = Column::computed('added_by')->title('Added By')->exportable(false)->printable(false)->addClass('text-left');
        }

        $columns[] = Column::computed('action')->exportable(false)->printable(false)->width(120)->addClass('text-center');

        return $columns;
    }

    protected function filename(): string
    {
        return 'Teachers_' . date('YmdHis');
    }
}
