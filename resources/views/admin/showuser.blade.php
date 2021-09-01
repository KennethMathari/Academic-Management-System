@extends('layouts.app2')

    
@section('content')


@if (Auth::user()->user_type=='admin' || (Auth::user()->user_type=='staff' && Auth::user()->Adm_No==$classroom->teacher_id))
    <div class="container ">
        <h3 style="text-transform:capitalize;text-align:center"><b>{{$user->user_type}} profile</b></h3>
        <div class="row">
        <div class="col-md-4">
            <div class="card" >
                <img src="/UserImages/{{$user->user_image}}" alt="{{$user->name}}" style="max-width:100%;height:300px">
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
                <div class="panel-body">
                <p><b>Date of Birth: </b>{{ Carbon\Carbon::parse($user->studentprofile->DoB)->format('d-m-Y') ?? '' }}</p>
                <p><b>Gender: </b>{{$user->studentprofile->gender ?? ''}}</p>
                <p><b>Father's name: </b>{{$user->studentprofile->father_name ?? ''}}</p>
                <p><b>Father's no: </b><a href="tel:{{ $user->studentprofile->father_no }}">{{ $user->studentprofile->father_no ?? ''}}</a></p>
                <p><b>Mother's name: </b>{{$user->studentprofile->mother_name ?? ''}}</p>
                <p><b>Mother's no: </b><a href="tel:{{ $user->studentprofile->mother_no }}">{{ $user->studentprofile->mother_no ?? ''}}</a></p>
                <p><b>Residence: </b>{{$user->studentprofile->resident ?? ''}}</p>
                <p><b>Club: </b>{{$user->studentprofile->club ?? ''}}</p>
                <p><b>Hobbies: </b>{{$user->studentprofile->hobbies ?? ''}}</p>
                </div>

                

            </div>
           
            </div>

        </div>
                
                @elseif($user->user_type=='staff')
                <div class="panel panel-default">
                    <div class="panel-heading" style="text-align:center"><b>Details</b></div>
                    <div class="panel-body">
                <p><b>Phone Number: </b><a href="tel:{{ $user->staffprofile->phone_number }}">{{ $user->staffprofile->phone_number ?? ''}}</a></p>
                <p><b>Class: </b>{{$user->staffprofile->class ?? 'N/A'}}</p>
                <p><b>Bio: </b>{{$user->staffprofile->bio ?? 'N/A'}}</p>
                <p><b>Subjects: </b>{{$user->staffprofile->subjects ?? 'N/A'}}</p>
                <p><b>Skills: </b>{{$user->staffprofile->skills ?? 'N/A'}}</p>
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

