<?php

namespace App\Http\Controllers\merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function __construct()
	{
	    $this->middleware('merchant', ['except' => 'logout']);
	}

    public function index()
    {
    	return view('merchant.home');
    }
}
