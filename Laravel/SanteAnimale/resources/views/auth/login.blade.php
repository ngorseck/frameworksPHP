@extends('layouts.logins')

@section('content')
<div class="limiter">
    <div class="container-login100" style="background-image: url('http://localhost/mesprojets/seminairePHP/SanteAnimale/public/login/images/img-01.jpg');">
        <div class="wrap-login100 p-t-100 p-b-30">
            <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="login100-form-avatar">
                    <img src="{{ asset('logins/images/avatar.png') }}" alt="AVATAR">
                </div>

                <div class="text-center w-full p-t-10 p-b-10">
                        <span class="txt1 text-warning"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate = "Email is required">
                    <input class="input100 @error('email') is-invalid @enderror" name="email" type="email" placeholder="Email" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"><i class="fa fa-user"></i></span>
                </div>

                <div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
                    <input class="input100 @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                    <span class="symbol-input100"><i class="fa fa-lock"></i></span>
                </div>
                <div class="text-center w-full p-t-25 p-b-50">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>
                <div class="container-login100-form-btn p-t-10">
                    <button name="login" class="login100-form-btn">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="text-center w-full p-t-25 p-b-20">
                    <a href="#" class="txt1">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </a>
                </div>

                <div class="text-center w-full">
                    <a class="txt1" href="#">
                        <a class="btn btn-link" href="{{ route('register') }}">Register</a>
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
