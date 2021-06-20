<?php

namespace App\Http\Controllers\merchant\product;

use App\DataTables\pendingProductDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pendingProductController extends Controller
{
	public function __construct()
	{
	    $this->middleware('merchant', ['except' => 'logout']);
	}

    public function index(pendingProductDatatable $dataTable)
    {
        return $dataTable->render('merchant.product.pending.index');
    }
}
