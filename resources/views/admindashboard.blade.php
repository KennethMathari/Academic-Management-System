
@extends('layouts.app2')
@section('content')

    <div class="container">
   
        @if (Auth::user()->user_type=='admin')
            
            <div class="row">
                    <div class="card" >
                        <img src="/storage/user_images/{{Auth::user()->user_image}}" alt="{{Auth::user()->name}}" style="max-width:100%;height:300px">
                        <h1>{{Auth::user()->name}}</h1>
                        <p class="titlecard">{{Auth::user()->user_type}}</p>
                        <p>{{Auth::user()->email}}</p>
                        <p><a href="/users/{{Auth::user()->Adm_No}}/edit"><button class="btncard">Edit Profile</button></a></p>
                      </div>
                </div>
                    
                
               
                
                
                @else()
                    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
                @endif
                </div>




@endsection

