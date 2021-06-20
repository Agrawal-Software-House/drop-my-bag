<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
     public function __construct()
    {
        $this->middleware('customer', ['except' => 'logout']);
    }
    
    public function home()
    {
    	return view('customer.account.overview');
    }

    public function showSetting()
    {
        return view('customer.account.setting');
    }
}
