<?php

namespace App\DataTables;

use App\Models\Payment;
// use Illuminate\Database\Eloquent\Builder as QueryBuilder;
// use Yajra\DataTables\EloquentDataTable;
// use Yajra\DataTables\Html\Builder as HtmlBuilder;
// use Yajra\DataTables\Html\Button;
// use Yajra\DataTables\Html\Column;
// use Yajra\DataTables\Html\Editor\Editor;
// use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PaymentDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($payment) {
                return '
        <ul class="list-inline mb-0">
            <li class="list-inline-item">
                <a data-bs-toggle="modal" data-bs-target="#student-edit-payment_modal" href="#" class="avtar avtar-xs btn-link-secondary">
                    <i class="ti ti-edit f-20"></i>
                </a>
            </li>
            <li class="list-inline-item">
                <form id="delete-form-' . $payment->id . '" action="' . route('payment.destroy', $payment->id) . '" method="POST" style="display: none;">
            ' . csrf_field() . method_field('DELETE') . '
        </form>
        <a href="#" class="avtar avtar-xs btn-link-secondary bs-pass-para"
           data-id="' . $payment->id . '" data-bs-toggle="modal" data-bs-target="#delete-confirmation-modal">
            <i class="ti ti-trash f-20"></i>
        </a>
            </li>
        </ul>
    ';
            })

            ->rawColumns(['action']) 
            ->editColumn('amount', function ($payment) {
                return number_format($payment->amount) . ' Pkr';
            })
            ->editColumn('payment_date', function ($payment) {
                return \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y');
            });
    }

    public function query(Payment $model)
    {
        return $model->newQuery();
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
        return [
            ['data' => 'invoice_id', 'name' => 'invoice_id', 'title' => 'Invoice Id'],
            ['data' => 'reference_number', 'name' => 'reference_number', 'title' => 'Reference No'],
            ['data' => 'payment_date', 'name' => 'payment_date', 'title' => 'Payment Date'],
            ['data' => 'payment_method', 'name' => 'payment_method', 'title' => 'Payment Method'],
            ['data' => 'amount', 'name' => 'amount', 'title' => 'Amount'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Actions', 'orderable' => false, 'searchable' => false, 'exportable' => false, 'printable' => false],
        ];
    }

    protected function filename(): string
    {
        return 'Payments_' . date('YmdHis');
    }
}
