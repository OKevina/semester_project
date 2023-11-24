<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your App Title')</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}"> <!-- Link to your global styles -->
    <style>
        .destination {
            padding: 10px;
            margin: 10px;
            color: darkblue;
            border: 1px transparent;
        }

        .hotels {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }

        .hotel {
            width: 530px;
            border: 1px solid teal;
            padding: 10px;
            margin: 10px;
        }

        .hotel img {
            width: 48%;
            height: auto;
            display: grid;
            margin-bottom: 2%;
        }

        .hotel-images {
            display: flex;
            flex-wrap: wrap;
            gap: 2%;
        }

        .book-now {
            display: block;
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 10px;
            text-decoration: none;
            margin-top: 10px; /* Equal margin from the bottom for all hotel sections */
        }

        .topnavleft {
            /* Add margin-right to create space between links */
            margin-right: 10px; /* Adjust the value as needed */
        }

        .nav-link {
            /* Additional styling for the links if needed */
            text-decoration: none;
            color: #a71b1b; /* Set your desired text color */
            padding: 8px 12px; /* Add padding for a clickable area */
            border-radius: 5px; /* Optional: Add rounded corners */
        }


    </style>



</head>
<body>
    <header>
        <div class="topnavleft">
            <a href="{{ route('home') }}" class="nav-link">Home</a>
            <a href="{{ route('destinations.index') }}" class="nav-link">Destinations</a>
            <a href="{{ url('contactUs.html') }}" class="nav-link">Contact Us</a>
        </div>

        <div class="topnav">
            @guest


    <!-- Show these links for guests (not authenticated users) -->
      <a href="{{ route('register') }}" class="nav-link">Sign Up</a>
      <a href="{{ route('login') }}" class="nav-link">Sign In</a>



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
