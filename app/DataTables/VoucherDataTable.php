<?php

namespace App\DataTables;

use App\Models\Voucher;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class VoucherDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->filterColumn('student_name', function ($query, $keyword) {
                $query->whereHas('student', function ($q) use ($keyword) {
                    $q->where('first_name', 'like', "%$keyword%")
                        ->orWhere('last_name', 'like', "%$keyword%")
                        ->orWhere('parents_mobile', 'like', "%$keyword%");
                });
            })
            ->addColumn('student_name', function ($payment) {
                $img = $payment->student->profile_image
                    ? asset('storage/students/' . $payment->student->profile_image)
                    : asset('assets/images/user/avatar-1.jpg');

                return '
                    <div class="row align-items-center">
                        <div class="col-auto pe-0">
                            <a href="' . route('voucher.show', $payment->id) . '">
                                <img src="' . $img . '" class="img-fluid rounded-circle" style="height:40px; width:40px;" />
                            </a>
                        </div>
                        <div class="col">
                            <h6 class="mb-1">
                                <span class="text-truncate w-100">' . $payment->student->first_name . ' ' . $payment->student->last_name . '</span>
                            </h6>
                            <p class="f-12 mb-0">
                                <a href="#!" class="text-muted">' . $payment->student->parents_mobile . '</a>
                            </p>
                        </div>
                    </div>
                ';
            })
            ->addColumn('payment_date', fn($payment) => Carbon::parse($payment->payment_date)->format('d/m/Y'))
            ->addColumn('amount', function ($voucher) {
                $paid = $voucher->payments()->sum('amount');
                $total = $voucher->amount;
                $remaining = $total - $paid;

                return number_format($remaining, 2) . ' Pkr';
            })
            ->addColumn('status', function ($voucher) {
                return match (strtolower($voucher->status)) {
                    'paid' => '<span class="badge bg-light-success">Paid</span>',
                    'unpaid' => '<span class="badge bg-light-danger">Unpaid</span>',
                    'partial paid' => '<span class="badge bg-light-warning">Partial Paid</span>',
                    default => '<span class="badge bg-light-secondary">Unknown</span>',
                };
            })
            ->rawColumns(['status'])

            ->addColumn('actions', function ($payment) {
                $status = strtolower($payment->status);

                $addButton = '';
                $editButton = '';
                $deleteButton = '';

                if (in_array($status, ['unpaid', 'partial paid'])) {
                    $addButton = '
            <li class="list-inline-item">
                <a href="#"
                    class="avtar avtar-xs btn-link-secondary open-payment-modal"
                    data-bs-toggle="modal"
                    data-bs-target="#student-add-payment_modal"
                    data-invoice-id="' . e($payment->invoice_id) . '"
                    data-reference-number="' . e($payment->reference_no) . '"
                    data-voucher-id="' . e($payment->id) . '"
                    data-voucher-amount="' . e($payment->amount - $payment->payments()->sum('amount')) . '">
                    <i class="ti ti-plus f-20"></i>
                </a>
            </li>';

                    $editButton = '
            <li class="list-inline-item">
                <a href="' . route('voucher.edit', $payment->id) . '" class="avtar avtar-xs btn-link-secondary">
                    <i class="ti ti-edit f-20"></i>
                </a>
            </li>';
                }

                if ($status === 'unpaid') {
                    $deleteButton = '
            <li class="list-inline-item">
                <form id="delete-form-' . $payment->id . '" action="' . route('voucher.destroy', $payment->id) . '" method="POST" style="display: none;">
                    ' . csrf_field() . method_field('DELETE') . '
                </form>
                <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para" data-id="' . $payment->id . '">
                    <i class="ti ti-trash f-20"></i>
                </a>
            </li>';
                }

                return '
        <ul class="list-inline mb-0 text-end">'
                    . $addButton . '
            <li class="list-inline-item">
                <a href="#"
                   class="avtar avtar-xs btn-link-secondary view-payment-slip"
                   data-bs-toggle="modal"
                   data-bs-target="#student-payment-slip_model"
                   data-voucher-id="' . e($payment->id) . '"
                   data-student-id="' . e($payment->student_id) . '">
                   <i class="ti ti-eye f-20"></i>
                </a>
            </li>'
                    . $editButton .
                    $deleteButton .
                    '</ul>';
            })

            ->rawColumns(['student_name', 'status', 'actions', 'amount']);
    }

    public function query(): QueryBuilder
    {
        return Voucher::with('student')->select('vouchers.*');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('voucher-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0);
    }

    protected function getColumns(): array
    {
        return [
            ['data' => 'invoice_id', 'title' => 'Voucher Id'],
            ['data' => 'student_name', 'title' => 'Student Name'],
            ['data' => 'payment_date', 'title' => 'Due Date'],
            ['data' => 'amount', 'title' => 'Amount'],
            ['data' => 'status', 'title' => 'Status', 'orderable' => false, 'searchable' => false],
            ['data' => 'actions', 'title' => 'Actions', 'orderable' => false, 'searchable' => false, 'className' => 'text-end'],
        ];
    }

    protected function filename(): string
    {
        return 'Vouchers_' . date('YmdHis');
    }
}
