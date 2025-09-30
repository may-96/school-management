<?php

namespace App\DataTables;

use App\Models\Payroll;
use Yajra\DataTables\Services\DataTable;

class PayrollDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)

            ->addColumn('checkbox', function ($payroll) {
                return '
    <div class="d-flex align-items-center">
        <div class="form-check form-check-inline m-0 pc-icon-checkbox">
            <input class="form-check-input bulk-checkbox" name="payroll_ids[]" type="checkbox" value="' . $payroll->id . '" />
            <i class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
            <i class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
        </div>
    </div>';
            })

            // Name search (Teacher + Employee)
            ->filterColumn('name', function ($query, $keyword) {
                $query->whereHas('employeeable', function ($q) use ($keyword) {
                    $q->where('first_name', 'like', "%{$keyword}%")
                        ->orWhere('last_name', 'like', "%{$keyword}%");
                });
            })

            // Type search
            ->filterColumn('type', function ($query, $keyword) {
                $query->where('employee_type', 'like', "%{$keyword}%");
            })

            // Salary search
            ->filterColumn('salary', function ($query, $keyword) {
                $query->where('monthly_salary', 'like', "%{$keyword}%");
            })

            // Month search
            ->filterColumn('month', function ($query, $keyword) {
                $query->where('payroll_month', 'like', "%{$keyword}%");
            })

            // Status search
            ->filterColumn('status', function ($query, $keyword) {
                $query->where('status', 'like', "%{$keyword}%");
            })

            ->addColumn('name', function ($payroll) {
                return $payroll->employeeable
                    ? ($payroll->employeeable->first_name ?? '') . ' ' . ($payroll->employeeable->last_name ?? '')
                    : 'N/A';
            })
            ->addColumn('type', function ($payroll) {
                return class_basename($payroll->employee_type); // Teacher / Employee
            })
            ->addColumn('salary', function ($payroll) {
                $salary = $payroll->net_salary ?? $payroll->monthly_salary ?? 0;

                return number_format($salary, 2) . ' PKR';
            })


            ->addColumn('month', fn($payroll) => \Carbon\Carbon::parse($payroll->payroll_month)->format('F Y'))
            ->addColumn('status', function ($payroll) {
                return strtolower($payroll->status) === 'paid'
                    ? '<span class="badge bg-light-success">Paid</span>'
                    : '<span class="badge bg-light-danger">Unpaid</span>';
            })
            ->addColumn('action', function ($payroll) {
                $payButton = strtolower($payroll->status) === 'paid'
                    ? '<button type="button"
        class="avtar avtar-xs btn-link-danger border-0 payroll-action-btn"
        data-bs-toggle="modal"
        data-bs-target="#deletePaymentModal"
        data-id="' . $payroll->id . '"
        data-bs-hover="tooltip" title="Remove">
        <i class="ti ti-circle-minus f-20"></i>
    </button>'
                    : '<a href="#"
        class="avtar avtar-xs btn-link-secondary payroll-action-btn"
        data-id="' . $payroll->id . '"
        data-bs-toggle="modal"
        data-bs-target="#add-payroll-modal"
        data-bs-hover="tooltip"
        data-bs-placement="top"
        title="Add Payment">
        <i class="ti ti-plus f-20"></i>
    </a>';



                // View button
                $viewButton = '<a href="' . route('payrolls.show', $payroll->id) . '"
                                    class="avtar avtar-xs btn-link-secondary"
                                    data-bs-hover="tooltip"
                                    data-bs-placement="top" title="View">
                                    <i class="ti ti-eye f-20"></i>
                               </a>';

                // Edit button (hide if paid)
                $editButton = strtolower($payroll->status) === 'paid'
                    ? ''
                    : '<a href="' . route('payrolls.edit', $payroll->id) . '"
                            class="avtar avtar-xs btn-link-secondary"
                            data-bs-hover="tooltip"
                            data-bs-placement="top" title="Edit">
                            <i class="ti ti-edit f-20"></i>
                       </a>';

                // Delete button
                $deleteButton = strtolower($payroll->status) === 'paid'
                    ? ''
                    : '<form action="' . route('payrolls.destroy', $payroll->id) . '" method="POST" class="d-inline" id="delete-form-' . $payroll->id . '">
                        ' . csrf_field() . method_field('DELETE') . '
                        <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"
                           data-id="' . $payroll->id . '" data-bs-toggle="modal"
                           data-bs-target="#delete-payroll-modal-' . $payroll->id . '"
                           data-bs-hover="tooltip" title="Delete">
                           <i class="ti ti-trash f-20"></i>
                        </a>
                     </form>';

                return $payButton . $viewButton . $editButton . $deleteButton;
            })
            ->rawColumns(['checkbox', 'status', 'action']);
    }

    public function query(Payroll $model)
    {
        return $model->with('employeeable', 'details.payType')->select('payrolls.*');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('payrolls-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->parameters([
                'responsive' => true,
                'autoWidth'  => false,
                'searching'  => true,
            ]);
    }

    protected function getColumns()
    {
        return [
            [
                'data' => 'checkbox',
                'name' => 'checkbox',
                'title' => '<div class="form-check form-check-inline pc-icon-checkbox">
                    <input class="form-check-input" type="checkbox" id="bulk-select-all" />
                    <i class="material-icons-two-tone pc-icon-uncheck ms-1">check_box_outline_blank</i>
                    <i class="material-icons-two-tone text-primary pc-icon-check ms-1">check_box</i>
                </div>',
                'orderable' => false,
                'searchable' => false,
                'escape' => false,
            ],

            ['data' => 'name', 'title' => 'Name'],
            ['data' => 'type', 'title' => 'Type'],
            ['data' => 'salary', 'title' => 'Salary'],
            ['data' => 'month', 'title' => 'Month'],
            ['data' => 'status', 'title' => 'Status'],
            ['data' => 'action', 'title' => 'Action', 'orderable' => false, 'searchable' => false, 'className' => 'text-end'],
        ];
    }

    protected function filename(): string
    {
        return 'Payrolls_' . date('YmdHis');
    }
}
