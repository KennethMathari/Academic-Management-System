@extends('layouts.app')

    
@section('content')

@if (Auth::user()->user_type=='staff' || Auth::user()->user_type=='admin')

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align:center"><b>Add Exam Marks</b></div>
        <div class="panel-body">
            <form  action="{{url('performancerecords ')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group ">        
                        <input id="student_id" type="hidden" class="form-control @error('student_id') is-invalid @enderror" name="student_id" value="{{$classroom->student_id}}" required autocomplete="student_id" autofocus>
            
                        @error('class_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                        {{-- Student Name --}}
                        <input id="student_name" type="hidden" class="form-control @error('student_name') is-invalid @enderror" name="student_name" value="{{$classroom->student_name}}" required autocomplete="student_name" autofocus>
                        @error('student_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
    
                <div class="form-group">
                    <label for="title">{{ __('Title:') }}</label>
            
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="" required autocomplete="title" autofocus >
            
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                <div class="form-group">
                    <label for="english" >{{ __('English:') }}</label>
            
                        <input id="english" type="number" class="form-control @error('english') is-invalid @enderror" name="english" value="" required autocomplete="english" autofocus >
            
                        @error('english')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                
    
                <div class="form-group">
                    <label for="kiswahili" >{{ __('Kiswahili:') }}</label>
            
                        <input id="kiswahili" type="number" class="form-control @error('kiswahili') is-invalid @enderror" name="kiswahili" value="" required autocomplete="kiswahili" autofocus>
            
                        @error('kiswahili')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                <div class="form-group ">
                    <label for="mathematics" >{{ __('Mathematics:') }}</label>
            
                        <input id="mathematics" type="number" class="form-control @error('mathematics') is-invalid @enderror" name="mathematics" value="" required autocomplete="mathematics" autofocus>
            
                        @error('mathematics')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                <div class="form-group">
                    <label for="science" >{{ __('Science:') }}</label>
            
                        <input id="science" type="number" class="form-control @error('science') is-invalid @enderror" name="science" value="" required autocomplete="science" autofocus>
            
                        @error('science')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                <div class="form-group ">
                    <label for="social_studies" >{{ __('Social Studies:') }}</label>
            
                        <input id="social_studies" type="number" class="form-control @error('social_studies') is-invalid @enderror" name="social_studies" value="" required autocomplete="social_studies" autofocus>
            
                        @error('social_studies')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
    
                <div class="form-group">
                    <label for="religious_education" >{{ __('R.E :') }}</label>
            
                        <input id="religious_education" type="number" class="form-control @error('religious_education') is-invalid @enderror" name="religious_education" value="" required autocomplete="religious_education" autofocus>
            
                        @error('religious_education')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
    
                <div class="form-group ">
                        <p style="text-align:center"><button type="submit" class="btn btn-primary" style="width:100%">
                            {{ __('Submit') }}
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

