@extends('layouts.app')

    
@section('content')

@if (Auth::user()->user_type=='staff')

<div class="container">
        <form  action="{{url('classroom')}}" method="POST" enctype="multipart/form-data">
            <h2 style="text-align:center">Add Student</h2>
            @csrf
            <div class="form-group row">        
                <div class="col-md-6">
                    <input id="class_name" type="hidden" class="form-control @error('class_name') is-invalid @enderror" name="class_name" value="{{Auth::user()->staffprofile->class}}" required autocomplete="name" autofocus>
        
                    @error('class_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="student_name" class="col-md-4 col-form-label text-md-right">{{ __('Student Name:') }}</label>
        
                <div class="col-md-6">
                    <input id="student_name" type="text" class="form-control @error('student_name') is-invalid @enderror" name="student_name" value="" required autocomplete="student_name" autofocus>
        
                    @error('student_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="student_id" class="col-md-4 col-form-label text-md-right">{{ __('Adm. No:') }}</label>
        
                <div class="col-md-6">
                    <input id="student_id" type="text" class="form-control @error('student_id') is-invalid @enderror" name="student_id" value="" required autocomplete="student_id" autofocus>
        
                    @error('student_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

                        {{-- Teacher Name --}}
                    <input id="teacher_name" type="hidden" class="form-control @error('teacher_name') is-invalid @enderror" name="teacher_name" value="{{Auth::user()->name}}" required autocomplete="teacher_name" autofocus>
                    @error('teacher_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
               
                        {{-- Teacher ID --}}
                    <input id="teacher_id" type="hidden" class="form-control @error('teacher_id') is-invalid @enderror" name="teacher_id" value="{{Auth::user()->Adm_No}}" required autocomplete="teacher_id" autofocus>
        
                    @error('teacher_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
               

                        {{-- Year --}}
                    <input id="year" type="hidden" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ now()->year }}" required autocomplete="year" autofocus>
                    @error('year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Add to class') }}
                    </button>
                </div>
            </div>
            
        </form>

</div>


@else()
    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
@endsection

