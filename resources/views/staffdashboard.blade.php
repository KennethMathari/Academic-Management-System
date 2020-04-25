@extends('layouts.app')

@section('content')
<div class="container ">
@if (Auth::user()->user_type=='staff')
<div class="d-flex">
    <div class="col-md-3">
        <img src="/storage/user_images/{{Auth::user()->user_image}}" style="width:200px;height:200px;float:left;border-radius:50%;margin-right:25px;">
    </div>

    <div class="col-md-9 well" style="text-align:left;padding-right:50px;font-size:18px">

        <div class="col-md-6">
            <p><b>Name: </b>{{Auth::user()->name}}</p>
            <p><b>Email: </b>{{Auth::user()->email}}</p>
            <p><b>Staff ID: </b>{{Auth::user()->Adm_No}}</p>
            <p><b>Class: </b>{{Auth::user()->staffprofile->class}}</p>
        </div>
        <div class="col-md-6">
            <a href="/staffprofile/{{Auth::user()->Adm_No}}/edit" class="btn btn-default" style="float:right">Edit Profile</a>
        </div>

    </div>
</div>
<form action="/search-student" method="GET">
    <h3 style="text-align:center">Student List</h3>

    <div class="input-group d-flex">
        <a href="/classroom/create" class="btn btn-primary" style="margin-right:50px">+ Add Student</a>
        <input type="search" class="form-control" name="search" placeholder="Search..">
        <span class="input-group-prepend">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search" style="font-size:18px"></i>
            </button>
        </span>
    </div>
</form>
<br>

    @if (count(Auth::user()->staffprofile->classroom)>0)
                        <table class="table table-striped">
                            
                            <tr>
                                <th>Student Name</th>
                                <th>Adm. No</th>
                                <th>Class</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($users as $user)
                            <tr>
                            <td><a href="/users/{{$user->student_id}}">{{$user->student_name}}</a></td>
                            <td>{{$user->student_id}}</td>
                                <td>{{$user->class_name}}</td>

                            <td><a href="classroom/{{$user->student_id}}/edit " class="btn btn-default">Edit</a></td>
                                <td>
                                    <script>

                                        function ConfirmDelete()
                                        {
                                        var x = confirm("Are you sure you want to delete?");
                                        if (x)
                                          return true;
                                        else
                                          return false;
                                        }
                                      
                                      </script>

                    <form action="{{ route('classroom.destroy',$user->student_id) }}" method="POST" onsubmit='return ConfirmDelete()'>
                        @csrf
                        @method('DELETE')
                        <!-- delete button -->
                            <button type="submit" class="btn btn-danger float-right">Delete</button>
                    </form>


                                </td>
                            </tr>
                            @endforeach
                        </table>

                        {{ $users->links() }}
                     @else
                        <p class="alert alert-warning">No students found!</p>
                    @endif

                </div>


    
@else()
    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>


@endif
</div>
@endsection
