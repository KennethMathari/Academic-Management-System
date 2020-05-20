@if (Auth::guest())
<nav class="navbar navbar-inverse navbar-fixed-top" id="navbar" style="background-color:#0b6623;margin:0px;">
  <div class="container-fluid">
    <div class="navbar-header" style="color:#fff">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/" style="color:#fff">Precious Cornerstone Academy</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" >
      <ul class="nav navbar-nav" >
        <li ><a href="#home" style="color:#fff">Home</a></li>
        <li><a href="#about" style="color:#fff">About</a></li>
        <li><a href="#achievement" style="color:#fff">Achievements</a></li>
        <li><a href="#contact" style="color:#fff">Contact</a></li>
        <li><a href="" style="color:#fff">News</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">

          @guest
              <li><a href="{{ route('login') }}" style="color:#fff"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          @if (Route::has('register'))
              {{-- <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> --}}
          @endif
          @else
          <li class="dropdown" >
              <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" style="color:#fff" >
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

@elseif(!Auth::guest())
<nav class="navbar navbar-inverse" id="navbar" style="background-color:#0b6623;margin:0px;">
  <div class="container-fluid">
    <div class="navbar-header" style="color:#fff">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/" style="color:#fff">Precious Cornerstone Academy</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar" >
      {{-- <ul class="nav navbar-nav" >
        <li ><a href="#home" style="color:#fff">Home</a></li>
        <li><a href="#about" style="color:#fff">About</a></li>
        <li><a href="#achievement" style="color:#fff">Achievements</a></li>
        <li><a href="#contact" style="color:#fff">Contact</a></li>
        <li><a href="" style="color:#fff">News</a></li>
      </ul> --}}

      <ul class="nav navbar-nav navbar-right">

          @guest
              <li><a href="{{ route('login') }}" style="color:#fff"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          @if (Route::has('register'))
              {{-- <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> --}}
          @endif
          @else
          <li class="dropdown" >
              <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown" style="color:#fff" >
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                  @if (Auth::user()->user_type=='student')
                  <li><a  href="/studentdashboard">{{ __('Dashboard') }}</a></li>
                  <li><a href="/assignment">{{ __('Assignment') }}</a></li>
                  @elseif(Auth::user()->user_type=='staff')
                  <li><a href="/staffdashboard">{{ __('Dashboard') }}</a></li>
                  <li><a href="/assignment">{{ __('Assignment') }}</a></li>

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

@endif




  