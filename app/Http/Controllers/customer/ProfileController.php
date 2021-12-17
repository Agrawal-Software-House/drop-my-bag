<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\state;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::guard('customer')->user();
        $states = state::all();
        return view('customer.account.setting',compact('user','states'));
    }
}
