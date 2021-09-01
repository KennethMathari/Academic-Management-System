@extends('layouts.app2')

    
@section('content')
@if (Auth::user()->user_type=='staff' || Auth::user()->user_type=='admin')
<div class="container">

<div class="row" style="padding-right:25px">
    <h2 style="text-align:center;text-transform: uppercase;"><b>{{$exam->title}}</b></h2>
    <h5 style="text-align:center;text-transform: uppercase;">{{$exam->subject}}</h5>
    <p style="text-align:center">Questions</p> 
    <div class="col-md-6 col-xs-6" style="padding-bottom:5px;">       
    <a href="/question/{{$exam->id}}/create" class="btn btn-primary" style="margin-right:50px">+ Add Question</a>
    </div>

    <div class="col-md-6 col-xs-6" >
    <form action="/search-question/{{$exam->id}}/" method="GET" >
            <div class="input-group" style="float: right">
                <input type="search" class="form-control" name="search" placeholder="Search question..">
                <div class="input-group-btn">
                  <button class="btn btn-primary" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
              </div>
        </form>
    </div>

</div>

@if (count($exam->questions)>0)
<div class="row">
    <div class="col-md-6 col-xs-6">
        <p>Total Questions: <b>{{$exam->questions->count()}}</b></p>
    </div>
    <div class="col-md-6 col-xs-6" >
        <p style="text-align:right">Total Score: <b>{{$exam->questions->sum('score')}}</b></p>
    </div>
</div>

<table class="table table-striped">
    <tr>
        <th></th>
        <th>Questions</th>
        <th>Score</th>
        <th></th>
        <th></th>
    </tr>
    @foreach ($exam->questions as $key=>$question)

    <tr>
        <td>{{++$key}}</td>
        <td><a href="../question/{{$question->id}}">{!!$question->question!!}</a></td>
        <td>{{$question->score}}</td>
        <td><a href="../question/{{$question->id}}/edit" class="btn btn-default">Edit</a></td>
        <td>
            <script>
                
                function ConfirmDelete()
                {
                var x = confirm("Are you sure you want to delete the question?");
                if (x)
                  return true;
                else
                  return false;
                }
              
              </script>

<form action="{{route('question.destroy',$question->id) }}" method="POST" onsubmit='return ConfirmDelete()'>
@csrf
@method('DELETE')
<!-- delete button -->
    <button type="submit" class="btn btn-danger float-right">Delete</button>
</form>
        </td>
    </tr>


    @endforeach
</table>
{!! $exam->questions->render() !!}


    

@else
   <p class="alert alert-warning">No questions found!</p>
@endif


@else
<h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
</div>
@endsection