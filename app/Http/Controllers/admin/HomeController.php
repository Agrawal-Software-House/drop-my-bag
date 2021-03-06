<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function __construct()
	{
	    $this->middleware('admin', ['except' => 'logout']);
	}
	
    public function index()
    {
    	return view('admin.home');
    }
}
