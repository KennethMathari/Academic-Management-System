@extends('layouts.app2')

    
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
                
                            <input id="subjects" type="string"  class="form-control @error('subjects') is-invalid @enderror" name="subjects" value="{{ old('subjects') ?? $user->staffprofile->subjects}}" required >
                
                            @error('subjects')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                    <div class="form-group ">
                        <label for="class" >{{ __("Class:") }}</label>

                            <select id="class" class="form-control @error('class') is-invalid @enderror" name="class" value="{{$user->staffprofile->class}}" required>
                                <option value="{{$user->staffprofile->class}}" selected>{{$user->staffprofile->class}}</option>
                                <option value="8">8</option>
                                <option value="7">7</option>
                                <option value="6">6</option>
                                <option value="5">5</option>
                                <option value="3">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                                <option value="PP2">PP2</option>
                                <option value="PP1">PP1</option>
        
                              </select>
        
                            @error('class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">      
                            <label for="bio" >{{ __("Bio:") }}</label>
                            <textarea rows="8" cols="50" id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" required   placeholder="Describe yourself.">{{ old('bio') ?? $user->staffprofile->bio }}</textarea>
                
                            @error('bio')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
                    
                    <div class="form-group ">
                        <label for="position" >{{ __("Position:") }}</label>
                
                            <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') ?? $user->staffprofile->position}}" required >
        
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                    <div class="form-group ">
                        <label for="phone_number" >{{ __("Phone number:") }}</label>
                
                            <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{$user->staffprofile->phone_number}}" required >
        
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
        
                    <div class="form-group ">
                        <label for="skills" >{{ __("Skills:") }}</label>
                
                            <input id="skills" type="text" class="form-control @error('skills') is-invalid @enderror" name="skills" value="{{ old('skills') ?? $user->staffprofile->skills}}" required >
        
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

