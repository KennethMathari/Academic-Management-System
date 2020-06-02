@extends('layouts.app2')

    
@section('content')

@if (Auth::user()->user_type=='admin'||Auth::user()->user_type=='student')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center"><b>Edit Student Profile</b></div>
            <div class="panel-body">
                <form method="POST" action="/studentprofile/{{$user->Adm_No}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="class">{{ __('Class:') }}</label>
                
                            <input id="class" type="number"  class="form-control @error('class') is-invalid @enderror" name="class" value="{{ $user->studentprofile->class}}" required  placeholder="Enter class">
                
                            @error('class')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    
                    <div class="form-group">
                        <label for="DoB">{{ __('Date of Birth:') }}</label>
                
                            <input id="DoB" type="date"  class="form-control @error('DoB') is-invalid @enderror" name="DoB" value="{{ old('DoB') ?? $user->studentprofile->DoB}}" required >
                
                            @error('DoB')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group ">
                                    <label for="father_name" >{{ __("Father's name:") }}</label>
                            
                                    
                                        <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') ?? $user->studentprofile->father_name}}"  placeholder="Enter father's name">
                    
                                        @error('father_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                            <div class="col-md-6 col-xs-6">
                                <div class="form-group">
                                    <label for="father_no" >{{ __("Father's phonenumber:") }}</label>
                            
                                        <input id="father_no" type="text" class="form-control @error('father_no') is-invalid @enderror" name="father_no" value="{{ old('father_no') ?? $user->studentprofile->father_no}}" placeholder="Enter father's phonenumber">
                    
                                        @error('father_no')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group">
                                <label for="mother_name" >{{ __("Mother's name:") }}</label>
                        
                                    <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name') ?? $user->studentprofile->mother_name}}"  placeholder="Enter mother's name">
                
                                    @error('mother_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                        <div class="col-md-6 col-xs-6">
                            <div class="form-group">
                                <label for="mother_no">{{ __("Mother's phonenumber:") }}</label>
                        
                                    <input id="mother_no" type="text" class="form-control @error('mother_no') is-invalid @enderror" name="mother_no" value="{{ old('mother_no') ?? $user->studentprofile->mother_no}}" placeholder="Enter Mother's phonenumber">
                
                                    @error('mother_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="resident" >{{ __("Residence:") }}</label>
                
                            <input id="resident" type="text" class="form-control @error('resident') is-invalid @enderror" name="resident" value="{{ old('resident') ?? $user->studentprofile->resident}}" required placeholder="Enter residence">
        
                            @error('resident')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                    <div class="form-group">
                        <label for="gender" >{{ __("Gender:") }}</label>
                
                            <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') ?? $user->studentprofile->gender}}" required  placeholder="Enter gender">
        
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                    <div class="form-group">
                        <label for="club" >{{ __("Club:") }}</label>
                
                            <input id="club" type="text" class="form-control @error('club') is-invalid @enderror" name="club" value="{{ old('club') ?? $user->studentprofile->club}}" placeholder="Enter club">
        
                            @error('club')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                    <div class="form-group">
                        <label for="hobbies" >{{ __("Hobbies:") }}</label>
                
                            <input id="hobbies" type="text" class="form-control @error('hobbies') is-invalid @enderror" name="hobbies" value="{{ old('hobbies') ?? $user->studentprofile->hobbies}}" placeholder="Enter hobbies">
        
                            @error('hobbies')
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
        
    </div>
       


@else()
    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
@endsection

