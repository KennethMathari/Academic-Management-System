@extends('layouts.app')

@section('content')
<div class="container ">
@if (Auth::user()->user_type=='student')

<div class="d-flex well">
    <div class="col-md-3">
        <img src="/storage/user_images/{{Auth::user()->user_image}}" style="width:200px;height:200px;float:left;border-radius:50%;margin-right:25px;">
    </div>

    <div class="col-md-9 " style="text-align:left;padding-right:50px;font-size:16px">
        <div class="col-md-6">
            <p><b>Name: </b>{{Auth::user()->name}}</p>
            <p><b>Email: </b>{{Auth::user()->email}}</p>
            <p><b>Admission Number: </b>{{Auth::user()->Adm_No}}</p>
            {{-- <p><b>Class: </b>{{$classroomed->class_name}}</p>
            <p><b>Class Teacher: </b>{{$classroomed->teacher_name}}</p> --}}

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

            


        </div>
        <div class="col-md-6">
            <a href="/studentprofile/{{Auth::user()->Adm_No}}/edit" class="btn btn-default" style="float:right">Edit Profile</a>

        </div>

    </div>
    </div>

    <br>
    <form action="/search-examrecords" method="GET">
        <div class="input-group d-flex">
            <input type="search" class="form-control" name="search" placeholder="Search Class..">
            <span class="input-group-prepend">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search" style="font-size:18px"></i>
                </button>
            </span>
        </div>
    </form>
    <br>

@if (count($records)>0)
                        <table class="table table-striped">
                            <tr>
                                <th>Title</th>
                                <th>Class</th>
                                <th>Total</th>
                                <th>Date</th>
                            </tr>
                            @foreach ($records as $record)
                            <tr>
                                <td><a href="/performancerecords/{{$record->id}}">{{$record->title}}</a></td>
                                <td>{{$record->class_name}}</td>
                                <td>{{$record->total}}</td>
                                <td>{{$record->created_at}}</td>
                            </tr>
                            @endforeach
                        </table>

                        {{ $records->links() }}

                     @else
                        <p class="alert alert-warning">No exam records found!</p>
                    @endif
                </div>



@else()
    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>


@endif
</div>
@endsection
