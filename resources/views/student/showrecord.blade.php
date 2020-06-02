@extends('layouts.app2')

    
@section('content')

@if (Auth::user()->user_type=='admin' || Auth::user()->user_type=='staff' || (Auth::user()->user_type=='student' && $record->student_id==Auth::user()->Adm_No))

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align:center"><b>{{$record->title}}</b></div>
        <div class="panel-body">
            <div class="row" style="text-align:center">
                <div class="col-md-4"><b>Name:  </b>{{$record->student_name}}</div>
                <div class="col-md-4"><b>Student ID:  </b>{{$record->student_id}}</div>
                <div class="col-md-4"><b>Class:  </b>{{$record->class_name}}</div>
            </div>
            <hr>
            <div style="text-align:center">
            <p><b>English</b>: {{$record->english}}</p>
            <p><b>Kiswahili</b>: {{$record->kiswahili}}</p>
            <p><b>Mathematics</b>: {{$record->mathematics}}</p>
            <p><b>Science</b>: {{$record->science}}</p>
            <p><b>Social Studies</b>: {{$record->social_studies}}</p>
            <p><b>Religious Education</b>: {{$record->religious_education}}</p>
            <p><b>Total</b>: {{$record->total}}</p>
            <hr>
        </div>
            <p><b>Teacher</b>: {{$record->teacher_name}}</p>
            <p><b>Date</b>: {{$record->created_at}}</p>
            
        </div>
    </div>





</div>
    
@else
<h2 class="alert alert-danger" style="text-align:center">UNAUTHORISED ACCESS!</h2>

    
@endif

@endsection
