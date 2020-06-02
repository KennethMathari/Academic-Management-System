@extends('layouts.app2')

    
@section('content')
<div class="container">

  @if (Auth::user()->user_type=='staff')
  <div class="row" style="padding-right:25px">
    <h3 style="text-align:center">Assignments</h3> 
    <div class="col-md-6" style="padding-bottom:5px;">       
         <a href="/assignment/create" class="btn btn-primary" style="margin-right:50px">+ Add Assignment</a>
    </div>

    <div class="col-md-6">
        <form action="/search-assignments" method="GET">
            <div class="input-group">
                <input type="search" class="form-control" name="search" placeholder="Search assignment..">
                <div class="input-group-btn">
                  <button class="btn btn-primary" type="submit">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
              </div>
        </form>
    </div>

</div>

@if (count($records)>0)

   <table class="table table-striped">
    <tr>
        <th></th>
        <th>Title</th>
        <th>Class</th>
        <th>Subject</th>
        <th>Status</th>
        <th></th>
        <th></th>

    </tr>
        @foreach($records as $key=>$image)
       <tr>
       <td>{{++$key}}</td>
       <td><a href="/assignment/{{$image->id}}">{{$image->title}}</a></td>
           <td>{{$image->class}}</td>
           <td>{{$image->subject}}</td>
           <td>
             @if (now()>$image->duedate)
                 <p>Inactive</p>
             @else
             <p>active</p>
             @endif
            
           </td>
           <td><a href="/assignment/{{$image->id}}/edit" class="btn btn-default">Edit</a></td>
           <td>
            <script>
                
                function ConfirmDelete()
                {
                var x = confirm("Are you sure you want to delete assignment?");
                if (x)
                  return true;
                else
                  return false;
                }
              
              </script>

<form action="{{ route('assignment.destroy',$image->id) }}" method="POST" onsubmit='return ConfirmDelete()'>
@csrf
@method('DELETE')
<!-- delete button -->
    <button type="submit" class="btn btn-danger float-right">Delete</button>
</form>
           </td>

      </tr>
        @endforeach
   </table>

   {{ $records->links() }}

   @else
   <p class="alert alert-warning">No assignments found!</p>
@endif

  @elseif(Auth::user()->user_type=='student')
      <h3 style="text-align: center">Assignments</h3>
      @if (count($records)>0)

   <table class="table table-striped">
    <tr>
        <th>Title</th>
        <th>Class</th>
        <th>Subject</th>
        <th>Status</th>
        <th>Teacher</th>

    </tr>
        @foreach($records as $image)
       <tr>
       <td><a href="/assignment/{{$image->id}}">{{$image->title}}</a></td>
           <td>{{$image->class}}</td>
           <td>{{$image->subject}}</td>
           <td>
             @if (now()>$image->duedate)
                 <p>Inactive</p>
             @else
             <p>active</p>
             @endif
            
           </td>
          <td>{{$image->teacher}}</td>

      </tr>
        @endforeach
   </table>

   {{ $records->links() }}

   @else
   <p class="alert alert-warning">No assignments found!</p>
@endif


  @endif

</div>
   @endsection
