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
              <form role="form" method="POST" action="{{ url('/seller/login') }}">
                    {{ csrf_field() }}
                  <div class="card2 card border-0 px-4 py-5">

                      <div class="row p-3"> 
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm">Email Address</h6>
                        </label> 
                        <input id="email" type="email" name="email" value="{{ old('email') }}" autofocus placeholder="Enter a valid email address"> 
                        @if ($errors->has('email'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="row p-3"> 
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label> 
                        <input type="password" name="password" placeholder="Enter password">
                        @if ($errors->has('password'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                      </div>

                      <div class="row px-3 mb-4">
                          <div class="custom-control custom-checkbox custom-control-inline"> <input id="remember" type="checkbox" name="remember" class="custom-control-input"> <label for="chk1" class="custom-control-label text-sm">Remember me</label> </div> 

                          <a href="{{ url('/seller/password/reset') }}" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                      </div>
                      <div class="row mb-3 px-3"> 
                        <button type="submit" class="btn btn-blue text-center">Login</button> 
                      </div>
                      
                      <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a class="text-danger " href="/seller/register">Register</a></small> </div>
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
