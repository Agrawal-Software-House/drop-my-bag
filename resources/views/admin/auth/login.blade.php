@extends('admin.layout.auth')

@section('content')
      <p class="login-box-msg">Sign in to start your session</p>

      <form role="form" method="POST" action="{{ url('/admin/login') }}" method="post">
        {{ csrf_field() }}
        <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
          <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif

        <div class="input-group mt-3 {{ $errors->has('password') ? ' has-error' : '' }}">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif



        <div class="row mt-3">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
     
      <p class="mb-1">
        <a style="color: black !important;" href="{{ url('/admin/password/reset') }}">I forgot my password</a>
      </p>
@endsection
