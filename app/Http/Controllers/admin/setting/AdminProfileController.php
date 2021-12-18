<?php

namespace App\Http\Controllers\admin\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    //

    public function showMyProfile()
    {
        return view('admin.setting.my-profile');
    }

    public function showPasswordPage()
    {
        return view('admin.setting.password');
    }
}
