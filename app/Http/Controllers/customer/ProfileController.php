<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use App\Models\state;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;

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

    public function updateUserInfo(UpdateUserRequest $request, $id)
    {
        $request['state_id'] = $request->state;

        unset($request['_token']);
        unset($request['state']);

        $update = Customer::find($id)->update($request->all());

        $message = $update ? 'Info updated successfully!' : 'Techical Error!';
        
        $data = array(
            'message' => $message,
        );
        echo json_encode($data);

        
    }
}
