<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('images/WhiteLogo.png') }}" type="image/png">
    <title>Chiro Negenmanneke</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="top-bar">
            <!-- Left Section: Menu and Profile -->
            <div class="left-actions">
                <div class="dropdown">
                    <button class="dropdown-toggle">Menu</button>
                    <div class="dropdown-menu">
                        <a href="{{ route('welcome') }}">Home</a>
                        <a href="#about">About</a>
                        <a href="#events">Events</a>
                        <a href="contact">Contact</a>
                        <a href="#faq">FAQ.</a>
                       
                    </div>
                </div>

                @guest
                    @if (Route::has('login'))
                        <a class="btn-left" href="{{ route('login') }}">Login</a>
                    @endif
                @else
                    <div class="dropdown">
                        <button class="dropdown-toggle">{{ Auth::user()->name }}</button>
                        <div class="dropdown-menu">
                            <a href="profile">Profile</a>
                            <a href="{{ route('logout') }}" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            
                            @if (auth()->check() && auth()->user()->isAdmin)
                                <a href="{{ route('admin.dashboard') }}">Admin</a>
                            @endif
                            
                        </div>
                    </div>
                @endguest
            </div>

            <!-- Center Section: Logo and Title -->
            <div class="logo-container">
                <img src="{{ asset('images/WhiteLogo.png') }}" alt="Chiro Logo" style="height:50px">
                <div class="logo" style="margin-top: 5px; font-size: 2rem; font-weight: bold;">
                    Chiro Negenmanneke
                </div>
            </div>
        </div>  

        <main>
            @yield('content')
        </main>
    </div>
    <footer>
        <!-- Footer content -->
    </footer>
</body>
</html>