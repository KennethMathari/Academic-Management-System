@extends('layouts.app')

    
@section('content')

@if (Auth::user()->user_type=='admin'||Auth::user()->user_type=='staff')
    <div class="container">
        <form method="POST" action="/classroom/{{$user->student_id}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2>Edit User</h2>

            <div class="form-group row">
                <label for="student_name" class="col-md-4 col-form-label text-md-right">{{ __('Name:') }}</label>
        
                <div class="col-md-6">
                    <input id="student_name" type="string"  class="form-control @error('student_name') is-invalid @enderror" name="student_name" value="{{ old('student_name') ?? $user->student_name}}" required autocomplete="student_name" autofocus>
        
                    @error('student_name')
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

