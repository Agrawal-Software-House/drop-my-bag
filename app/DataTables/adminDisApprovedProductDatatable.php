<?php

namespace App\DataTables;

use App\Models\product;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class adminDisApprovedProductDatatable extends DataTable
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
            ->addColumn('category',function(product $model){
                return $model->category->name;
            })
            ->addColumn('sub_category',function(product $model){
                return $model->subCategory->name;
            })
            ->editColumn('product_image',function(product $model){
                return "<img src='/storage/$model->product_image' style='height: 70px;' alt=''>";
            })
            ->addColumn('action',function(product $model){
                return "<div class='btn-group'>
                    <a type='button' onclick='showApproveModal($model->id)' class='btn btn-default'>Approve</a>
                    <button type='button' class='btn btn-default dropdown-toggle dropdown-icon' data-toggle='dropdown'>
                      <span class='sr-only'>Toggle Dropdown</span>
                    </button>
                    <div class='dropdown-menu' role='menu'>
                      <a type='button' class='dropdown-item' onclick='showDeleteModal($model->id)'>Delete</a>
                    </div>
                  </div>";
            })
            ->rawColumns(['product_image', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(product $model)
    {
        return $model->newQuery()
        ->where('product_status_type_id',3);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('admindisapprovedproductdatatable-table')
                    ->columns($this->getColumns())
                    ->postAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
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
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('product_name'),
            Column::make('category'),
            Column::make('sub_category'),
            Column::make('product_image'),
            Column::make('piece'),
            Column::make('mrp_price'),
            Column::make('selling_price'),
            Column::make('admin_note'),
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
        return 'adminDisApprovedProduct_' . date('YmdHis');
    }
}
