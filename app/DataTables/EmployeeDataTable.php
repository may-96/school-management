<?php

namespace App\DataTables;

use App\Models\Employee;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Auth;

class EmployeeDataTable extends DataTable
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

            ->filterColumn('department', function ($query, $keyword) {
                $query->where('department', 'like', "%{$keyword}%");
            })

            ->filterColumn('mobile_no', function ($query, $keyword) {
                $query->where('mobile_no', 'like', "%{$keyword}%");
            })

            ->addColumn('name', function ($employee) {
                $image = $employee->employee_profile
                    ? asset('storage/' . $employee->employee_profile)
                    : asset('assets/images/user/avatar-7.jpg');

                $route = route('employees.show', $employee->id);

                return '
                    <a href="' . $route . '" class="text-decoration-none text-dark">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="' . $image . '" alt="img" class="img-fluid rounded-circle" style="height:40px; width:40px;" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0">' . $employee->first_name . ' ' . $employee->last_name . '</h6>
                                <small class="text-truncate w-100 text-muted">' . $employee->email . '</small>
                            </div>
                        </div>
                    </a>';
            })

            ->addColumn('department', fn($e) => '<h6 class="mb-0">' . $e->department . '</h6>')

            ->addColumn('status', function ($teacher) {
                $badge = $teacher->status == 'Active' ? 'bg-light-success' : 'bg-light-danger';
                return '<span class="badge ' . $badge . '">' . $teacher->status . '</span>';
            })

            ->addColumn('action', function ($employee) {
                return '
                
          ' . ($employee->status === 'Active'
                    ? '<a href="' . route('payrolls.create.single', ['employee_type' => 'employee', 'employee_id' => $employee->id]) . '" 
          class="avtar avtar-xs btn-link-secondary" 
          data-bs-hover="tooltip" 
          title="Create Payroll">
            <i class="ti ti-cash f-20"></i>
       </a>'
                    : '<span class="avtar avtar-xs btn-link-secondary disabled" 
            data-bs-hover="tooltip" 
            title="Inactive Employee">
            <i class="ti ti-cash f-20 text-muted"></i>
       </span>') . '

                    <a href="' . route('employees.show', $employee->id) . '" class="avtar avtar-xs btn-link-secondary" data-bs-hover="tooltip" title="View">
                        <i class="ti ti-eye f-20"></i>
                    </a>
                    <a href="' . route('employees.edit', $employee->id) . '" class="avtar avtar-xs btn-link-secondary" data-bs-hover="tooltip" title="Edit">
                        <i class="ti ti-edit f-20"></i>
                    </a>
                    <form id="delete-form-' . $employee->id . '" action="' . route('employees.destroy', $employee->id) . '" method="POST" style="display: none;">
                        ' . csrf_field() . method_field('DELETE') . '
                    </form>
                    <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para" data-bs-hover="tooltip" data-id="' . $employee->id . '" title="Delete">
                        <i class="ti ti-trash f-20"></i>
                    </a>';
            });

        if (Auth::user() && Auth::user()->role === 'admin') {
            $dataTable->addColumn('added_by', function ($employee) {
                return $employee->user
                    ? trim($employee->user->first_name . ' ' . $employee->user->last_name)
                    : '<span class="text-muted">Unknown</span>';
            });
        }

        $rawColumns = ['name', 'department', 'action', 'status'];
        if (Auth::user() && Auth::user()->role === 'admin') {
            $rawColumns[] = 'added_by';
        }

        return $dataTable->rawColumns($rawColumns);
    }

    public function query(Employee $model)
    {
        return $model->newQuery()->with('user');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('employee-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->responsive()
            ->autoWidth(false)
            ->orderBy(0);
    }

    protected function getColumns()
    {
        $columns = [
            Column::computed('name')->title('Name')->exportable(false)->printable(false)->searchable(true),
            Column::computed('department')->title('Department')->exportable(false)->printable(false)->searchable(true),
            Column::make('mobile_no')->title('Mobile')->searchable(true),
            Column::make('joining_date'),
            Column::computed('status')->title('Status')->exportable(false)->printable(false)->searchable(false)->addClass('text-center')->width(80),
        ];

        if (Auth::user() && Auth::user()->role === 'admin') {
            $columns[] = Column::computed('added_by')->title('Added By')->exportable(false)->printable(false);
        }

        $columns[] = Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(120)
            ->addClass('text-center');

        return $columns;
    }

    protected function filename(): string
    {
        return 'Employees_' . date('YmdHis');
    }
}
