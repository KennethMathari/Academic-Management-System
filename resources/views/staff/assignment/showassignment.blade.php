@extends('layouts.app2')

    
@section('content')

<div class="container">
<div class="panel panel-default" style="margin-top: 10px;">
    <div class=" panel-heading" >
        <div class="row">
        <h3 style="text-align:center"><b>{{$assignment->title}}</b></h3>
        <h5 style="text-align:center"><b>{{$assignment->subject}}</b></h5>

        <div class="col-md-6 col-xs-6">
            <a href="/assignment/download/{{$assignment->filename}}" class="btn btn-warning">Download</a>
        </div>
        <div class="col-md-6  col-xs-6">        
        <p style="text-align:right"><b>Due Date: </b>{{$assignment->duedate->diffForHumans()}}</p>
      
        </div>
        </div>
    </div>
    <div class="row panel-body" style="text-align:center;margin:0px;">

        <iframe src="{{ asset('/Assignments/'.$assignment->filename) }}" height="400" style=" width:100%" frameborder="0" class="col-xs-12" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

       <p>{{$assignment->description}}</p>

    </div>
    <div class=" panel-footer">
        <div class="row">
        <div class="col-md-6 col-xs-6">
            <p><b>Posted on:</b>{{$assignment->created_at->format('d-m-Y')}}</p>
            <p><b>Teacher:</b>{{$assignment->teacher}}</p>
        </div>
        <div class="col-md-6 col-xs-6">
            @if (Auth::user()->user_type=='staff')
            <p style="text-align: right"><a class="btn btn-default" href="/assignment/submission/{{$assignment->id}}">View Submissions</a></p>
            @elseif(Auth::user()->user_type=='student')
                 @if (now()>$assignment->duedate)
                     <p style="text-align: right;color:red"><b>Assignment is overdue!</b></p>
                 @else
            <p style="text-align: right"><a class="btn btn-primary" href="/assignment/submission/create/{{$assignment->id}}">Submit Assignment</a></p>

                @endif

            @endif
        </div>
        </div>

        
    </div>

  </div>
</div>


@endsection
