@extends('layouts.app')

@section('title', 'User Bookings')

@section('content')
    <h1>User Bookings</h1>

    @foreach($userBookings as $booking)
        <div class="booking-details">
            <p>Booking Code: {{ $booking->generateUniqueCode() }}</p>

            <!-- Access the 'destination' relationship -->
            <p>Destination: {{ optional($booking->hotel)->name }}</p>

            <p>Booking Date: {{ $booking->BookingDate }}</p>
            <p>Number of Travelers: {{ $booking->NumTravelers }}</p>
            <p>Number of Nights: {{$booking->Nights}}</p>
            <p>Total Amount: {{ $booking->TotalAmount }}</p>

            <!-- Cancel Trip Button -->
            <form action="{{ route('cancel.trip', $booking->id) }}" method="post" style="display: inline;">
                @csrf
                @method('delete')
                <button type="submit">Cancel Trip</button>
            </form>
        </div>
    @endforeach

    <div class="booking-form">
        <h2>Make a New Booking</h2>
        <form method="POST" action="{{ route('book.trip') }}">
    @csrf
    <label for="destination">Select Destination:</label>
    <select name="destinationId" id="destination" onchange="updateDestinationId()">
        @foreach($hotels as $hotel)
            <option value="{{ $hotel->id }}">{{ $hotel->name }}</option>
        @endforeach
    </select>

    <!-- Add a hidden input field to store the selected destination_id -->
    <input type="hidden" name="destination_id" id="hiddenDestinationId">

    <label for="numTravelers">Number of Travelers:</label>
    <input type="number" name="NumTravelers" id="numTravelers" min="1" required>

    <label for="Nights">Number of Nights:</label>
    <input type="number" name="Nights" id="Nights" min="1" required>

    <button type="submit">Book Trip</button>
</form>

<script>
    function updateDestinationId() {
        var dropdown = document.getElementById("destination");
        var hiddenInput = document.getElementById("hiddenDestinationId");

        // Set the value of the hidden input to the selected destination_id
        hiddenInput.value = dropdown.options[dropdown.selectedIndex].value;
    }
</script>

    </div>
@endsection
