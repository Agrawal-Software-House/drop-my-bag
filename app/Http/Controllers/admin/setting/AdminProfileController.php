<?php

namespace App\Http\Controllers\admin\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\admin\UpdateAdminRequest;
use App\Http\Requests\admin\UpdateAdminPasswordRequest;
use App\Admin;

class AdminProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'logout']);
    }

    public function showMyProfile()
    {
    	$admin = Auth::guard('admin')->user();
        return view('admin.setting.my-profile',compact('admin'));
    }

    public function showPasswordPage()
    {
        return view('admin.setting.password');
    }

    public function UpdateAdminProfile(UpdateAdminRequest $request)
    {

        $admin = Admin::find(Auth::guard('admin')->user()->id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if($request->hasFile('profile_image'))
        {
            $data['profile_image'] = $request->profile_image->store('admin/profile_image');
        }

        $update = $admin->update($data);

        $message = $update ? 'Profile Updated Successfully!!' : 'Can not update. Please try again later!';
        
        $data = array(
            'message' => $message,
        );
        echo json_encode($data);
    }

    public function updateAdminPassword(UpdateAdminPasswordRequest $request)
    {

        $admin = Admin::find(Auth::guard('admin')->user()->id);

        $update = $admin->update([
            'password' => bcrypt($request['password']),
        ]);

        $message = $update ? 'Password Updated Successfully!!' : 'Can not update. Please try again later!';
        
        $data = array(
            'message' => $message,
        );
        echo json_encode($data);
    }
}
