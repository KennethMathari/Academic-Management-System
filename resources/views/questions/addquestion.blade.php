@extends('layouts.app2')  
@section('content')

@if (Auth::user()->user_type=='staff' || Auth::user()->user_type=='admin')
<div class="container">

<h3 class="well">ADD QUESTION</h3>
    <form method="post"action="{{ route('question.store') }}" enctype="multipart/form-data">
        {{csrf_field()}}

        
        <div class="form-group">
                <input id="exam_id" type="hidden" class="form-control @error('exami_id') is-invalid @enderror" name="exam_id" value="{{$exam->id}}" required >
    
                @error('exam_id')
                <small class="text-danger">
                    <strong>{{ $message }}</strong>
                </small>
                @enderror
            </div>

            <div class="form-group">
                <label for="question">{{ __('Question:') }}</label>
            <textarea rows="8" cols="50" id='article-ckeditor' type="text" class="form-control" name="question" value="{{old('question')}}" required></textarea>
        
                    @error('question')
                    <small class="text-danger">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>

                <div class="form-group">
                    <fieldset>
                        <div class="panel panel-default">
                            <div class="panel-heading" style="text-align:center"><b>Add choices and select the correct answer(s).</b></div>
                            <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="option1" type="text" class="form-control" placeholder="Enter Choice 1" name="option1" aria-describedby="optionsHelp" value="{{old('option1')}}" required>
                                    <label class="checkbox">
                                        <p style="padding-left: 15px;"><input type="checkbox" value="1" name="ans1">
                                        Correct 1</p>
                                    </label>
                                    @error('option1')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="option2" type="text" class="form-control" placeholder="Enter Choice 2" name="option2" aria-describedby="optionsHelp" value="{{old('option2')}}" required>
                                    <label class="checkbox">
                                        <p style="padding-left: 15px;"><input type="checkbox" value="1" name="ans2">
                                        Correct 2</p>
                                    </label>
                                    @error('option2')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="option3" type="text" class="form-control" placeholder="Enter Choice 3" name="option3" aria-describedby="optionsHelp" value="{{old('option3')}}" required>
                                    <label class="checkbox">
                                        <p style="padding-left: 15px;"><input type="checkbox" value="1" name="ans3">
                                        Correct 3</p>
                                    </label>
                                    @error('option3')
                                        <small class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </small>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input id="option4" type="text" class="form-control" placeholder="Enter Choice 4" name="option4" aria-describedby="optionsHelp" value="{{old('option4')}}" required>
                                    <label class="checkbox">
                                        <p style="padding-left: 15px;"><input type="checkbox" value="1" name="answer4">
                                        Correct 4</p>
                                    </label>
                                    @error('option4')
                                    <small class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </small>
                                    @enderror

                                </div>
                            </div>
                        </div>
                            </div>
                    </fieldset>
                </div>

                {{-- <div class="form-group">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="text-align:center"><b>Add options and select the correct answer(s).</b></div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <input id="option1" type="text" class="form-control" placeholder="Enter Option 1" name="option1"  required >
                                    <label class="checkbox">
                                        <p style="padding-left: 15px;"><input type="checkbox" value="1" name="ans1">
                                        Answer 1</p>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input id="option2" type="text" class="form-control" placeholder="Enter Option 2" name="option2"  required >
                                    <label class="checkbox">
                                        <p style="padding-left: 15px;"><input type="checkbox" value="1" name="ans2">
                                        Answer 2</p>
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <input id="option3" type="text" class="form-control"  placeholder="Enter Option 3" name="option3"  required >
                                    <label class="checkbox">
                                        <p style="padding-left: 15px;"><input type="checkbox" value="1" name="ans3">
                                        Answer 3</p>
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <input id="option4" type="text" class="form-control"  placeholder="Enter Option 4" name="option4"  required >
                                    <label class="checkbox">
                                        <p style="padding-left: 15px;"><input type="checkbox" value="1" name="ans4">
                                        Answer 4</p>
                                    </label>
                                </div>
                            </div>
    
                        </div>
                    </div>
                </div>  --}}
        
                

                <div class="form-group">
                    <label for="image" class="custom-file-upload">{{ __('Image:(Optional)') }}</label>
                        <input id="image" type="file" name="image" class=" @error('image') is-invalid @enderror" accept="image/*" value="{{old('image')}}">
                        @error('image')
                        <small class="text-danger">
                            <strong>{{ $message }}</strong>
                        </small>
                      @enderror
                      </div>

                    <div class="form-group">
                        <label for="score">{{ __('Score:') }}</label>
                            <input id="score" type="number" class="form-control @error('score') is-invalid @enderror" placeholder="Enter score" name="score" value="{{old('score')}}" required>
                
                            @error('score')
                            <small class="text-danger">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

           <p style="text-align:center"><button type="submit" class="btn btn-primary" style="margin-top:10px;width:70%">Add Question</button></p>

        </form>



@else
<h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
</div>
@endsection