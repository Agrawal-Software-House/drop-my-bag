<?php

namespace App\DataTables\customer;

use App\Models\customer_cart;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class customerCartDatatable extends DataTable
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

            ->addColumn('product', function ($cart) {
                return '<figure class="itemside">

                <div class="aside">
                    <img 
                        src="'.Storage::url($cart->product->product_image).'" 
                        alt="'.$cart->product->product_name.'" 
                        class="img-sm">
                </div>

                <figcaption class="info">

                    <a href="" class="title text-dark">
                        '.$cart->product->product_name.'
                    </a>

                    <p class="text-muted small">
                        Size: XL, Color: blue, 
                        <br> 
                        Brand: '.$cart->product->brand_name.'
                    </p>

                </figcaption>
            </figure>';
            })

            ->addColumn('quantity', function ($cart) {
                $option = '';
                for($i=1; $i<=10; $i++)
                {
                    if($cart->quantity == $i)
                    {
                        $option = $option."<option selected value='".$i."'>".$i."</option>";
                    }
                    else{
                        $option = $option."<option value='".$i."'>".$i."</option>";
                    }
                }

                $encrypt = Crypt::encryptString($cart->id);
                
                return '<select  class="form-control"  id="quantity_val'.$cart->id.'" 
                                onchange="updateQuantity('."'$encrypt', $cart->id ".');">
                    '.$option.'
                    </select> ';
            })

            ->addColumn('price', function ($cart) {
                $total_price  = $cart->product->selling_price*$cart->quantity;
                return '<div class="price-wrap"> 
                            <var class="price">Rs '.$total_price.'</var> 

                            <small class="text-muted"> 
                                RS '.$cart->product->selling_price.' each 
                            </small> 

                        </div> ';
            })

            ->addColumn('action', function ($cart) {
                return '<a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
                        <a href="" class="btn btn-light"> Remove</a>';
            })

            ->withQuery('extra', function() use ($query) {
                $total = 0;
                $carts = Auth::guard('customer')->user()->cart;

                foreach ($carts as $cart) {
                    $total = $total + ($cart->product->selling_price * $cart->quantity);                
                }

                $data = array(  
                    'total_price' => $total,
                );
                return $data;
            })
            ->rawColumns(['product','quantity','price','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\customerCartDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(customer_cart $model)
    {
        return $model->newQuery()->where('customer_id', Auth::guard('customer')->user()->id);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('customercartdatatable-table')
                    ->columns($this->getColumns())
                    ->postAjax()
                    ->dom('rtip')
                    ->parameters([
                        'drawCallback' => 'function() { setTotal(); }',
                        'scrollX' => true])
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
            Column::computed('product')
                  ->title('Product')
                  
                  ->addClass('text-left'),

            Column::computed('quantity')
                    ->title('Quantity'),

            Column::computed('price')
                    ->title('Price'),


            Column::computed('action')
                    ->title('')
                    ->addClass('text-right'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'customerCart_' . date('YmdHis');
    }
}
