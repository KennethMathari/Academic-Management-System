@extends('layouts.app')

    
@section('content')
<div class="container">

@if (Auth::user()->user_type=='admin')

<img src="/storage/user_images/{{Auth::user()->user_image}}" style="width:150px;height:150px;float:left;border-radius:50%;margin-right:25px;">
<h3>{{Auth::user()->name}}</h3>
<h4>{{Auth::user()->email}}</h4>


<form method="POST" action="/admindashboard" enctype="multipart/form-data">
    {{-- @method('PUT') --}}
    <input type="file" name="user_image">
    @csrf
    <input type="submit" class="btn btn-primary">

</form>
    

<br>

    <form action="/search" method="GET">
        <div class="input-group d-flex">
            <a href="/users/create" class="btn btn-primary" style="margin-right:50px">+ Enroll</a>
            <input type="search" class="form-control" name="search" placeholder="Search..">
            <span class="input-group-prepend">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search" style="font-size:18px"></i>
                </button>
            </span>
        </div>
    </form>
    <br>

@if (count($users)>0)
                        <table class="table table-striped">
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Admission Number</th>
                                <th></th>
                                <th></th>
                            </tr>
                            @foreach ($users as $user)
                            <tr>
                                @if ($user->user_type=='admin')
                                    
                                @else
                                <td><a href="/users/{{$user->Adm_No}}">{{$user->name}}</a></td>
                                <td>{{$user->user_type}}</td>
                                <td>{{$user->Adm_No}}</td>

                            <td><a href="/users/{{$user->Adm_No}}/edit" class="btn btn-default">Edit</a></td>
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

                    <form action="{{ route('users.destroy',$user->Adm_No) }}" method="POST" onsubmit='return ConfirmDelete()'>
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

                        {{ $users->links() }}

                     @else
                        <p class="alert alert-warning">No users found!</p>
                    @endif


@else()
    <h2 class="alert alert-danger"style="text-align:center">UNAUTHORISED ACCESS!</h2>
@endif
</div>
@endsection

