<?php

namespace App\Http\Controllers\merchant\product;

use App\DataTables\merchanApprovdProductDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class approvedProductController extends Controller
{
    public function __construct()
	{
	    $this->middleware('merchant', ['except' => 'logout']);
	}

    public function index(merchanApprovdProductDatatable $dataTable)
    {
        return $dataTable->render('merchant.product.approved.index');
    }
}
