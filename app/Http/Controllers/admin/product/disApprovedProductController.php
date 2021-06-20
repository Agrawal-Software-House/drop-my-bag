<?php

namespace App\Http\Controllers\admin\product;

use App\DataTables\adminDisApprovedProductDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class disApprovedProductController extends Controller
{
    public function __construct()
	{
	    $this->middleware('admin', ['except' => 'logout']);
	}

    public function index(adminDisApprovedProductDatatable $dataTable)
    {
        return $dataTable->render('admin.product.disapproved.index');
    }
}
