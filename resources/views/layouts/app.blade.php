<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name').' - ' }} @yield('title') </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    
    <style>
    /*      body {
            padding-top: 50px;
          }*/
        .starter-template {
          padding: 40px 15px;
        text-align: center;
        }
        .modal.and.carousel {
            position: fixed; 
        }
        .remove-icon{
            border:2px solid red;
            border-radius: 4px;
            background-color: red;
            color:white;
            position: absolute;
            top:12px;
            left:28px;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">            
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    @if(!Auth::guest())
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/gallery') }}">Awesome Albums</a>
                    @endif
                    
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    @if(!Auth::guest())
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;<li><a href="{{URL::route('upload')}}">Create New Album</a></li>
                    </ul>
                    @endif
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{route('home')}}">Profile</a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
