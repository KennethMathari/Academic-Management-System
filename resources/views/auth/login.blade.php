@extends('layouts.app')

@section('content')
<div class="container " style="padding-top:70px">
    <div class="panel panel-default" >
        <div class="panel-heading" style="text-align:center"><b>LOGIN</b></div>
        <div class="panel-body">
            <form method="POST" action="{{ route('login.custom') }}">
            @csrf
            <p style="text-align:center"><img src="/Images/2703062-512.png" width="200" height="200"></p>

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address:') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group">
                <label for="password">{{ __('Password:') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <div class="form-group d-flex">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            

            <div class="form-group" style="text-align:center">
                    <button type="submit" class="btn btn-primary" style="width:70%;background-color:#0b6623;">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
        </form></div>
      </div>
                    
                    </div>
@endsection
