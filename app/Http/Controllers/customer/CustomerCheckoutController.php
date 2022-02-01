<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer_address;
use Captcha;
use Illuminate\Support\Facades\Auth;

class CustomerCheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('customer', ['except' => 'logout']);
    }
    
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $carts = Auth::guard('customer')->user()->cart;
        if($carts->count() > 0)
        {   
            $captcha = Captcha::chars('123456789ABCDEFGHIJKLMNPQRSTUVWXYZ')->length(4)->size(120, 40)->generate();
            $id = $captcha->id();

            $addresses = customer_address::all();
            return view('customer.account.checkout',compact('addresses','captcha'));
        }

        abort(404);
        
    }
}
