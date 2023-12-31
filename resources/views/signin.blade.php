@extends('layouts.layout')

@section('title', 'Travel and Tourism')

@section('content')
<main>
    <section class="signin-section">
        <h2>Sign In</h2>
        <form action="{{ route('signin.process') }}" method="post">
            @csrf {{-- Add CSRF token --}}
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="remember">Remember Me</label>
            <input type="checkbox" name="remember" id="remember">

            <button type="submit">Sign In</button>
        </form>

        <p>Don't have an account? <a href="{{ route('signup') }}">Sign Up</a></p>
    </section>
</main>


@endsection
