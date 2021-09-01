@extends('layouts.app2')

    
@section('content')
@if (Auth::user()->user_type=='staff' || Auth::user()->user_type=='admin')
<h3 style="text-align:center">Exams</h3> 
<div class="container">

<div class="row" style="padding-right:25px">
    <div class="col-md-6" style="padding-bottom:5px;">       
         <a href="/exam/create" class="btn btn-primary" style="margin-right:50px">+ Add Exam</a>
    </div>

    <div class="col-md-6">
        <form action="/search-exams" method="GET">
            <div class="input-group">
                <input type="search" class="form-control" name="search" placeholder="Search exam..">
                <div class="input-group-btn">
                  <button class="btn btn-primary" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
              </div>
        </form>
    </div>

</div>


@if (count($exams)>0)
<table class="table table-striped">
    <tr>
        <th>Exam Title</th>
        <th>Class</th>
        <th>Subject</th>
        <th>Status</th>
        <th></th>
        <th></th>
    </tr>

    @foreach($exams as $exam)
    
    <tr>
        <td><a href="/exam/{{$exam->id}}">{{$exam->title}}</a></td>
        <td>{{$exam->class}}</td>
        <td>{{$exam->subject}}</td>
        <td></td>
        <td><a href="exam/{{$exam->id}}/edit" class="btn btn-default">Edit</a></td>
        <td>
            <script>
                
                function ConfirmDelete()
                {
                var x = confirm("Are you sure you want to delete the exam?");
                if (x)
                  return true;
                else
                  return false;
                }
              
              </script>

<form action="{{ route('exam.destroy',$exam->id) }}" method="POST" onsubmit='return ConfirmDelete()'>
@csrf
@method('DELETE')
<!-- delete button -->
    <button type="submit" class="btn btn-danger float-right">Delete</button>
</form>
        </td>
    </tr>
    @endforeach

</table>

{{ $exams->links() }}

@else
   <p class="alert alert-warning">No exams found!</p>
@endif


@elseif(Auth::user()->user_type=='student')
<h3 style="text-align:center">Exams</h3> 
@if (count($exams)>0)
<div class="container">
<table class="table table-striped">
  <tr>
      <th>Exam Title</th>
      <th>Subject</th>
      <th>Status</th>
  </tr>
  @foreach($exams as $exam)
  <tr>
        <td><a href="/exam/{{$exam->id}}">{{$exam->title}}</a></td>
        <td>{{$exam->subject}}</td>
        <td></td>
  </tr>
  @endforeach
</table>
{{ $exams->links() }}

</div>


@else
   <p class="alert alert-warning">No exams found!</p>
@endif


@endif

</div>
@endsection