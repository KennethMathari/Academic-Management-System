@extends('layouts.app')

    
@section('content')

@if (Auth::user()->user_type=='admin'||Auth::user()->user_type=='staff')
    <div class="container">
        <form method="POST" action="/staffprofile/{{$user->Adm_No}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            {{-- <div class="form-group row">
                <label for="Adm_No" class="col-md-4 col-form-label text-md-right">{{ __('Admission number:') }}</label>
        
                <div class="col-md-6">
                    <input id="Adm_No" type="text" class="form-control @error('Adm_No') is-invalid @enderror" name="Adm_No" value="{{ old('Adm_No') ?? $user->staffprofile->Adm_No}}" required autocomplete="Adm_No" autofocus>
        
                    @error('Adm_No')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div> --}}
        
            <div class="form-group row">
                <label for="subjects" class="col-md-4 col-form-label text-md-right">{{ __('Subjects:') }}</label>
        
                <div class="col-md-6">
                    <input id="subjects" type="string"  class="form-control @error('subjects') is-invalid @enderror" name="subjects" value="{{ old('subjects') ?? $user->staffprofile->subjects}}" required autocomplete="subjects" autofocus>
        
                    @error('subjects')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="class" class="col-md-4 col-form-label text-md-right">{{ __("Class:") }}</label>
        
                <div class="col-md-6">
                    <input id="class" type="text" class="form-control @error('class') is-invalid @enderror" name="class" value="{{ old('class') ?? $user->staffprofile->class}}" required autocomplete="class" autofocus>

                    @error('class')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="position" class="col-md-4 col-form-label text-md-right">{{ __("Position:") }}</label>
        
                <div class="col-md-6">
                    <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" value="{{ old('position') ?? $user->staffprofile->position}}" required autocomplete="position" autofocus>

                    @error('position')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __("Phone number:") }}</label>
        
                <div class="col-md-6">
                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') ?? $user->staffprofile->phone_number}}" required autocomplete="phone_number" autofocus>

                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="DoB" class="col-md-4 col-form-label text-md-right">{{ __("Date of Birth:") }}</label>
        
                <div class="col-md-6">
                    <input id="DoB" type="date" class="form-control @error('DoB') is-invalid @enderror" name="DoB" value="{{ old('DoB') ?? $user->staffprofile->DoB}}" required autocomplete="DoB" autofocus>

                    @error('DoB')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="skills" class="col-md-4 col-form-label text-md-right">{{ __("Skills:") }}</label>
        
                <div class="col-md-6">
                    <input id="skills" type="text" class="form-control @error('skills') is-invalid @enderror" name="skills" value="{{ old('skills') ?? $user->staffprofile->skills}}" required autocomplete="skills" autofocus>

                    @error('skills')
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
    <h2 class="alert alert-danger" style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
@endsection

