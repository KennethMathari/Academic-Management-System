@extends('layouts.app2')

@section('content')
<div class="container ">
@if (Auth::user()->user_type=='student')

<div class="row">

    <br>
    <form action="/search-examrecords" method="GET">
        <h4 style="text-align:center">Exam Records</h4>
        <div class="input-group">
            <input type="search" class="form-control" name="search" placeholder="Search class">
            <div class="input-group-btn">
              <button class="btn btn-primary" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
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
@endsection
