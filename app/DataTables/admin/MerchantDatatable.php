<?php

namespace App\DataTables\admin;

use App\Merchant;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class MerchantDatatable extends DataTable
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
            ->editColumn('created_at', function(Merchant $model){
                return Carbon::parse($model->created_at)->diffForHumans();
            })
            ->editColumn('updated_at', function(Merchant $model){
                return Carbon::parse($model->updated_at)->diffForHumans();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Merchant $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Merchant $model)
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
                    ->setTableId('Merchant-table')
                    ->columns($this->getColumns())
                    ->postAjax()
                    ->parameters(['scrollX' => true])
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        // Button::make('create'),
                        // Button::make('export'),
                        Button::make('print'),
                        // Button::make('reset'),
                        Button::make('reload')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // Column::computed('action')
            //       ->exportable(false)
            //       ->printable(false)
            //       ->addClass('text-center'),
            Column::make('firm_name')->title('Firm Name'),
            Column::make('name')->title('Full Name'),
            Column::make('phone_number')->title('Phone Number'),
            Column::make('gst')->title('GST'),
            Column::make('address')->title('Address'),
            Column::make('pincode')->title('Pincode'),
            Column::make('business_type')->title('Business Type'),
            Column::make('created_at'),
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
        return 'admin/Merchant_' . date('YmdHis');
    }
}
