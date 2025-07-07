<?php

namespace App\DataTables;

use App\Models\Payment;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PaymentDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = datatables()
            ->eloquent($query)
            ->addColumn('action', function ($payment) {
                return '
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                      <a href="#"
                          class="avtar avtar-xs btn-link-secondary edit-payment-btn"
                          data-id="' . $payment->id . '"
                          data-invoice_id="' . $payment->invoice_id . '"
                          data-reference_number="' . $payment->reference_number . '"
                          data-payment_method="' . $payment->payment_method . '"
                          data-amount="' . $payment->amount . '"
                          data-payment_date="' . $payment->payment_date . '"
                          data-notes="' . htmlspecialchars($payment->notes) . '"
                          data-bs-toggle="modal"
                          data-bs-target="#student-edit-payment_modal">
                          <i class="ti ti-edit f-20"></i>
                      </a>
                    </li>
                    <li class="list-inline-item">
                        <form id="delete-form-' . $payment->id . '" action="' . route('payment.destroy', $payment->id) . '" method="POST" style="display: none;">
                            ' . csrf_field() . method_field('DELETE') . '
                        </form>
                        <a href="#"
                            class="avtar avtar-xs btn-link-secondary bs-pass-para"
                            data-id="' . $payment->id . '"
                            data-bs-toggle="modal"
                            data-bs-target="#delete-confirmation-modal">
                            <i class="ti ti-trash f-20"></i>
                        </a>
                    </li>
                </ul>';
            })
            ->editColumn('amount', fn($payment) => number_format($payment->amount) . ' Pkr')
            ->editColumn('payment_date', fn($payment) => Carbon::parse($payment->payment_date)->format('d/m/Y'));

        if (Auth::user() && Auth::user()->role === 'admin') {
            $dataTable->addColumn('added_by', function ($payment) {
                if ($payment->user) {
                    return trim($payment->user->first_name . ' ' . $payment->user->last_name);
                }
                return 'Unknown';
            });
        }

        $raw = ['action'];
        if (Auth::user() && Auth::user()->role === 'admin') {
            $raw[] = 'added_by';
        }

        return $dataTable->rawColumns($raw);
    }

    public function query()
    {
        $query = Payment::with('user'); 

        if ($voucherId = request('voucher_id')) {
            $query->where('voucher_id', $voucherId);
        }

        if ($studentId = request('student_id')) {
            $query->whereHas('voucher', function ($q) use ($studentId) {
                $q->where('student_id', $studentId);
            });
        }

        return $query;
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('payment-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(0)
            ->parameters([
                'responsive' => true,
                'autoWidth' => false,
                'processing' => true,
                'serverSide' => true,
                'language' => ['processing' => '<div class="spinner-border spinner-border-sm text-primary"></div> Loading...'],
            ]);
    }

    protected function getColumns()
    {
        $columns = [
            ['data' => 'invoice_id', 'name' => 'invoice_id', 'title' => 'Invoice Id'],
            ['data' => 'reference_number', 'name' => 'reference_number', 'title' => 'Reference No'],
            ['data' => 'payment_method', 'name' => 'payment_method', 'title' => 'Payment Method'],
            ['data' => 'payment_date', 'name' => 'payment_date', 'title' => 'Payment Date'],
            ['data' => 'amount', 'name' => 'amount', 'title' => 'Amount'],
        ];

        if (Auth::user() && Auth::user()->role === 'admin') {
            $columns[] = ['data' => 'added_by', 'name' => 'user_id', 'title' => 'Added By'];
        }

        $columns[] = [
            'data' => 'action',
            'name' => 'action',
            'title' => 'Actions',
            'orderable' => false,
            'searchable' => false,
            'exportable' => false,
            'printable' => false,
        ];

        return $columns;
    }

    protected function filename(): string
    {
        return 'Payments_' . date('YmdHis');
    }
}
