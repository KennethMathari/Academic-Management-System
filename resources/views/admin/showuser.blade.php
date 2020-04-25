@extends('layouts.app')

    
@section('content')


@if (Auth::user()->user_type=='admin' || (Auth::user()->user_type=='staff' && Auth::user()->Adm_No==$classroom->teacher_id))
    <div class="container ">
        <h3 style="text-transform:capitalize;"><b>{{$user->user_type}} profile</b></h3>
        <div class="d-flex well">
        <div class="col-md-3">
            <img src="/storage/user_images/{{$user->user_image}}" style="width:200px;height:200px;float:left;border-radius:50%;margin-right:25px;">
        </div>

        <div class="col-md-9 " style="text-align:left;padding-right:50px;font-size:18px">
            <div class="col-md-6">
                <p><b>Name: </b>{{$user->name}}</p>
            <p><b>Email: </b>{{$user->email}}</p>
            <p><b>Admission Number: </b>{{$user->Adm_No}}</p>
            <p><b>Status: </b>{{$user->user_type}}</p>

            @if($user->user_type=='student')

            @foreach ($classroom->performancerecord->where('year','=',now()->year) as $record)
            @if (count($classroom->performancerecord)>1)

            <div @if ($loop->first ) class="hidden" @endif>
                <p><b>Class: </b>{{$record->class_name ?? 'N/A'}}</p>
                <p><b>Class teacher: </b><a href="/users/{{$record->teacher_id}}">{{$record->teacher_name ?? 'N/A'}}</a></p>
            </div>

            @else

            <p><b>Class: </b>{{$record->class_name ?? 'N/A'}}</p>
            <p><b>Class teacher: </b><a href="/users/{{$record->teacher_id}}">{{$record->teacher_name ?? 'N/A'}}</a></p>
            @endif
           
            @endforeach

            
            <p><b>Date of Birth: </b>{{$user->studentprofile->DoB ?? 'N/A'}}</p>
            <p><b>Gender: </b>{{$user->studentprofile->gender ?? 'N/A'}}</p>



            </div>
            <div class="col-md-6">
                <p><b>Father's name: </b>{{$user->studentprofile->father_name ?? 'N/A'}}</p>
                <p><b>Father's no: </b>{{$user->studentprofile->father_no ?? 'N/A'}}</p>
                <p><b>Mother's name: </b>{{$user->studentprofile->mother_name ?? 'N/A'}}</p>
                <p><b>Mother's no: </b>{{$user->studentprofile->mother_no ?? 'N/A'}}</p>
                <p><b>Residence: </b>{{$user->studentprofile->resident ?? 'N/A'}}</p>
                <p><b>Club: </b>{{$user->studentprofile->club ?? 'N/A'}}</p>
                <p><b>Hobbies: </b>{{$user->studentprofile->hobbies ?? 'N/A'}}</p>

                @if (Auth::user()->user_type=='student' || Auth::user()->user_type=='admin')
                <a href="/studentprofile/{{$user->Adm_No}}/edit" class="btn btn-default" style="float:right">Edit Profile</a>
                @endif
            </div>
        </div>
            </div>


            <form action="/search-examrecords" method="GET">
                <h3 style="text-align:center">Exam Records</h3> 

                <div class="input-group d-flex">
                    <a href="/performancerecords/{{$user->Adm_No}}/addmarks" class="btn btn-primary" style="margin-right:50px">+ Add Exam Records</a>
                    <input type="search" class="form-control" name="search" placeholder="Search..">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search" style="font-size:18px"></i>
                        </button>
                    </span>
                </div>
            </form>
            <br>

            {{-- checks if student has a class --}}
            @if(empty($classroom))
            <p class="alert alert-warning">No exam records found!</p>
            @else
                    

                @if (count($classroom->performancerecord)>0)
                <table class="table table-striped">
                    
                    <tr>
                        <th>Title</th>
                        <th>Class</th>
                        <th>Total</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($classroom->performancerecord()->orderBy('created_at', 'desc')->get() as $record)
                    <tr>
                        <td><a href="/performancerecords/{{$record->id}}">{{$record->title}}</a></td>
                        <td>{{$record->class_name}}</td>
                        <td>{{$record->total}}</td>
                        
                            @if (($record->year==now()->year && $record->teacher_id==Auth::user()->Adm_No) ||Auth::user()->user_type=='admin')
                            <td><a href="../performancerecords/{{$record->id}}/edit" class="btn btn-default">Edit</a></td>
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

            <form action="{{ route('performancerecords.destroy',$record->id) }}" method="POST" onsubmit='return ConfirmDelete()'>
                @csrf
                @method('DELETE')
                <!-- delete button -->
                    <button type="submit" class="btn btn-danger float-right">Delete</button>
            </form>
        </td>
                            @endif

                        
                        
                    </tr>

                    @endforeach
                </table>

                {{-- {{ $classroom->performancerecord->links() }} --}}


                    
                @else
                <p class="alert alert-warning">No exam records found!</p>
                @endif

                @endif

                
            {{-- @else
            @endif --}}
           
        
                
                @elseif($user->user_type=='staff')
                <p><b>Phone Number: </b>{{$user->staffprofile->phone_number ?? 'N/A'}}</p>
                <p><b>Class: </b>{{$user->staffprofile->class ?? 'N/A'}}</p>
                <p><b>Subjects: </b>{{$user->staffprofile->subjects ?? 'N/A'}}</p>
                <p><b>Skills: </b>{{$user->staffprofile->skills ?? 'N/A'}}</p>
                <p><b>Date of Birth: </b>{{$user->staffprofile->DoB ?? 'N/A'}}</p>
                <a href="/staffprofile/{{$user->Adm_No}}/edit" class="btn btn-default" style="float:right">Edit Profile</a>
        
        
            </div>

            
        
       
        @else
        <p><b>Date of Birth: </b>Admin</p>


        @endif
        </div>
        </div>



</div>


@else()
    <h2 class="alert alert-danger" style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
@endsection

