<?php

namespace App\DataTables;

use App\Models\Student;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StudentDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'pages.students.datatables.action')
            ->addColumn('status', function ($student) {
                return $student->status == 'Active' 
                    ? '<span class="badge bg-light-success">' . $student->status . '</span>'
                    : '<span class="badge bg-light-danger">' . $student->status . '</span>';
            })
            ->rawColumns(['status', 'action']);
    }

    public function query(Student $model)
    {
        return $model->newQuery()->select('id', 'first_name', 'last_name', 'roll_no', 'admission_no', 'class', 'section', 'parents_name', 'parents_mobile', 'status', 'registration_date');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('student-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->buttons([
                'excel', 'csv', 'pdf', 'print', 'reset', 'reload'
            ]);
    }

    protected function getColumns()
    {
        return [
            Column::make('select')->searchable(false)->exportable(false)->printable(false),
            Column::make('first_name')->searchable(true),
            Column::make('roll_no')->searchable(true),
            Column::make('admission_no')->searchable(true),
            Column::make('class')->searchable(true),
            Column::make('section')->searchable(true),
            Column::make('parents_name')->searchable(true),
            Column::make('status')->searchable(false),
            Column::make('registration_date')->searchable(true),
            Column::make('action')->exportable(false)->printable(false),
        ];
    }

    protected function filename(): string
    {
        return 'Students_' . date('YmdHis');
    }
}