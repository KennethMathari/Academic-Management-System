@extends('layouts.app')

    
@section('content')


@if (Auth::user()->user_type=='admin' || (Auth::user()->user_type=='staff' && Auth::user()->Adm_No==$classroom->teacher_id))
    <div class="container ">
        <h3 style="text-transform:capitalize;text-align:center"><b>{{$user->user_type}} profile</b></h3>
        <div class="row">
        <div class="col-md-4">
            <div class="card" >
                <img src="/storage/user_images/{{$user->user_image}}" alt="{{$user->name}}" style="max-width:100%;height:300px">
                <h1>{{$user->name}}</h1>
                <p class="titlecard">{{$user->Adm_No}}</p>
                <p>{{$user->email}}</p>
                @if (Auth::user()->user_type=='student' || Auth::user()->user_type=='admin')
                @if ($user->user_type=='student')
                <p><a href="/studentprofile/{{$user->Adm_No}}/edit"><button class="btncard">Edit Profile</button></a></p>
                @else
                <p><a href="/staffprofile/{{$user->Adm_No}}/edit"><button class="btncard">Edit Profile</button></a></p>

                @endif
                @endif
              </div>        
            </div>

        <div class="col-md-8" style="text-align:left;padding-right:50px;font-size:18px">

            @if($user->user_type=='student')
            <div class="panel panel-default">
                <div class="panel-heading" style="text-align:center"><b>Details</b></div>
                @if(empty($classroom))
                <div class="panel-body">
                <p><b>Date of Birth: </b>{{$user->studentprofile->DoB ?? ''}}</p>
                <p><b>Gender: </b>{{$user->studentprofile->gender ?? ''}}</p>
                <p><b>Father's name: </b>{{$user->studentprofile->father_name ?? ''}}</p>
                <p><b>Father's no: </b>{{$user->studentprofile->father_no ?? ''}}</p>
                <p><b>Mother's name: </b>{{$user->studentprofile->mother_name ?? ''}}</p>
                <p><b>Mother's no: </b>{{$user->studentprofile->mother_no ?? ''}}</p>
                <p><b>Residence: </b>{{$user->studentprofile->resident ?? ''}}</p>
                <p><b>Club: </b>{{$user->studentprofile->club ?? ''}}</p>
                <p><b>Hobbies: </b>{{$user->studentprofile->hobbies ?? ''}}</p>
                </div>
                @else
                <div class="panel-body" style="text-align:center">
                    @foreach ($classroom->performancerecord->where('year','=',now()->year) as $record)
                    @if (count($classroom->performancerecord)>1)
        
                    <div @if ($loop->first ) class="hidden" @endif>
                        <p><b>Class: </b>{{$record->class_name ?? ''}}</p>
                        @if (Auth::user()->user_type=='admin')
                        <p><b>Class teacher: </b><a href="/users/{{$record->teacher_id}}">{{$record->teacher_name ?? ''}}</a></p>
                        @else
                        <p><b>Class teacher: </b>{{$record->teacher_name ?? ''}}</p>
                        @endif
                    </div>
        
                    @else
        
                    <p><b>Class: </b>{{$record->class_name ?? ''}}</p>
                    @if (Auth::user()->user_type=='admin')
                    <p><b>Class teacher: </b><a href="/users/{{$record->teacher_id}}">{{$record->teacher_name ?? ''}}</a></p>
                    @else
                    <p><b>Class teacher: </b>{{$record->teacher_name ?? ''}}</p>
                    @endif                    
                    @endif
                   
                    @endforeach
    
                    <p><b>Date of Birth: </b>{{$user->studentprofile->DoB ?? ''}}</p>
                    <p><b>Gender: </b>{{$user->studentprofile->gender ?? ''}}</p>
                    <p><b>Father's name: </b>{{$user->studentprofile->father_name ?? ''}}</p>
                    <p><b>Father's #: </b>{{$user->studentprofile->father_no ?? ''}}</p>
                    <p><b>Mother's name: </b>{{$user->studentprofile->mother_name ?? ''}}</p>
                    <p><b>Mother's #: </b>{{$user->studentprofile->mother_no ?? ''}}</p>
                    <p><b>Residence: </b>{{$user->studentprofile->resident ?? ''}}</p>
                    <p><b>Club: </b>{{$user->studentprofile->club ?? ''}}</p>
                    <p><b>Hobbies: </b>{{$user->studentprofile->hobbies ?? ''}}</p>
                </div>
                @endif

            </div>
           
            </div>

        </div>

<div class="row">
    <h3 style="text-align:center">Exam Records</h3> 
    <div class="col-md-6">
        <a href="/performancerecords/{{$user->Adm_No}}/addmarks" class="btn btn-primary" style="margin-right:50px">+ Add Exam Records</a>
    </div>
    <div class="col-md-6">
        <form action="/search-examrecords" method="GET">
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
</div>
            
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
           
        
                
                @elseif($user->user_type=='staff')
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align:center"><b>Details</b></div>
                    <div class="panel-body">
                <p><b>Phone Number: </b>{{$user->staffprofile->phone_number ?? 'N/A'}}</p>
                <p><b>Class: </b>{{$user->staffprofile->class ?? 'N/A'}}</p>
                <p><b>Subjects: </b>{{$user->staffprofile->subjects ?? 'N/A'}}</p>
                <p><b>Skills: </b>{{$user->staffprofile->skills ?? 'N/A'}}</p>
                <p><b>Date of Birth: </b>{{$user->staffprofile->DoB ?? 'N/A'}}</p>
                    </div>
                </div>
                        
        
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

