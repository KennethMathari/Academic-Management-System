@extends('layouts.app2')    
@section('content')

<div class="container">
<div class="row">

    <h3 style="text-align:center">Student List</h3>
            <div class="col-md-6">
                <a href="/classroom/create" class="btn btn-primary" style="margin-right:50px">+ Add Student</a>
            </div>
    
            <div class="col-md-6">
                <form action="/search-student" method="GET">
                    <div class="input-group">
                        <input type="search" class="form-control" name="search" placeholder="Search student..">
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
                            <th>ID</th>
                            <th></th>
                            <th></th>
                            <th>       
                                <a href="{{url('dynamic_pdf/pdf')}}" class="btn btn-warning" target="_blank"><i class="fa fa-print"></i> 
                                    Print</a>
                            </th>

                        </tr>
                        @foreach ($users as $user)
                        <tr>
                        <td><a href="/users/{{$user->student_id}}">{{$user->student_name}}</a></td>
                        <td>{{$user->student_id}}</td>

                        <td><a href="classroom/{{$user->student_id}}/edit " class="btn btn-default">
                            Edit</a></td>
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
                            <td></td>
                        </tr>
                        @endforeach
                    </table>

                    {{ $users->links() }}
                 @else
                    <p class="alert alert-warning">No students found!</p>
                @endif

            </div>
</div>

            @endsection

