@extends('layouts.app2')

@section('content')
<div class="container ">
@if (Auth::user()->user_type=='student')

<div class="row">
    <div class="col-md-4">
        <div class="card" >
            <img src="/storage/user_images/{{Auth::user()->user_image}}" alt="{{Auth::user()->name}}" style="max-width:100%;height:300px">
            <h1>{{Auth::user()->name}}</h1>
            <p class="titlecard">{{Auth::user()->Adm_No}}</p>
            <p>{{Auth::user()->email}}</p>
            <p><a href="/studentprofile/{{Auth::user()->Adm_No}}/edit"><button class="btncard">Edit Profile</button></a></p>
          </div>    
    </div>

    <div class="col-md-8 " style="text-align:left;padding-right:50px;font-size:16px">
        <div class="panel panel-default">
            <div class="panel-heading" style="text-align:center"><b>Details</b></div>
            <div class="panel-body">
                @foreach ($records->where('student_id','=',Auth::user()->Adm_No)->where('year','=',now()->year) as $record)
                @if (count($records)>1)
                    <div @if ($loop->last ) class="hidden" @endif>
                        <p><b>Class: </b>{{$record->class_name}}</p>
                        <p><b>Class Teacher: </b>{{$record->teacher_name}}</p>
                    </div>
                @elseif(count($records)<1)
                        <p><b>Class: </b>{{$record->class_name}}</p>
                        <p><b>Class Teacher: </b>{{$record->teacher_name}}</p>
                        
                @endif
                
                @endforeach
                        <p><b>Date of Birth: </b>{{Auth::user()->studentprofile->DoB->format('d-m-Y') ?? ''}}</p>
                        <p><b>Gender: </b>{{Auth::user()->studentprofile->gender ?? ''}}</p>
                        <p><b>Father's name: </b>{{Auth::user()->studentprofile->father_name ?? ''}}</p>
                        <p><b>Father's no: </b>{{Auth::user()->studentprofile->father_no ?? ''}}</p>
                        <p><b>Mother's name: </b>{{Auth::user()->studentprofile->mother_name ?? ''}}</p>
                        <p><b>Mother's no: </b>{{Auth::user()->studentprofile->mother_no ?? ''}}</p>
                        <p><b>Residence: </b>{{Auth::user()->studentprofile->resident ?? ''}}</p>
                        <p><b>Club: </b>{{Auth::user()->studentprofile->club ?? ''}}</p>
                        <p><b>Hobbies: </b>{{Auth::user()->studentprofile->hobbies ?? ''}}</p>
            </div>
        </div>

    </div>
    </div>



@else()
    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>


@endif
</div>
@endsection
