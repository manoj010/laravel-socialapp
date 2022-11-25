<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article App</title>
    @vite(['resources/js/app.js'])
</head>
<body>
    <!-- dynamic content -->
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg p-2">
        <a class="navbar-brand" href="#">Article App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @auth
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link">Welcome, {{auth()->user()->name}}</a>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="{{route('logout')}}">Log Out</a> -->
                    <form action="{{route('logout')}}" method="get">
                        <button type="submit" class="btn btn-danger">Log Out</button>
                    </form>
                </li>
            </ul>
        </div>
        @endauth

        @guest
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('signup')}}">Sign Up</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                </li>
            </ul>
        </div>
        @endguest
    </nav>
    @yield('content')
</body>
</html>