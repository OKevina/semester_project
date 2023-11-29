@extends('layouts.app')

@section('title', 'All Bookings')

@section('content')
    <h1>All Bookings</h1>

    @foreach($bookings as $booking)
        <div class="booking-details">
            <p>Booking Code: {{ $booking->generateUniqueCode() }}</p>
            <p>User: {{ $booking->user->name }}</p>

            <p>Booking Date: {{ $booking->BookingDate }}</p>
            <p>Number of Travelers: {{ $booking->NumTravelers }}</p>
            <p>Total Amount: {{ $booking->TotalAmount }}</p>
        </div>
    @endforeach
@endsection
