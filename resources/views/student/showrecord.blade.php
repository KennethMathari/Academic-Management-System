@extends('layouts.app')

    
@section('content')

@if (Auth::user()->user_type=='admin' || Auth::user()->user_type=='staff' || (Auth::user()->user_type=='student' && $record->student_id==Auth::user()->Adm_No))

<div class="container">
<p><b>Title</b>: {{$record->title}}</p>
<p><b>Class</b>: {{$record->class_name}}</p>
<p><b>English</b>: {{$record->english}}</p>
<p><b>Kiswahili</b>: {{$record->kiswahili}}</p>
<p><b>Mathematics</b>: {{$record->mathematics}}</p>
<p><b>Science</b>: {{$record->science}}</p>
<p><b>Social Studies</b>: {{$record->social_studies}}</p>
<p><b>Religious Education</b>: {{$record->religious_education}}</p>
<p><b>Total</b>: {{$record->total}}</p>
<p><b>Teacher</b>: {{$record->teacher_name}}</p>
<p><b>Exam Date</b>: {{$record->created_at}}</p>




</div>
    
@else
<h2 class="alert alert-danger" style="text-align:center">UNAUTHORISED ACCESS!</h2>

    
@endif

@endsection
