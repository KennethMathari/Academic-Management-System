@extends('layouts.app')

@section('content')
<div class="container ">
@if (Auth::user()->user_type=='staff')
<div class="row">
    <div class="col-md-4">
        <div class="card" >
            <img src="/storage/user_images/{{Auth::user()->user_image}}" alt="{{Auth::user()->name}}" style="max-width:100%;height:300px">
            <h1>{{Auth::user()->name}}</h1>
            <p class="titlecard">{{Auth::user()->user_type}}</p>
            <p>{{Auth::user()->email}}</p>
            <p><a href="/staffprofile/{{Auth::user()->Adm_No}}/edit"><button class="btncard">Edit Profile</button></a></p>
          </div>    
        </div>

    <div class="col-md-8" style="text-align:left;padding-right:50px;font-size:18px">

        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center"><b>Details</b></div>
            <div class="panel-body">
        <p><b>Phone Number: </b>{{Auth::user()->staffprofile->phone_number ?? ''}}</p>
        <p><b>Class: </b>{{Auth::user()->staffprofile->class ?? ''}}</p>
        <p><b>Subjects: </b>{{Auth::user()->staffprofile->subjects ?? ''}}</p>
        <p><b>Skills: </b>{{Auth::user()->staffprofile->skills ?? ''}}</p>
        <p><b>Date of Birth: </b>{{Auth::user()->staffprofile->DoB ?? ''}}</p>
            </div>
        </div>
        
    </div>
</div>

    <div class="row">

        <h4 style="text-align:center">Student List</h4>
                <div class="col-md-6">
                    <a href="/classroom/create" class="btn btn-primary" style="margin-right:50px">+ Add Student</a>
                </div>
        
                <div class="col-md-6">
                    <form action="/search-student" method="GET">
                        <div class="input-group">
                            <input type="search" class="form-control" name="search" placeholder="Search">
                            <div class="input-group-btn">
                              <button class="btn btn-primary" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                              </button>
                            </div>
                          </div>
                    </form>
                </div>
                <br>
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
        </div>
        

    
</div>
@endsection
