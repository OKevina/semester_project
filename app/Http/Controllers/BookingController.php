<?php

namespace App\Http\Controllers;

use App\Mail\BookingCancellation;
use App\Mail\BookingConfirmation;
use App\Models\Booking;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function bookTrip($destinationId)
    {
        $user = auth()->user();
        $destination = Destination::findOrFail($destinationId);

        // Create a new booking
        $booking = new Booking();
        $booking->ID = $user->ID;
        $booking->DestinationID = $destination->DestinationID;

        $booking->TotalAmount = $destination->Price * $booking->NumTravelers;
        $booking->BookingDate = now();
        $booking->save();

        // Send booking confirmation email
        Mail::to($user->email)->send(new BookingConfirmation($booking));

        return redirect()->route('user.bookings')->with('success', 'Booking successful!');
    }

    public function cancelTrip($bookingId)
    {
        $booking = Booking::findOrFail($bookingId);
        $user = auth()->user();

        // Cancel the booking
        $booking->delete();

        // Send booking cancellation email
        Mail::to($user->email)->send(new BookingCancellation($booking));

        return redirect()->route('user.bookings')->with('success', 'Booking canceled!');
    }

    public function userBookings()
    {
        $user = auth()->user();
        $bookings = Booking::with('destination')->where('ID', $user->ID)->get();
        return view('booking.user', compact('bookings'));
    }

    public function allBookings()
    {
        $bookings = Booking::with(['user', 'destination'])->get();
        return view('booking.admin', compact('bookings'));
    }

}
