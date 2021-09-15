@extends('merchant.layout.auth')

@section('content')
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
  <div class="card card0 border-0">
      <div class="row d-flex">
          <div class="col-lg-6">
              <div class="card1 pb-5">
                  <div class="row"> <img src="/logo/dmbF4.png" class="logo" style="height: 80px; width: 80px;"> </div>
                  <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="/merchant/login/img/merchant.jpg" class="img-fluid"> </div>
              </div>
          </div>

          <div class="col-lg-6">
            <form role="form" method="POST" action="{{ url('/seller/register') }}">
                {{ csrf_field() }}
              <div class="card2 card border-0 px-4 py-5">
                <div class="row">
                  <div class="col-xl-6 p-3"> 
                    <label class="mb-1" for="firm_name">
                        <h6 class="mb-0 text-sm">Firm Name</h6>
                    </label> 
                    <input id="firm_name" type="text" name="firm_name" value="{{ old('firm_name') }}" autofocus placeholder="Enter your firm name"> 
                    @if ($errors->has('firm_name'))
                        <span class="help-block">
                            {{ $errors->first('firm_name') }}
                        </span>
                    @endif
                  </div>

                  <div class="col-xl-6 p-3"> 
                    <label class="mb-1">
                          <h6 class="mb-0 text-sm">Name</h6>
                      </label> 
                      <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus> 
                      @if ($errors->has('name'))
                          <span class="help-block">
                              {{ $errors->first('name') }}
                          </span>
                      @endif
                  </div>


                  <div class="col-xl-6 p-3"> 
                    <label class="mb-1">
                          <h6 class="mb-0 text-sm">Phone Number</h6>
                      </label> 
                      <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}" autofocus> 
                      @if ($errors->has('phone_number'))
                            <span class="help-block">
                                {{ $errors->first('phone_number') }}
                            </span>
                        @endif
                  </div>

                  <div class="col-xl-6 p-3"> 
                    <label class="mb-1">
                          <h6 class="mb-0 text-sm">GST</h6>
                      </label> 
                      <input id="gst" type="text" class="form-control" name="gst" value="{{ old('gst') }}" autofocus> 
                      @if ($errors->has('gst'))
                                    <span class="help-block">
                                        {{ $errors->first('gst') }}
                                    </span>
                                @endif
                  </div>


                  <div class="col-xl-6 p-3"> 
                    <label class="mb-1">
                          <h6 class="mb-0 text-sm">Address</h6>
                      </label> 
                      <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" autofocus> 
                      @if ($errors->has('address'))
                          <span class="help-block">
                              {{ $errors->first('address') }}
                          </span>
                      @endif
                  </div>

                  <div class="col-xl-6 p-3"> 
                    <label class="mb-1">
                          <h6 class="mb-0 text-sm">Pincode</h6>
                      </label> 
                      <input id="pincode" type="text" class="form-control" name="pincode" value="{{ old('pincode') }}" autofocus> 
                      @if ($errors->has('pincode'))
                            <span class="help-block">
                                {{ $errors->first('pincode') }}
                            </span>
                        @endif
                  </div>

                  <div class="col-xl-6 p-3"> 
                    <label class="mb-1">
                          <h6 class="mb-0 text-sm">Business Type</h6>
                      </label> 
                      <input id="business_type" type="text" class="form-control" name="business_type" value="{{ old('business_type') }}" autofocus> 
                      @if ($errors->has('business_type'))
                            <span class="help-block">
                                {{ $errors->first('business_type') }}
                            </span>
                        @endif
                  </div>

                  <div class="col-xl-6 p-3"> 
                    <label class="mb-1">
                          <h6 class="mb-0 text-sm">E-Mail Address</h6>
                      </label> 
                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"> 
                      @if ($errors->has('email'))
                        <span class="help-block">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                  </div>

                  <div class="col-xl-6 p-3"> 
                    <label class="mb-1">
                          <h6 class="mb-0 text-sm">Password</h6>
                      </label> 
                      <input id="password" type="password" class="form-control" name="password"> 
                      @if ($errors->has('password'))
                                    <span class="help-block">
                                        {{ $errors->first('password') }}
                                    </span>
                                @endif
                  </div>

                  <div class="col-xl-6 p-3"> 
                    <label class="mb-1">
                          <h6 class="mb-0 text-sm">Confirm Password</h6>
                      </label> 
                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation"> 
                      @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        {{ $errors->first('password_confirmation') }}
                                    </span>
                                @endif
                  </div>
                </div>

                  <div class="row mb-3 px-3"> 
                    <button type="submit" class="btn btn-blue text-center">Register</button> 
                  </div>
                  
                  <div class="row mb-4 px-3"> <small class="font-weight-bold">Already have an account? <a class="text-danger" href="/seller/login">Login</a></small> </div>
              </div>
              </form>
          </div>
      </div>
      <div class="bg-blue py-4">
          <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights reserved.</small>
              <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
          </div>
      </div>
  </div>
</div> 

@endsection
