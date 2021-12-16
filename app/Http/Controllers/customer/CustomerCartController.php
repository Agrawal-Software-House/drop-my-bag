<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;

use App\Models\customer_cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\DataTables\customer\customerCartDatatable;

class CustomerCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(customerCartDatatable $dataTable)
    {
        $carts = Auth::guard('customer')->user()->cart;

        return $dataTable->render('customer.account.mycart',compact('carts'));
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
    public function store(Request $request)
    {
        //add a new item to the cart
        $id = Crypt::decryptString($request->id);
        $customer = customer_cart::create([
            'customer_id' => Auth::guard('customer')->user()->id,
            'product_id' => $id,
            'quantity' => $request->quantity ? $request->quantity : 1,
        ]);

        $data = array(
            'success' => 'Added to cart!!',
        );
        echo json_encode($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer_cart  $customer_cart
     * @return \Illuminate\Http\Response
     */
    public function show(customer_cart $customer_cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer_cart  $customer_cart
     * @return \Illuminate\Http\Response
     */
    public function edit(customer_cart $customer_cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer_cart  $customer_cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = customer_cart::find($id)->update([
            'quantity' => $request->quantity,
        ]);

        $message = $update ? 'Quantity updated successfully!' : 'Can not update quantity. Please try again later!';
        
        $data = array(
            'message' => $message,
        );
        echo json_encode($data);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer_cart  $customer_cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer_cart $customer_cart)
    {
        //
    }
}
