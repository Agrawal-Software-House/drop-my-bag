<?php

namespace App\Http\Controllers\merchant\product;

use App\DataTables\merchanDisApprovdProductDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class disApprovedProductController extends Controller
{
    public function __construct()
	{
	    $this->middleware('merchant', ['except' => 'logout']);
	}

    public function index(merchanDisApprovdProductDatatable $dataTable)
    {
        return $dataTable->render('merchant.product.disapproved.index');
    }
}
