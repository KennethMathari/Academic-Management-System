@extends('layouts.app2')  
@section('content')

@if (Auth::user()->user_type=='staff' || Auth::user()->user_type=='admin')
<div class="container">

<h3 class="well">EDIT QUESTION</h3>
    <form method="post"action="../../question/{{$question->id}}" enctype="multipart/form-data">
        {{csrf_field()}}
        @method('PUT')
            <div class="form-group">
                <label for="question">{{ __('Question:') }}</label>
                <textarea rows="8" cols="50" id='article-ckeditor' type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{$question->question }}" required>{{$question->question }}</textarea>
        
                    @error('question')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                    
                <div class="form-group">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align:center"><b>Edit options and select the correct answer(s).</b></div>
                        <div class="panel-body">

                            @foreach ($question->options as $option)
                            <div class="form-group">

                                <input id="option1" type="text" class="form-control" value="{{$option->option}}" name="option"  required >
                                    <label class="checkbox">
                                        <p style="padding-left: 25px;"><input type="checkbox" value="{{$option->is_correct}}" name="ans">
                                        Answer</p>
                                    </label>
                            </div>
                            @endforeach

    
                        </div>
                    </div>
                </div>
                

                <div class="form-group">
                    <label for="image" class="custom-file-upload">{{ __('Image:(Optional)') }}</label>
                        <input id="image" type="file" name="image" class=" @error('image') is-invalid @enderror" value="{{$question->image }}">
                        @error('image')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      </div>

                    <div class="form-group">
                        <label for="score">{{ __('Score:') }}</label>
                            <input id="score" type="number" class="form-control @error('score') is-invalid @enderror" name="score" required value="{{$question->score}}">
                
                            @error('score')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

           <p style="text-align:center"><button type="submit" class="btn btn-primary" style="margin-top:10px;width:70%">EDIT</button></p>

        </form>



@else
<h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
</div>
@endsection