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
            <li><a href="{{ url('viewBlog.html') }}">Blog</a></li>
            <li><a href="{{ url('contactUs.html') }}">Contact Us</a></li>
        </div>
        <div class="topnav">
            @guest


    <!-- Show these links for guests (not authenticated users) -->
    <li><a href="{{ route('signup') }}">Sign Up</a></li>
    <li><a href="{{ route('signin') }}">Sign In</a></li>



<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
    <button type="submit">Logout</button>
</form>

     @else
                <!-- Show this link for authenticated users -->
                <li>
                <a href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                 Sign Out
                </a>
            </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @endguest
    </div>
    </header>


    <main>
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2023 Travel and Tourism. All rights reserved.</p>
    </footer>
</body>
</html>
