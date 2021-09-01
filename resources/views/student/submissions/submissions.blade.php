@extends('layouts.app2')

    
@section('content')
 
    <div class="container">

    <h3 class="well"><b>{{$assignment->title}}</b> - SUBMISSIONS</h3>
        @if (count($submissions)>0)

        <table class="table table-striped">
         <tr>
             <th>File</th>
             <th>Student</th>
             <th>Time</th>
             
     
         </tr>
             @foreach($submissions as $key=>$submission)
            <tr>
            <td><a href="/submission/{{$submission->id}}">{{$submission->filename}}</a></td>
                <td>{{$submission->student_name}}</td>
                <td>{{$submission->created_at->diffForHumans()}}</td>
     
           </tr>
             @endforeach
        </table>
     
        {{ $submissions->links() }}
     
        @else
        <p class="alert alert-warning">No submissions available!</p>
     @endif



@endsection
