<?php

namespace App\Http\Controllers\admin\product;

use App\DataTables\adminApprovdProductDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class approvedProductController extends Controller
{
    public function __construct()
	{
	    $this->middleware('admin', ['except' => 'logout']);
	}

    public function index(adminApprovdProductDatatable $dataTable)
    {
        return $dataTable->render('admin.product.approved.index');
    }
}
