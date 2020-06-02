
@extends('layouts.app2')
@section('content')

    <div class="container">
   
        @if (Auth::user()->user_type=='admin')
            
            <div class="row">
                
                    <h3 style="text-align:center">User List</h3> 
                    <div class="row" style="padding-right:25px">
            
                        <div class="col-md-6" style="padding-bottom:5px;">       
                             <a href="/users/create" class="btn btn-primary" style="margin-right:50px">+ Enroll</a>
                        </div>
            
                        <div class="col-md-6">
                            <form action="/search" method="GET">
                                <div class="input-group">
                                    <input type="search" class="form-control" name="search" placeholder="Search..">
                                    <div class="input-group-btn">
                                      <button class="btn btn-primary" type="submit">
                                        <i class="glyphicon glyphicon-search"></i>
                                      </button>
                                    </div>
                                  </div>
                            </form>
                        </div>
            
                    </div>
                
                @if (count($users)>0)
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>ID</th>
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
                




@endsection

