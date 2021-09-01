@extends('layouts.app2')

    
@section('content')
@if (Auth::user()->user_type=='staff' || Auth::user()->user_type=='admin')
<div class="container">
    <h3 class="well">ADD OPTIONS</h3>
    <form method="post"action="{{ route('options.store') }}" enctype="multipart/form-data">
        {{csrf_field()}}
        @foreach ($questions as $question)
        <p style="text-align: center">{!!$question->question!!}</p>
        <input  type="text" class="form-control" name="question_id" value="{{$question->id}}"  required >
        @endforeach
        
            <div class="form-group">
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align:center"><b>Add Options</b></div>
                    <div class="panel-body">

                        <label for="option1">{{ __('Option1:') }}</label>
                        <input id="option1" type="text" class="form-control @error('option1') is-invalid @enderror" name="option1"  required >
                        <label class="checkbox">
                            <input type="checkbox" value="1" name="ans1">
                            Answer
                        </label>

                        <label for="option2">{{ __('Option2:') }}</label>
                        <input id="option2" type="text" class="form-control @error('option2') is-invalid @enderror" name="option2"  required >
                        <label class="checkbox">
                            <input type="checkbox" value="1" name="ans2">
                            Answer
                        </label>

                        <label for="option3">{{ __('Option3:') }}</label>
                        <input id="option3" type="text" class="form-control @error('option3') is-invalid @enderror" name="option3"  required >
                        <label class="checkbox">
                            <input type="checkbox" value="1" name="ans3">
                            Answer
                          </label>

                          <label for="option4">{{ __('Option4:') }}</label>
                        <input id="option4" type="text" class="form-control @error('option4') is-invalid @enderror" name="option4"  required >
                        <label class="checkbox">
                            <input type="checkbox" value="1" name="ans4">
                            Answer
                        </label>

                    </div>
                </div>
            </div>



         <p style="text-align:center"><button type="submit" class="btn btn-primary" style="margin-top:10px;width:70%">Submit</button></p>

        </form>



@else
    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
</div>
@endsection