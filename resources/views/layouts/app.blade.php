<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Project') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                @if (auth()->check() && auth()->user()->role == '1')
                <a class="navbar-brand" href="{{route('admin.home')}}">
                    {{ 'AdminHome' }}
                </a>  
                @endif
                {{-- @if (auth()->check() && auth()->user()->role == '0')
                <a class="navbar-brand" href="{{route('home')}}">
                    {{ 'Home' }}
                </a>
                @endif --}}
                @if (auth()->check() && auth()->user()->role == '0')
                <a class="navbar-brand" href="{{route('posts.index')}}">
                    {{ 'Posts' }}
                </a>
                @endif
                @if (auth()->check() && auth()->user()->role == '1')
                <ul class="navbar-nav me-auto">
                    <a class="navbar-brand" href="{{ route('importview') }}">
                        {{ 'Import' }}  
                    </a>
                </ul>
                @endif
                @if (auth()->check() && auth()->user()->role == '1')
                <ul class="navbar-nav me-auto">
                    <a class="navbar-brand" href="{{ route('email') }}">
                        {{ 'Send Mail' }}  
                    </a>
                </ul>
                @endif
                @if (auth()->check() && auth()->user()->role == '1')
                <ul class="navbar-nav me-auto">
                    <a class="navbar-brand" href="{{ route('adminpost') }}">
                        {{ 'Admin Post' }}  
                    </a>
                </ul>
                @if (auth()->check() && auth()->user()->role == '1')
                <a class="navbar-brand" href="{{route('postdashboard')}}">
                    {{ ' viewPosts' }}
                </a>
                @endif
                @endif
                @if (auth()->check() && auth()->user()->role == '1')
                <a class="navbar-brand" href="{{route('paidpayments')}}">
                    {{ ' Payments Table' }}
                </a>
                @endif
                {{-- @if (auth()->check() && auth()->user()->role == '1')
                <a class="navbar-brand" href="{{route('admitCard')}}">
                    {{ ' Admit card' }}
                </a>
                @endif --}}
                
                {{-- @if (auth()->check() && auth()->user()->role == '0')
                <ul class="navbar-nav me-auto">
                    <a class="navbar-brand" href="{{ route('create') }}">
                        {{ 'Khalti Payment' }}  
                    </a>
                </ul>
                @endif --}}
                @if (auth()->check() && auth()->user()->role == '0')
                <ul class="navbar-nav me-auto">
                    <a class="navbar-brand" href="{{ route('create') }}">
                        {{ 'Khalti Payment' }}  
                    </a>
                </ul>
                @endif
                <ul class="navbar-nav me-auto">
                    <a class="navbar-brand" href="{{ route('abouts') }}">
                        {{ 'About' }}  
                    </a>
                </ul>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
            
                
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))   
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                {{-- <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>  --}}
                                    {{-- Change pasword Ko code Suru --}}
                                    {{-- <a class="dropdown-item" href="{{ route('admin.update.password') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('change-password').submit();">
                                     {{ __('Change Password') }}
                                 </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                         --}}
                                        {{-- @csrf
                                    </form>
                                </div> --}}
                                @if (auth()->check() && auth()->user()->role == '1')   
                            
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('change-password') }}">
                                        {{ __('Change Password') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('admin.create') }}">
                                        {{ __('Add Admin') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                
                                @endif
                                @if (auth()->check() && auth()->user()->role == '0')   
                                
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('students-change-password') }}">
                                        {{ __('Change Password') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                                @endif

                                
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
