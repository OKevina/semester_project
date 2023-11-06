<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your App Title')</title>
    <link rel="stylesheet" href="/style.css">

</head>
<body>
    <header>
        <div class="topnavright">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ url('viewBlog.html') }}">Destinations</a></li>
            <li><a href="{{ url('contactUs.html') }}">Bookings</a></li>
        </div>
        <div class="topnav">
            <li><a href="{{ route('signup') }}">Sign Up</a></li>
            <li><a href="{{ route('signin') }}">Sign In</a></li>
        </div>
    </header>


    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2023 Travel and Tourism. All rights reserved.</p>
    </footer></body>
</html>
