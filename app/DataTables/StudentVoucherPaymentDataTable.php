<?php

namespace App\DataTables;

use App\Models\Voucher;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\Html\Builder as HtmlBuilder;

class StudentVoucherPaymentDataTable extends DataTable
{
    protected $student_id;

    public function setStudentId($student_id)
    {
        $this->student_id = $student_id;
        return $this;
    }

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
            ->addColumn('amount', fn($payment) => $payment->amount . ' Pkr')
            ->addColumn('status', function ($voucher) {
                return match (strtolower($voucher->status)) {
                    'paid' => '<span class="badge bg-light-success">Paid</span>',
                    'unpaid' => '<span class="badge bg-light-danger">Unpaid</span>',
                    'partial paid' => '<span class="badge bg-light-warning">Partial Paid</span>',
                    default => '<span class="badge bg-light-secondary">Unknown</span>',
                };
            })
            ->addColumn('actions', function ($payment) {
                return '
                    <ul class="list-inline mb-0 text-end">
                        <li class="list-inline-item">
                            <a href="#"
                               class="avtar avtar-xs btn-link-secondary open-payment-modal"
                               data-bs-toggle="modal"
                               data-bs-target="#student-add-payment_modal"
                               data-invoice-id="' . e($payment->invoice_id) . '"
                               data-reference-number="' . e($payment->reference_no) . '"
                               data-voucher-id="' . e($payment->id) . '">
                               <i class="ti ti-plus f-20"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a data-bs-toggle="modal" data-bs-target="#student-payment-slip_model" href="#" class="avtar avtar-xs btn-link-secondary">
                                <i class="ti ti-eye f-20"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="' . route('voucher.edit', $payment->id) . '" class="avtar avtar-xs btn-link-secondary">
                                <i class="ti ti-edit f-20"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <form id="delete-form-' . $payment->id . '" action="' . route('voucher.destroy', $payment->id) . '" method="POST" style="display: none;">
                                ' . csrf_field() . method_field('DELETE') . '
                            </form>
                            <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para" data-id="' . $payment->id . '">
                                <i class="ti ti-trash f-20"></i>
                            </a>
                        </li>
                    </ul>
                ';
            })
            ->rawColumns(['student_name', 'status', 'actions']);
    }

    public function query(): QueryBuilder
    {
        return Voucher::with('student')
            ->select('vouchers.*')
            ->where('student_id', $this->student_id); // 👈 Filter by selected student
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
            ['data' => 'invoice_id', 'title' => 'Invoice Id'],
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
