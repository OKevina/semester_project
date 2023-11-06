@extends('layouts.layout')

@section('title', 'Travel and Tourism')

@section('content')
<main>
    <section class="signup-section">
        <h2>Sign Up</h2>
        <form method="POST" action="{{ route('signup.process') }}">
            @csrf <!-- Add CSRF token -->

            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>

            <button type="submit">Sign Up</button>
        </form>

        <p>Already have an account? <a href="signIn.html">Sign In</a></p>
    </section>
</main>
@endsection
