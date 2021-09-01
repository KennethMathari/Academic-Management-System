@extends('layouts.app2')  
@section('content')

@if (Auth::user()->user_type=='staff' || Auth::user()->user_type=='admin')
<div class="container" style="text-align: center">
    <div class="panel panel-default mt-5">
        <div class="panel-heading">

    @if(empty($question->image))

    @else
    <img  src="{{ url('QuestionImage/'.$question->image) }}" style="max-width:100%;height:300px">
    @endif

<p >{!!$question->question!!}({{$question->score}} marks)</p>
        </div>

<div class="panel-body">
@foreach ($question->options as $option)
<ul class="list-group">
<input type="checkbox">  {{$option->option}}
</ul>
@endforeach
</div>
    </div>



@else
<h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
</div>
@endsection