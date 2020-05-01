@extends('layouts.app')

    
@section('content')

@if (Auth::user()->user_type=='admin'||Auth::user()->user_type=='staff')
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center"><b>Edit Exam Record </b></div>
            <div class="panel-body">
                <form method="POST" action="/performancerecords/{{$record->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
        
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title:') }}</label>
                
                        <div class="col-md-6">
                            <input id="title" type="string"  class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $record->title}}" required autocomplete="title" autofocus>
                
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
                            <input id="english" type="string"  class="form-control @error('english') is-invalid @enderror" name="english" value="{{ old('english') ?? $record->english}}" required autocomplete="english" autofocus>
                
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
                            <input id="kiswahili" type="string"  class="form-control @error('kiswahili') is-invalid @enderror" name="kiswahili" value="{{ old('kiswahili') ?? $record->kiswahili}}" required autocomplete="kiswahili" autofocus>
                
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
                            <input id="mathematics" type="string"  class="form-control @error('mathematics') is-invalid @enderror" name="mathematics" value="{{ old('mathematics') ?? $record->mathematics}}" required autocomplete="mathematics" autofocus>
                
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
                            <input id="science" type="string"  class="form-control @error('science') is-invalid @enderror" name="science" value="{{ old('science') ?? $record->science}}" required autocomplete="science" autofocus>
                
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
                            <input id="social_studies" type="string"  class="form-control @error('social_studies') is-invalid @enderror" name="social_studies" value="{{ old('social_studies') ?? $record->social_studies}}" required autocomplete="social_studies" autofocus>
                
                            @error('social_studies')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label for="religious_education" class="col-md-4 col-form-label text-md-right">{{ __('Religious Education:') }}</label>
                
                        <div class="col-md-6">
                            <input id="religious_education" type="string"  class="form-control @error('religious_education') is-invalid @enderror" name="religious_education" value="{{ old('religious_education') ?? $record->religious_education}}" required autocomplete="religious_education" autofocus>
                
                            @error('religious_education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label for="teacher_id" class="col-md-4 col-form-label text-md-right">{{ __('Teacher ID:') }}</label>
                
                        <div class="col-md-6">
                            <input id="teacher_id" type="string"  class="form-control @error('teacher_id') is-invalid @enderror" name="teacher_id" value="{{ old('teacher_id') ?? Auth::user()->Adm_No}}" required autocomplete="teacher_id" autofocus>
                
                            @error('teacher_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label for="teacher_name" class="col-md-4 col-form-label text-md-right">{{ __('Teacher Name:') }}</label>
                
                        <div class="col-md-6">
                            <input id="teacher_name" type="string"  class="form-control @error('teacher_name') is-invalid @enderror" name="teacher_name" value="{{ old('teacher_name') ?? Auth::user()->name}}" required autocomplete="teacher_name" autofocus>
                
                            @error('teacher_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
        
                    <div class="form-group">
                            <p style="text-align:center"><button type="submit" class="btn btn-primary" style="width:60%">
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

