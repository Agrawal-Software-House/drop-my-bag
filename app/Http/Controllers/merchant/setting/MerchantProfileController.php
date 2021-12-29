<?php

namespace App\Http\Controllers\merchant\setting;

use App\Http\Controllers\Controller;
use App\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\merchant\UpdateMerchantRequest;
use App\Http\Requests\merchant\UpdateMerchantPasswordRequest;

class MerchantProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('merchant', ['except' => 'logout']);
    }

    public function showMyProfile()
    {
    	$merchant = Auth::guard('merchant')->user();
        return view('merchant.setting.my-profile',compact('merchant'));
    }

    public function showPasswordPage()
    {
        return view('merchant.setting.password');
    }

    public function UpdateMerchantProfile(UpdateMerchantRequest $request)
    {

        $merchant = Merchant::find(Auth::guard('merchant')->user()->id);

        $data = $request->all();

        unset($data['_token']);
        

        if($request->hasFile('avtar'))
        {
            $data['avtar'] = $request->avtar->store('admin/avtar');
        }

        $update = $merchant->update($data);

        $message = $update ? 'Profile Updated Successfully!!' : 'Can not update. Please try again later!';
        
        $data = array(
            'message' => $message,
        );
        echo json_encode($data);
    }

    public function updateMerchantPassword(UpdateMerchantPasswordRequest $request)
    {

        $merchant = Merchant::find(Auth::guard('merchant')->user()->id);

        $update = $merchant->update([
            'password' => bcrypt($request['password']),
        ]);

        $message = $update ? 'Password Updated Successfully!!' : 'Can not update. Please try again later!';
        
        $data = array(
            'message' => $message,
        );
        echo json_encode($data);
    }
}
