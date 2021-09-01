@extends('layouts.app2')
@section('content')
<div class="container">
    <div class="row justify-content-center">
@if (Auth::user()->user_type=='student')
    <h1 style="text-align: center">{{$exam->title}}</h1>
    <small>{!!$exam->description!!}</small>

<form method="POST" action="/exam/questions/{{$exam->id}}-{{Str::slug($exam->title)}}" >
@csrf
<input type="hidden" value="{{$exam->id}}" name="exam_id">
        @foreach ($exam->questions as $key=>$question)
        <div class="panel panel-default" style="margin-top: 15px">
        <div class="panel-heading">
            <strong>{{$key+1}}</strong> 
            {!!$question->question!!}</div>
        <div class="panel-body">
            @error('answers.'.$key.'.option_id')
                <small class="text-danger">
                    <strong>{{ $message }}</strong>
                </small>
            @enderror
            <ul class="list-group">
                @foreach ($question->options as  $option)
                <label for="option{{$option->id}}" style="width: 100%;margin:-1px">
                    <li class="list-group-item" >
                    <input type="radio" name="answers[{{$key}}][option_id]" id="option{{$option->id}}" value="{{$option->id}}" {{(old('answers.'.$key.'.option_id')== $option->id) ? 'checked': ''}}  style="margin-right: 10px">
                    {{$option->option}}
                    <input type="hidden" name="answers[{{$key}}][question_id]" value="{{$question->id}}">
                    </li>
                </label>
                @endforeach  
            </ul>
        </div>
        </div>        
        @endforeach
        <p style="text-align:center"><button type="submit"  class="btn btn-primary" style="margin-top:10px;width:70%">Complete Exam</button></p>
</form>
    



@else
<h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
</div>
</div>

@endsection