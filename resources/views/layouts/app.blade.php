<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ URL::asset('images/icon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

</head>
<body class="blue-grey lighten-3">
    <nav class="nav-wrapper red lighten-3">
        <div class="container">
            <a class="brand-logo" href="{{ url('/') }}">
                <img src="{{ URL::asset('images/logo.png')}}">
            </a>
            <!-- Right Side Of Navbar -->
            <ul class="right hide-on-med-and-down">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    @if(Auth::user()->isAdmin())
                        <li>
                            <a href="{{ url('admin') }}">Admin</a>
                        </li>
                    @endif
                    <li>
                        <a class="dropdown-button" href="#" data-activates="dropdown1">
                            {{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                @endguest
            </ul>

        </div>
    </nav>

    <ul class="dropdown-content" id="dropdown1">
        <li>
            <a href="{{ url('feed') }}">myFeed</a>
        </li>
        <li>
            <?php
                $monthNow = date('m');
                $yearNow = date('Y');
            ?>
            <a href='{{url("summary/$monthNow/$yearNow")}}'>Summary</a>
        </li>
        <li><a href="{{ route('logout') }}"
           onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
            Logout
        </a>
        </li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </ul>

    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
</body>
</html>
