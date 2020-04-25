@extends('layouts.app')

    
@section('content')

@if (Auth::user()->user_type=='staff' || Auth::user()->user_type=='admin')

<div class="container">
        <form  action="{{url('performancerecords ')}}" method="POST" enctype="multipart/form-data">
            <h2 style="text-align:center">Add Exam Record</h2>
            @csrf
            <div class="form-group row">        
                <div class="col-md-6">
                    <input id="student_id" type="hidden" class="form-control @error('student_id') is-invalid @enderror" name="student_id" value="{{$classroom->student_id}}" required autocomplete="student_id" autofocus>
        
                    @error('class_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

                    {{-- Student Name --}}
                    <input id="student_name" type="hidden" class="form-control @error('student_name') is-invalid @enderror" name="student_name" value="{{$classroom->student_name}}" required autocomplete="student_name" autofocus>
                    @error('student_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                

            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title:') }}</label>
        
                <div class="col-md-6">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="" required autocomplete="title" autofocus>
        
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="english" class="col-md-4 col-form-label text-md-right">{{ __('English:') }}</label>
        
                <div class="col-md-6">
                    <input id="english" type="text" class="form-control @error('english') is-invalid @enderror" name="english" value="" required autocomplete="english" autofocus>
        
                    @error('english')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="kiswahili" class="col-md-4 col-form-label text-md-right">{{ __('Kiswahili:') }}</label>
        
                <div class="col-md-6">
                    <input id="kiswahili" type="text" class="form-control @error('kiswahili') is-invalid @enderror" name="kiswahili" value="" required autocomplete="kiswahili" autofocus>
        
                    @error('kiswahili')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="mathematics" class="col-md-4 col-form-label text-md-right">{{ __('Mathematics:') }}</label>
        
                <div class="col-md-6">
                    <input id="mathematics" type="text" class="form-control @error('mathematics') is-invalid @enderror" name="mathematics" value="" required autocomplete="mathematics" autofocus>
        
                    @error('mathematics')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="science" class="col-md-4 col-form-label text-md-right">{{ __('Science:') }}</label>
        
                <div class="col-md-6">
                    <input id="science" type="text" class="form-control @error('science') is-invalid @enderror" name="science" value="" required autocomplete="science" autofocus>
        
                    @error('science')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="social_studies" class="col-md-4 col-form-label text-md-right">{{ __('Social Studies:') }}</label>
        
                <div class="col-md-6">
                    <input id="social_studies" type="text" class="form-control @error('social_studies') is-invalid @enderror" name="social_studies" value="" required autocomplete="social_studies" autofocus>
        
                    @error('social_studies')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="religious_education" class="col-md-4 col-form-label text-md-right">{{ __('R.E :') }}</label>
        
                <div class="col-md-6">
                    <input id="religious_education" type="text" class="form-control @error('religious_education') is-invalid @enderror" name="religious_education" value="" required autocomplete="religious_education" autofocus>
        
                    @error('religious_education')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

                    {{-- Class name --}}
                <input id="class_name" type="hidden" class="form-control @error('class_name') is-invalid @enderror" name="class_name" value="{{$classroom->class_name}}" required autocomplete="class_name" autofocus>
                    @error('class_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                

                {{-- Teacher ID --}}
                <input id="teacher_id" type="hidden" class="form-control @error('teacher_id') is-invalid @enderror" name="teacher_id" value="{{Auth::user()->Adm_No }}" required autocomplete="teacher_id" autofocus>
                    @error('teacher_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                {{-- Teacher Name --}}
                <input id="teacher_name" type="hidden" class="form-control @error('teacher_name') is-invalid @enderror" name="teacher_name" value="{{Auth::user()->name }}" required autocomplete="teacher_name" autofocus>
                    @error('teacher_name')
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
                        {{ __('Submit') }}
                    </button>
                </div>
            </div>
            
        </form>

</div>


@else()
    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
@endsection

