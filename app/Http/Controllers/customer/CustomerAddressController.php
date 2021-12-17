<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\customer\address\storeAddressRequest;
use App\Http\Requests\customer\address\updateAddressRequest;
use App\Models\customer_address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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

        $address = customer_address::create($request->all());

        if($request->has('active'))
        {
            self::_make_address_default($request['customer_id'], $address);
        }
        
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
    public function edit( $id)
    {
        // return view with required variables
        $customer_address = customer_address::find($id);
        return view('customer.account.address.edit',compact('customer_address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\customer_address  $customer_address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // call to make default button
        if($request->has('default_button'))
        {
            $address = customer_address::find(Crypt::decryptString($id));
            $update = self::_make_address_default(Auth::guard('customer')->id(), $address);

            $message = $update ? 'Default Address updated' : 'Techinal Error!';
            $data = array(
                'message' => $message,
            );
            echo json_encode($data);
        }
        
        // update the address 
        else
        {
            $update = self::updateAddress($request,$id);

            $message = $update ? 'Address updated successfully!' : 'Technical error!';
            
            $data = array(
                'message' => $message,
            );
            echo json_encode($data);
            
        }
    }

    private function updateAddress($request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        if($request->has('active'))
        {
            $request['active'] = $request->has('active');
        }

        $address = customer_address::find($id);

        $update = $address->update($request->all());

        if($request->has('active'))
        {
            self::_make_address_default($address->customer_id, $address);
        }

        return $update ? true : false;
    }

    private function _make_address_default($customer_id, $address)
    {
        $reset = customer_address::where('customer_id',$customer_id)->update([
            'active' => 0, 
        ]);

        $make_default = $address->update([
            'active' => 1, 
        ]);

        if($reset && $make_default)
        {
            return true;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\customer_address  $customer_address
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //customer_address
        $id = Crypt::decryptString($id);
        $delete = customer_address::find($id)->delete();

        $message = $delete ? 'Removed from address successfully!' : 'Can not remove from address. Please try again later!';
        
        $data = array(
            'message' => $message,
        );
        echo json_encode($data);
    }
}
