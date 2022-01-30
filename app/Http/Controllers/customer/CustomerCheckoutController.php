<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer_address;
use Captcha;

class CustomerCheckoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $captcha = Captcha::chars('123456789ABCDEFGHIJKLMNPQRSTUVWXYZ')->length(4)->size(120, 40)->generate();
        $id = $captcha->id();

        $addresses = customer_address::all();
        return view('customer.account.checkout',compact('addresses','captcha'));
    }
}
