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

  <!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->

<style>
.bgimg-1,
.bgimg-2,
.bgimg-3,
.bgimg-4 {
    position: relative;
    /* opacity: 0.; */
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.bgimg {
    background-image: url("Images/20200514_125458.jpg");
    min-height: 400%;
}
.bgimg-1 {
    background-image: url("Images/meme.jpg");
    min-height: 400%;
}

.bgimg-2 {
    background-image: url("Images/desk.jpg");
    min-height: 400px;
}

.bgimg-3 {
    background-image: url("Images/bag.jpg");
    min-height: 400px;
}

.bgimg-4 {
    background-image: url("Images/book.jpg");
    min-height: 400px;
}

.caption {
    position: absolute;
    left: 0;
    top: 50%;
    width: 100%;
    text-align: center;
    color: #000;
}

.caption span.border {
    background-color: #111;
    color: #fff;
    padding: 18px;
    font-size: 25px;
    letter-spacing: 10px;
}

h3 {
    letter-spacing: 5px;
    text-transform: uppercase;
    font: 20px "Lato", sans-serif;
    color: #111;
}

/* Turn off parallax scrolling for tablets and phones */
@media only screen and (max-device-width: 1024px) {
    .bgimg-1,
    .bgimg-2,
    .bgimg-3,
    .bgimg-4 {
        background-attachment: scroll;
    }
}

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

.field-icon {
    float: right;
    margin-left: -25px;
    margin-top: -25px;
    position: relative;
    z-index: 2;
}

</style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
    <div id="app">
        

        <main class="py-4">
            @include('inc.messages')
            @yield('content')
        </main>
    </div>
</body>
</html>
