<?php

namespace App\DataTables;

use App\Models\Voucher;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class VoucherDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = datatables()
            ->eloquent($query)
            ->filterColumn('student_name', function ($query, $keyword) {
                $query->whereHas('student', function ($q) use ($keyword) {
                    $q->where('first_name', 'like', "%$keyword%")
                        ->orWhere('last_name', 'like', "%$keyword%")
                        ->orWhere('parents_mobile', 'like', "%$keyword%");
                });
            })
            ->addColumn('invoice_id', function ($voucher) {
                return '<a href="' . route('voucher.show', $voucher) . '" class="text-body text-decoration-none">' . e($voucher->invoice_id) . '</a>';
            })

            ->addColumn('student_name', function ($voucher) {
                $img = $voucher->student->profile_image ? asset('storage/students/' . $voucher->student->profile_image) : asset('assets/images/user/avatar-2.jpg');

                return '
                    <div class="row align-items-center">
                        <div class="col-auto pe-0">
                            <img src="' .
                    $img .
                    '" class="img-fluid rounded-circle" style="height:40px; width:40px;" />
                        </div>
                        <div class="col">
                            <h6 class="mb-1">
                                <span class="text-truncate w-100">' .
                    $voucher->student->first_name .
                    ' ' .
                    $voucher->student->last_name .
                    '</span>
                            </h6>
                            <p class="f-12 mb-0">
                                <a href="#!" class="text-muted">' .
                    $voucher->student->parents_mobile .
                    '</a>
                            </p>
                        </div>
                    </div>
                ';
            })
            ->addColumn('payment_date', fn($voucher) => Carbon::parse($voucher->payment_date)->format('d/m/Y'))
            ->addColumn('amount', function ($voucher) {
                $paid = $voucher->payments()->sum('amount');
                $remaining = $voucher->amount - $paid;

                return '
        <div class="d-flex flex-column">
            <span>' .
                    number_format($remaining, 2) .
                    ' PKR</span>
            <small class="text-muted">Paid: ' .
                    number_format($paid) .
                    ' PKR</small>
        </div>
    ';
            })

            ->addColumn('status', function ($voucher) {
                return match (strtolower($voucher->status)) {
                    'paid' => '<span class="badge bg-light-success">Paid</span>',
                    'unpaid' => '<span class="badge bg-light-danger">Unpaid</span>',
                    'partial paid' => '<span class="badge bg-light-warning">Partial Paid</span>',
                    default => '<span class="badge bg-light-secondary">Unknown</span>',
                };
            });

        if (Auth::user() && Auth::user()->role === 'admin') {
            $dataTable->addColumn('added_by', function ($voucher) {
                return $voucher->user ? $voucher->user->first_name . ' ' . $voucher->user->last_name : 'Unknown';
            });
        }

        $dataTable->addColumn('actions', function ($voucher) {
            $status = strtolower($voucher->status);
            $addButton = $editButton = $deleteButton = '';

            if (in_array($status, ['unpaid', 'partial paid'])) {
                $addButton =
                    '
            <li class="list-inline-item">
                <a href="#"
                    class="avtar avtar-xs btn-link-secondary open-payment-modal"
                    data-bs-toggle="modal"
                    data-bs-target="#student-add-payment_modal"
                    data-invoice-id="' .
                    e($voucher->invoice_id) .
                    '"
                    data-reference-number="' .
                    e($voucher->reference_no) .
                    '"
                    data-voucher-id="' .
                    e($voucher->id) .
                    '"
                    data-voucher-amount="' .
                    e($voucher->amount - $voucher->payments()->sum('amount')) .
                    '">
                    <i class="ti ti-plus f-20" data-bs-toggle="tooltip" title="Add Payment" data-bs-placement="top"></i>
                </a>
            </li>';

                $editButton =
                    '
            <li class="list-inline-item">
                <a href="' .
                    route('voucher.edit', $voucher->id) .
                    '" class="avtar avtar-xs btn-link-secondary">
                    <i class="ti ti-edit f-20" data-bs-toggle="tooltip" title="Edit Voucher" data-bs-placement="top"></i>
                </a>
            </li>';
            }

            if ($status === 'unpaid') {
                $deleteButton =
                    '
            <li class="list-inline-item">
                <form id="delete-form-' .
                    $voucher->id .
                    '" action="' .
                    route('voucher.destroy', $voucher->id) .
                    '" method="POST" style="display: none;">
                    ' .
                    csrf_field() .
                    method_field('DELETE') .
                    '
                </form>
                <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para" data-id="' .
                    $voucher->id .
                    '">
                    <i class="ti ti-trash f-20" data-bs-toggle="tooltip" title="Delete Voucher" data-bs-placement="top"></i>
                </a>
            </li>';
            }

            return '
        <ul class="list-inline mb-0 text-end">' .
                $addButton .
                '
            <li class="list-inline-item">
                <a href="#"
                   class="avtar avtar-xs btn-link-secondary view-payment-slip"
                   data-bs-toggle="modal"
                   data-bs-target="#student-payment-slip_model"
                   data-voucher-id="' .
                e($voucher->id) .
                '"
                   data-student-id="' .
                e($voucher->student_id) .
                '">
                   <i class="ti ti-eye f-20" data-bs-toggle="tooltip" title="View Payment Slip" data-bs-placement="top"></i>
                </a>
            </li>' .
                $editButton .
                $deleteButton .
                '
        </ul>';
        });

        $rawCols = ['invoice_id', 'student_name', 'status', 'actions', 'amount'];

        if (Auth::user() && Auth::user()->role === 'admin') {
            $rawCols[] = 'added_by';
        }

        return $dataTable->rawColumns($rawCols);
    }

    public function query(): QueryBuilder
    {
        return Voucher::with(['student', 'user'])->select('vouchers.*');
    }

    public function html(): HtmlBuilder
    {
        return $this->builder()->setTableId('voucher-table')->columns($this->getColumns())->minifiedAjax()->orderBy(0);
    }

    protected function getColumns(): array
    {
        $columns = [['data' => 'invoice_id', 'title' => 'Voucher Id'], ['data' => 'student_name', 'title' => 'Student Name'], ['data' => 'payment_date', 'title' => 'Due Date'], ['data' => 'amount', 'title' => 'Amount'], ['data' => 'status', 'title' => 'Status', 'orderable' => false, 'searchable' => false]];

        if (Auth::user() && Auth::user()->role === 'admin') {
            $columns[] = ['data' => 'added_by', 'title' => 'Added By'];
        }

        $columns[] = [
            'data' => 'actions',
            'title' => 'Actions',
            'orderable' => false,
            'searchable' => false,
            'className' => 'text-end',
        ];

        return $columns;
    }

    protected function filename(): string
    {
        return 'Vouchers_' . date('YmdHis');
    }
}
