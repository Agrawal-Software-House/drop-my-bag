<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\customer_wishlist;
use Illuminate\Http\Request;

class CustomerWishlistController extends Controller
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
        return view('customer.account.wishlist');
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
     * @param  \App\Models\customer_wishlist  $customer_wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(customer_wishlist $customer_wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\customer_wishlist  $customer_wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(customer_wishlist $customer_wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer_wishlist  $customer_wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, customer_wishlist $customer_wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer_wishlist  $customer_wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(customer_wishlist $customer_wishlist)
    {
        //
    }
}
