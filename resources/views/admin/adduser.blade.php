@extends('layouts.app')

    
@section('content')

@if (Auth::user()->user_type=='admin')

    <div class="container">
<form  action="{{url('users')}}" method="POST" enctype="multipart/form-data">
    <h3 style="text_align:center">Add User</h3>

    @csrf
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="Adm_No" class="col-md-4 col-form-label text-md-right">{{ __('Admission Number') }}</label>

        <div class="col-md-6">
            <input id="Adm_No" type="text" class="form-control @error('Adm_No') is-invalid @enderror" name="Adm_No" value="{{ old('Adm_No') }}" required autocomplete="name" autofocus>

            @error('Adm_No')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('User Type') }}</label>

        <div class="col-md-6">
            {{-- <input id="user_type" type="text" class="form-control @error('user_type') is-invalid @enderror" name="user_type" value="{{ old('user_type') }}" required autocomplete="name" autofocus> --}}

            <select id="user_type" type="text" class="form-control @error('user_type') is-invalid @enderror" name="user_type" value="{{ old('user_type') }}" required autocomplete="name" autofocus>
                <option value="" ></option>
                <option value="student" >student</option>
                <option value="staff">staff</option>
              </select>

            @error('user_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row" >
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="user_image" class="col-md-4 col-form-label text-md-right">{{ __('User Image') }}</label>

        <div class="col-md-6">
            <input id="user_image" type="file"  name="user_image" required="">

            @error('user_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

        <div class="col-md-6">
            <input id="password" type="hidden" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value="Qwerty123">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}

        <div class="col-md-6">
            <input id="password-confirm" type="hidden" class="form-control" name="password_confirmation" required autocomplete="new-password"  value="Qwerty123">
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>

</div>



@else()
    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
@endsection
