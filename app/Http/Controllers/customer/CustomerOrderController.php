<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\customer_order;
use App\Http\Requests\customer\order\storeOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Captcha;

class CustomerOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('customer', ['except' => 'logout']);
    }
    
    public function index()
    {
        return view('customer.account.my-order');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeOrder $request)
    {
        if( Captcha::validate($request->captcha_id, $request->captcha_code) )
        {
            //fetch the items in the cart
            $carts = Auth::guard('customer')->user()->cart;

            //create a transaction
            $transaction = customer_transaction::create([
                'payment_method_id' => 1,
            ]);

            foreach ($carts as $cart) {
                $total = $cart->product->selling_price * $cart->quantity;       
                $tax = ($cart->product->subCategory->gst * ($cart->product->selling_price * $cart->quantity))/100;

                $grand_total = $total + $tax;

                // Create a new order
                $customer_order = customer_order::create([
                    'product_id' => $cart->product->id,
                    'quantity' => $cart->quantity,
                    'amount' => $cart->product->selling_amount,
                    'gst' => $cart->product->subCategory->gst,
                    'grand_amount' => $grand_total,
                    'customer_address_id' => $request->address,
                    'customer_transaction_id' => $transaction->id,
                    'customer_id' => Auth::guard('customer')->user()->id,
                ]);

                // reduce the product quantity from merchant account
                    //find product
                    $product = product::find($cart->product->id);
                    
                    //update quantity for merchant
                    $updateProduct = $product->update([
                        'quantity' => $product->quantity - $cart->quantity,
                    ]);


                //delete the item from cart if order inserted succesfully
                $cart->delete();

            }
        }
        else
        {
            // Invalid
            dd('InValid');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer_order  $customer_order
     * @return \Illuminate\Http\Response
     */
    public function show(customer_order $customer_order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer_order  $customer_order
     * @return \Illuminate\Http\Response
     */
    public function edit(customer_order $customer_order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer_order  $customer_order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer_order $customer_order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer_order  $customer_order
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer_order $customer_order)
    {
        //
    }
}
