<?php

namespace App\DataTables\merchant\order;

use App\Models\customer_order;
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
            ->addColumn('action', 'merchant\order\customer_order.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\merchant\order\customer_order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(customer_order $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('merchant\order\pendingorderdatatable-table')
                    ->columns($this->getColumns())
                    ->postAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            
            Column::make('')->title('Order No'),
            
            Column::make('id')->title('Customer Name'),
            Column::make('')->title('Product Name'),
            Column::make('')->title('Payment Method'),
            Column::make('')->title('Quantity'),
            Column::make('')->title('GST'),
            Column::make('')->title('Grand Amount'),

            Column::make('created_at')->title('Order At'),
            Column::make('updated_at'),
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
