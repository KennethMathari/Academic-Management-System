@extends('layouts.app2')

    
@section('content')

@if (Auth::user()->user_type=='admin')

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center"><b>Add User</b></div>
            <div class="panel-body">
                <form  action="{{url('users')}}" method="POST" enctype="multipart/form-data">

                @csrf
                <div class="form-group">
                    <label for="name" >{{ __('Name:') }}</label>
            
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                </div>
            
                {{-- <div class="form-group">
                    <label for="Adm_No">{{ __('ID:') }}</label>
            
                        <input id="Adm_No" type="text" class="form-control @error('Adm_No') is-invalid @enderror" name="Adm_No" value="{{ old('Adm_No') }}" required autocomplete="name" >
            
                        @error('Adm_No')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div> --}}
            
                <div class="form-group">
                    <label for="user_type" >{{ __('User Type:') }}</label>
                        
                        <select id="user_type" type="text" class="form-control @error('user_type') is-invalid @enderror" name="user_type" value="{{ old('user_type') }}" required autocomplete="name" >
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
            
                <div class="form-group " >
                    <label for="email" >{{ __('E-Mail Address:') }}</label>
            
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            
                <div class="form-group ">
                    <label for="user_image" >{{ __('User Image:') }}</label>
            
                        <input id="user_image" type="file"  name="user_image" required="">
            
                        @error('user_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
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
            
                <div class="form-group ">
                    {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label> --}}
            
                    <div class="col-md-6">
                        <input id="password-confirm" type="hidden" class="form-control" name="password_confirmation" required autocomplete="new-password"  value="Qwerty123">
                    </div>
                </div>
            
                <div class="form-group">
                        <p style="text-align:center"><button type="submit" class="btn btn-primary" style="width:70%">
                            {{ __('Register') }}
                        </button></p>
                </div>
            </form>
        </div>
        </div>


</div>



@else()
    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
@endsection

