@extends('layouts.app')

    
@section('content')

@if (Auth::user()->user_type=='admin'||Auth::user()->user_type=='staff')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center"><b>Edit Staff Profile</b></div>
            <div class="panel-body">
                <form method="POST" action="/staffprofile/{{$user->Adm_No}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                
                    <div class="form-group ">
                        <label for="subjects" >{{ __('Subjects:') }}</label>
                
                            <input id="subjects" type="string"  class="form-control @error('subjects') is-invalid @enderror" name="subjects" value="{{ old('subjects') ?? $user->staffprofile->subjects}}" required autocomplete="subjects" autofocus>
                
                            @error('subjects')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                    <div class="form-group ">
                        <label for="class" >{{ __("Class:") }}</label>
                
                            <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ old('class') ?? $user->staffprofile->class}}" required autocomplete="class" autofocus>
        
                            @error('class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                    <div class="form-group ">
                        <label for="position" >{{ __("Position:") }}</label>
                
                            <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') ?? $user->staffprofile->position}}" required autocomplete="position" autofocus>
        
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                    <div class="form-group ">
                        <label for="phone_number" >{{ __("Phone number:") }}</label>
                
                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') ?? $user->staffprofile->phone_number}}" required autocomplete="phone_number" autofocus>
        
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                    <div class="form-group ">
                        <label for="DoB" >{{ __("Date of Birth:") }}</label>
                
                            <input id="DoB" type="date" class="form-control @error('DoB') is-invalid @enderror" name="DoB" value="{{ old('DoB') ?? $user->staffprofile->DoB}}" required autocomplete="DoB" autofocus>
        
                            @error('DoB')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                    <div class="form-group ">
                        <label for="skills" >{{ __("Skills:") }}</label>
                
                            <input id="skills" type="text" class="form-control @error('skills') is-invalid @enderror" name="skills" value="{{ old('skills') ?? $user->staffprofile->skills}}" required autocomplete="skills" autofocus>
        
                            @error('skills')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
        
                    <div class="form-group ">
                            <p style="text-align:center"><button type="submit" class="btn btn-primary" style="width:70%">
                                {{ __('Edit') }}
                            </button></p>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
       


@else()
    <h2 class="alert alert-danger" style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
@endsection

