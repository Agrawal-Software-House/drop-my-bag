<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\customer_order;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        //
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
