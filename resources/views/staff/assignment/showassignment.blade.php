@extends('layouts.app')

    
@section('content')

<div class="container">
<div class="panel panel-default">
    <div class="panel-heading" style="text-align:center">
        <p><h3>{{$assignment->title}}</h3> - {{$assignment->subject}}</p>
        <h4 style="text-align:right">Posted on {{$assignment->created_at}}</h4>
    </div>
    <div class="panel-body" style="text-align:center">
        <?php foreach (json_decode($assignment->filename)as $picture) { ?>
        <img src="{{ asset('/Assignments/'.$picture) }}" style="height:120px; width:200px"/>
       <?php } ?>

       <p>{{$assignment->description}}</p>

    </div>
    <div class="panel-footer">
        <p><b>Due date:</b>{{$assignment->duedate}}</p>
        <p><b>Teacher:</b>{{$assignment->teacher}}</p>
    </div>

  </div>
</div>


@endsection
