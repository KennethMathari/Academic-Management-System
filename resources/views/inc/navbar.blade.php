<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="/">Cornerstone Academy</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="/">Home</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Page 1-1</a></li>
              <li><a href="#">Page 1-2</a></li>
              <li><a href="#">Page 1-3</a></li>
            </ul>
          </li>
          <li><a href="#">Page 2</a></li>
          <li><a href="#">Page 3</a></li>
        </ul>


        <ul class="nav navbar-nav navbar-right">

            @guest
                <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            @if (Route::has('register'))
                {{-- <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> --}}
            @endif
            @else
            <li class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" >
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    @if (Auth::user()->user_type=='student')
                    <li><a  href="/studentdashboard">{{ __('Dashboard') }}</a></li>
                    @elseif(Auth::user()->user_type=='staff')
                    <li><a href="/staffdashboard">{{ __('Dashboard') }}</a></li>
                    @else
                    <li><a href="/admindashboard">{{ __('Dashboard') }}</a></li>
                    @endif
                    
                    <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a></li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
        @endguest

        </ul>
      </div>
    </div>
  </nav>

  