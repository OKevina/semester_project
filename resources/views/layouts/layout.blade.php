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
            <a href="{{ route('linegraph') }}" class="nav-link">Charts</a>

            @if(auth()->check())
            @if(auth()->user()->hasRole('admin'))
                <a href="{{ route('admin.bookings') }}" class="nav-link">All Bookings</a>
            @else
                <a href="{{ route('user.bookings') }}" class="nav-link">My Bookings</a>
            @endif
        @endif

        </div>

        <div class="topnav">
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
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
