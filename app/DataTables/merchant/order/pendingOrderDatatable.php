<?php

namespace App\DataTables\merchant\order;

use App\Models\customer_transaction;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class pendingOrderDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('product_title',function(customer_order $model){
                return $model->product->product_title;
            })
            // ->addColumn('action',function(customer_order $model){
            //     return "<div class='btn-group'>
            //         <a type='button' onclick='showApproveModal($model->id)' class='btn btn-default'>Approve</a>
            //         <button type='button' class='btn btn-default dropdown-toggle dropdown-icon' data-toggle='dropdown'>
            //           <span class='sr-only'>Toggle Dropdown</span>
            //         </button>
            //         <div class='dropdown-menu' role='menu'>
            //           <a type='button' class='dropdown-item' onclick='showDeleteModal($model->id)'>Delete</a>
            //         </div>
            //       </div>";
            // })
            ->rawColumns(['product_title', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\merchant\order\customer_order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(customer_transaction $model)
    {
        return $model->newQuery()->where('merchant_id', Auth::guard('merchant')->id());
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('pendingorderdatatable-table')
                    ->columns($this->getColumns())
                    ->parameters(['scrollX' => true])
                    ->postAjax();
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('product_title')->title('Product Title'),
            Column::make('quantity')->title('Quantity'),
            Column::make('gst')->title('GST'),
            Column::make('grand_amount')->title('Grand Amount'),

            // Column::make('created_at')->title('Order At'),
            // Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'merchant\order\pendingOrder_' . date('YmdHis');
    }
}
