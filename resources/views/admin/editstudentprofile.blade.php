@extends('layouts.app')

    
@section('content')

@if (Auth::user()->user_type=='admin'||Auth::user()->user_type=='student')
    <div class="container">
        <form method="POST" action="/studentprofile/{{$user->Adm_No}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
        
            <div class="form-group row">
                <label for="DoB" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth:') }}</label>
        
                <div class="col-md-6">
                    <input id="DoB" type="date"  class="form-control @error('DoB') is-invalid @enderror" name="DoB" value="{{ old('DoB') ?? $user->studentprofile->DoB}}" required autocomplete="DoB" autofocus>
        
                    @error('DoB')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="father_name" class="col-md-4 col-form-label text-md-right">{{ __("Father's name:") }}</label>
        
                <div class="col-md-6">
                    <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') ?? $user->studentprofile->father_name}}" required autocomplete="father_name" autofocus>

                    @error('father_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="father_no" class="col-md-4 col-form-label text-md-right">{{ __("Father's number:") }}</label>
        
                <div class="col-md-6">
                    <input id="father_no" type="text" class="form-control @error('father_no') is-invalid @enderror" name="father_no" value="{{ old('father_no') ?? $user->studentprofile->father_no}}" required autocomplete="father_no" autofocus>

                    @error('father_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="mother_name" class="col-md-4 col-form-label text-md-right">{{ __("Mother's name:") }}</label>
        
                <div class="col-md-6">
                    <input id="mother_name" type="text" class="form-control @error('mother_name') is-invalid @enderror" name="mother_name" value="{{ old('mother_name') ?? $user->studentprofile->mother_name}}" required autocomplete="mother_name" autofocus>

                    @error('mother_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="mother_no" class="col-md-4 col-form-label text-md-right">{{ __("Mother's number:") }}</label>
        
                <div class="col-md-6">
                    <input id="mother_no" type="text" class="form-control @error('mother_no') is-invalid @enderror" name="mother_no" value="{{ old('mother_no') ?? $user->studentprofile->mother_no}}" required autocomplete="mother_no" autofocus>

                    @error('mother_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="resident" class="col-md-4 col-form-label text-md-right">{{ __("Residence:") }}</label>
        
                <div class="col-md-6">
                    <input id="resident" type="text" class="form-control @error('resident') is-invalid @enderror" name="resident" value="{{ old('resident') ?? $user->studentprofile->resident}}" required autocomplete="resident" autofocus>

                    @error('resident')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __("Gender:") }}</label>
        
                <div class="col-md-6">
                    <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') ?? $user->studentprofile->gender}}" required autocomplete="gender" autofocus>

                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="club" class="col-md-4 col-form-label text-md-right">{{ __("Club:") }}</label>
        
                <div class="col-md-6">
                    <input id="club" type="text" class="form-control @error('club') is-invalid @enderror" name="club" value="{{ old('club') ?? $user->studentprofile->club}}" required autocomplete="club" autofocus>

                    @error('club')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="hobbies" class="col-md-4 col-form-label text-md-right">{{ __("Hobbies:") }}</label>
        
                <div class="col-md-6">
                    <input id="hobbies" type="text" class="form-control @error('hobbies') is-invalid @enderror" name="hobbies" value="{{ old('hobbies') ?? $user->studentprofile->hobbies}}" required autocomplete="hobbies" autofocus>

                    @error('hobbies')
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

