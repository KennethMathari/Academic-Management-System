@extends('layouts.app2')

    
@section('content')
<div class="container" style="text-align: center;padding-top:40px">
<h1 style="text-transform: uppercase;">{{$exam->title}}</h1>
<h4 style="text-transform: uppercase;">{{$exam->subject}}</h4>
<h5 style="text-transform: uppercase;">Class {{$exam->class}}</h5>
<div class="row">
    <div class="col-md-6 col-xs-6">
        <h4 style="text-align:left">Posted on <b>{{$exam->created_at->format('d-m-Y')}}</b> by <b>{{$exam->author}}</b></h4>
    </div>
    <div class="col-md-6 col-xs-6">
        <h4 style="text-align:right">Total Score: <b>{{$exam->questions->sum('score')}}</b></h4>
    </div>
</div>
<hr>
<h3>{!!$exam->instructions!!}</h3>
<p>Total Questions: <b>{{$exam->questions->count()}}</b></p>

<hr>
<a href="/exam/questions/{{$exam->id}}-{{Str::slug($exam->title)}}" class="btn btn-primary" style="font-size:20px">START EXAM</a>
</div>
@endsection