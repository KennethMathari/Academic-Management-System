@extends('layouts.app2')

@section('content')
<div class="container ">
@if (Auth::user()->user_type=='staff')
<div class="row">
    <div class="col-md-4">
        <div class="card" >
            <img src="/storage/user_images/{{Auth::user()->user_image}}" alt="{{Auth::user()->name}}" style="max-width:100%;height:300px">
            <h1>{{Auth::user()->name}}</h1>
            <p class="titlecard">{{Auth::user()->user_type}}</p>
            <p >{{Auth::user()->Adm_No}}</p>
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
        <p><b>Bio: </b>{{Auth::user()->staffprofile->bio ?? ''}}</p>
            </div>
        </div>
        
    </div>
</div>

    

    
@else()
    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>


@endif

            </div>
        </div>
        

    
</div>
@endsection
