<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\customer\address\storeAddressRequest;
use App\Http\Requests\customer\address\updateAddressRequest;
use App\Models\customer_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAddressController extends Controller
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
        return view('customer.account.address.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.account.address.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeAddressRequest $request)
    {
        $request['customer_id'] = Auth::guard('customer')->id();
        $request['active'] = $request->has('active');
        customer_address::create($request->all());
        return response()->json(['message'=>'your data submitted'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\customer_address  $customer_address
     * @return \Illuminate\Http\Response
     */
    public function show(customer_address $customer_address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer_address  $customer_address
     * @return \Illuminate\Http\Response
     */
    public function edit(customer_address $customer_address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer_address  $customer_address
     * @return \Illuminate\Http\Response
     */
    public function update(updateAddressRequest $request, customer_address $customer_address)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer_address  $customer_address
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer_address $customer_address)
    {
        //
    }
}
