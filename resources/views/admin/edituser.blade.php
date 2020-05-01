@extends('layouts.app')

    
@section('content')

@if (Auth::user()->user_type=='admin')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center"><b>Edit User</b></div>
            <div class="panel-body">
                <form method="POST" action="{{ route('users.update',$user->Adm_No) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group ">
                        <label for="name" >{{ __('Name:') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                    </div>
                
                    <div class="form-group ">
                        <label for="Adm_No" >{{ __('Admission Number:') }}</label>
                
                       
                            <input id="Adm_No" type="text" class="form-control @error('Adm_No') is-invalid @enderror" name="Adm_No" value="{{$user->Adm_No}}" required autocomplete="name" autofocus>
                
                            @error('Adm_No')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                
                
                    <div class="form-group" >
                        <label for="email" >{{ __('E-Mail Address:') }}</label>
                
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">
                
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                
                    <div class="form-group">
                        <label for="user_image" >{{ __('User Image:') }}</label>
                
                            <input id="user_image" type="file"  name="user_image" value="{{$user->user_image}}" >
                
                            @error('user_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                
                    
                
                
                    <div class="form-group">
                        
                            <p style="text-align:center"><button type="submit" class="btn btn-primary" style="width:70%">
                                {{ __('Edit') }}
                            </button></p>
                    </div>
                </form>

            </div>

</div>



@else()
    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
@endsection

