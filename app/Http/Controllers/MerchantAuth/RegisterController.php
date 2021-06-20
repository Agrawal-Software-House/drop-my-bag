<?php

namespace App\Http\Controllers\MerchantAuth;

use App\Merchant;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/merchant/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('merchant.guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firm_name' => 'required|max:255',
            'name' => 'required|max:255',
            'phone_number' => 'required',
            'gst' => 'required',
            'address' => 'required',
            'pincode' => 'required',
            'business_type' => 'required',
            'email' => 'required|email|max:255|unique:merchants',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Merchant
     */
    protected function create(array $data)
    {
        return Merchant::create([
            'firm_name' => $data['firm_name'],
            'name' => $data['name'],
            'phone_number' => $data['phone_number'],
            'gst' => $data['gst'],
            'address' => $data['address'],
            'pincode' => $data['pincode'],
            'business_type' => $data['business_type'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('merchant.auth.register');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('merchant');
    }
}
