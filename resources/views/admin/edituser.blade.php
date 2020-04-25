@extends('layouts.app')

    
@section('content')

@if (Auth::user()->user_type=='admin')
    <div class="container">
        <h2>Edit User</h2>

<form method="POST" action="{{ route('users.update',$user->Adm_No) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

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
            <input id="Adm_No" type="text" class="form-control @error('Adm_No') is-invalid @enderror" name="Adm_No" value="{{$user->Adm_No}}" required autocomplete="name" autofocus>

            @error('Adm_No')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group row" >
        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

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
            <input id="user_image" type="file"  name="user_image" value="{{$user->user_image}}" >

            @error('user_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    


    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Edit') }}
            </button>
        </div>
    </div>
</form>



</div>



@else()
    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
@endsection

