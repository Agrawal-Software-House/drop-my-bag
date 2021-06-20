@extends('customer.app')

@section('main-content')

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-conten padding-y" style="min-height:84vh">

<!-- ============================ COMPONENT LOGIN   ================================= -->
    <div class="card mx-auto" style="max-width: 380px; margin-top:100px;">
      <div class="card-body">
      <h4 class="card-title mb-4">Sign in</h4>
      <form role="form" method="POST" action="{{ url('/customer/login') }}">
        {{ csrf_field() }}
          <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
             <input name="email" id="email" class="form-control" placeholder="Email" type="email" value="{{ old('email') }}" autofocus>
             @if ($errors->has('email'))
                 <span class="text-danger">
                     <strong>{{ $errors->first('email') }}</strong>
                 </span>
             @endif
          </div> <!-- form-group// -->


          <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" class="form-control" name="password" placeholder="Password">
            @if ($errors->has('password'))
                <span class="text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div> <!-- form-group// -->
          
          <div class="form-group">
            <a href="{{ url('/customer/password/reset') }}" class="float-right">Forgot password?</a> 
            <label class="float-left custom-control custom-checkbox"> <input type="checkbox" name="remember" class="custom-control-input" checked=""> <div class="custom-control-label"> Remember </div> </label>
          </div> <!-- form-group form-check .// -->
          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block"> Login  </button>
          </div> <!-- form-group// -->    
      </form>
      </div> <!-- card-body.// -->
    </div> <!-- card .// -->

     <p class="text-center mt-4">Don't have account? <a href="{{ url('/customer/register') }}">Sign up</a></p>
     <br><br>
<!-- ============================ COMPONENT LOGIN  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
@endsection
