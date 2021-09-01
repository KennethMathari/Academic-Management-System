@extends('layouts.app2')

    
@section('content')
@if (Auth::user()->user_type=='staff' || Auth::user()->user_type=='admin')
<div class="container">
    <h3 class="well">ADD EXAM</h3>
    <form method="post"action="{{ route('exam.store') }}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="title">{{ __('Title:') }}</label>
                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" required >
    
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="instructions">{{ __('Instructions:') }}</label>
                <textarea rows="8" cols="50" id='article-ckeditor' type="text" class="form-control @error('instructions') is-invalid @enderror" name="instructions" value="{{ old('instructions') }}" required></textarea>
        
                    @error('instructions')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="class">{{ __('Class:') }}</label>    
                        <select id="class" class="form-control @error('class') is-invalid @enderror" name="class" required>
                            <option value=""></option>
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
                        <label for="subject">{{ __('Subject:') }}</label>
                            <input id="subject" type="text" class="form-control @error('subject') is-invalid @enderror" name="subject" required >
                
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                            <div class="form-group">
                                <input id="author" type="hidden" class="form-control @error('author') is-invalid @enderror" name="author" value="{{Auth::user()->name}}" required >
                            
                                        @error('author')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <p style="text-align:center"><button type="submit" class="btn btn-primary" style="margin-top:10px;width:70%">Submit</button></p>

        </form>



@else
    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
</div>
@endsection