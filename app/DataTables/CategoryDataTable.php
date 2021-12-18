<?php

namespace App\DataTables;

use App\Models\Category;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\Storage;


class CategoryDataTable extends DataTable
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
            ->addColumn('action',function(Category $model){
                return "<div class='btn-group'>
                    <a type='button' href='/admin/category/$model->id/edit' class='btn btn-default'>Edit</a>
                    <button type='button' class='btn btn-default dropdown-toggle dropdown-icon' data-toggle='dropdown'>
                      <span class='sr-only'>Toggle Dropdown</span>
                    </button>
                    <div class='dropdown-menu' role='menu'>
                      <a type='button' class='dropdown-item' onclick='showDeleteModal($model->id)'>Delete</a>
                    </div>
                  </div>";
            })
            ->editColumn('image',function(Category $model){
                return "<img src='".Storage::url($model->image)."' style='height: 70px;' alt=''>";
            })
            ->rawColumns(['image', 'action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CategoryDataTable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Category $model)
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
                    ->setTableId('category-table')
                    ->columns($this->getColumns())
                    ->postAjax()
                    ->parameters(['scrollX' => true])
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('create'),
                        Button::make('reload')
                        // Button::make('export'),
                        // Button::make('print'),
                        // Button::make('reset'),
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
                  // ->exportable(false)
                  // ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            'name',
            'image',
            'slug',
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
        return 'Category_' . date('YmdHis');
    }
}
