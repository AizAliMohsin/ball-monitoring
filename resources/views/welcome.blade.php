<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .container { text-align: center; }
        .links > a { margin: 0 15px; text-decoration: none; color: #636b6f; }
    </style>
</head>
<body>
    <div class="container">
        @auth
            <h1>Welcome, {{ Auth::user()->name }}</h1>
            <div class="links">
                <a href="{{ url('/dashboard') }}">Go to App</a>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @else
            <h1>Welcome to the Ball Monitoring Application</h1>
            <div class="links">
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            </div>
        @endauth
    </div>
</body>
</html>
