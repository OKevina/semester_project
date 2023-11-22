@extends('layouts.app')

@section('title', 'User Bookings')

@section('content')
    <h1>User Bookings</h1>


    @foreach($bookings as $booking)
        <div class="booking-details">
            <p>Booking Code: {{ $booking->generateUniqueCode() }}</p>
            <p>Destination: {{ $booking->destination->DestinationName }}</p>
            <p>Booking Date: {{ $booking->BookingDate }}</p>
            <p>Number of Travelers: {{ $booking->NumTravelers }}</p>
            <p>Total Amount: {{ $booking->TotalAmount }}</p>

            <!-- Cancel Trip Button -->
            <form action="{{ route('cancel.trip', $booking->BookingID) }}" method="post" style="display: inline;">
                @csrf
                <button type="submit">Cancel Trip</button>
            </form>
        </div>
    @endforeach


    <div class="booking-form">
        <h2>Make a New Booking</h2>
        <form action="{{ route('book.trip') }}" method="post">
            @csrf
            <label for="destination">Select Destination:</label>
            <select name="destinationId" id="destination">
                @foreach($destinations as $destination)
                    <option value="{{ $destination->DestinationID }}">{{ $destination->DestinationName }}</option>
                @endforeach
            </select>

            <label for="numTravelers">Number of Travelers:</label>
            <input type="number" name="numTravelers" id="numTravelers" min="1" required>



            <button type="submit">Book Trip</button>
        </form>
    </div>
@endsection
