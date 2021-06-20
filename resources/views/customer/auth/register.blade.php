@extends('customer.app')

@section('main-content')
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">

<!-- ============================ COMPONENT REGISTER   ================================= -->
    <div class="card mx-auto" style="max-width:520px; margin-top:40px;">
      <article class="card-body">
        <header class="mb-4"><h4 class="card-title">Sign up</h4></header>
        <form role="form" method="POST" action="{{ url('/customer/register') }}">
            {{ csrf_field() }}
                <div class="form-row">
                    <div class="col form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        <label for="first_name">First name</label>
                        <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" autofocus>
                        @if ($errors->has('first_name'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div> <!-- form-group end.// -->


                    <div class="col form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        <label>Last name</label>
                        <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" autofocus>
                        @if ($errors->has('last_name'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div> <!-- form-group end.// -->
                </div> <!-- form-row end.// -->


                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                    <small class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div> <!-- form-group end.// -->

                <div class="form-group {{ $errors->has('gender') ? ' has-error' : '' }}">
                    <label class="custom-control custom-radio custom-control-inline">
                      <input class="custom-control-input" checked="" type="radio" name="gender" value="Male">
                      <span class="custom-control-label"> Male </span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                      <input class="custom-control-input" type="radio" name="gender" value="Female">
                      <span class="custom-control-label"> Female </span>
                    </label>
                    @if ($errors->has('gender'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif
                </div> <!-- form-group end.// -->

                <div class="form-row">
                    <div class="form-group col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
                        <label>Create password</label>
                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div> <!-- form-group end.// --> 
                    <div class="form-group col-md-6 {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label>Repeat password</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div> <!-- form-group end.// -->  
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"> Register  </button>
                </div> <!-- form-group// -->      
                <div class="form-group"> 
                    <label class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input" name="terms_condition" checked="" value="1"> <div class="custom-control-label"> I am agree with <a href="#">terms and contitions</a>  </div> </label>

                    @if ($errors->has('terms_condition'))
                        <span class="text-danger">
                            <strong>{{ $errors->first('terms_condition') }}</strong>
                        </span>

                    @endif
                </div> <!-- form-group end.// -->           
            </form>
        </article><!-- card-body.// -->
    </div> <!-- card .// -->
    <p class="text-center mt-4">Have an account? <a href="{{ url('/customer/login') }}">Log In</a></p>
    <br><br>
<!-- ============================ COMPONENT REGISTER  END.// ================================= -->


</section>
<!-- ========================= SECTION CONTENT END// ========================= -->





@endsection
