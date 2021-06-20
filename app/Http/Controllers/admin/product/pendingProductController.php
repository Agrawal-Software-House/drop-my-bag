<?php

namespace App\Http\Controllers\admin\product;
use App\DataTables\adminPendingProductDatatable;
use App\Http\Controllers\Controller;
use App\Models\product;
use Illuminate\Http\Request;

class pendingProductController extends Controller
{
    public function __construct()
	{
	    $this->middleware('admin', ['except' => 'logout']);
	}

    public function index(adminPendingProductDatatable $dataTable)
    {
        return $dataTable->render('admin.product.pending.index');
    }
}
