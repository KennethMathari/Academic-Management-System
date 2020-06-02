<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Precious Cornerstone Academy.</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

<style>

.sidebar {
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #0b6623;
    position: fixed;
    height: 100%;
    overflow: auto;
    text-align: center;
}

.sidebar a {
    display: block;
    color: #fff;
    padding: 16px;
    text-decoration: none;
}

.sidebar a.active {
    background-color: #4caf50;
    color: white;
}

.sidebar a:hover:not(.active) {
    background-color: #f5f5f5;
    color: white;
}

div.content {
    margin-left: 200px;
    padding: 1px 16px;
    height: 1000px;
}

@media screen and (max-width: 700px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
    }
    .sidebar a {
        float: left;
    }
    div.content {
        margin-left: 0;
    }
}

@media screen and (max-width: 400px) {
    .sidebar a {
        text-align: center;
        float: none;
    }
}

</style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <div id="app">
        

        <main class="py-4">
            <div class="sidebar">
                @if (Auth::user()->user_type=='student')
                <a  href="/studentdashboard">{{ __('Dashboard') }}</a>
                <a href="/assignment">{{ __('Assignment') }}</a>
                <a href="/performancerecords">{{ __('Exam') }}</a>


                @elseif(Auth::user()->user_type=='staff')
                <a href="/staffdashboard">{{ __('Dashboard') }}</a>
                <a href="/assignment">{{ __('Assignment') }}</a>
                <a href="/classroom">{{ __('Students') }}</a>
                @else
                <a href="/admindashboard">{{ __('Dashboard') }}</a>
                <a href="/users">{{ __('Users') }}</a>
                @endif    

                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
              
              </div>
              
              <div class="content">
                @include('inc.messages')
                @yield('content')
              </div>
            
        </main>
    </div>
</body>
</html>
