<?php

namespace App\Http\Controllers;
use App\Http\Controllers\API\MpesaController;
use App\Mail\BookingCancellation;
use App\Mail\BookingConfirmation;
use App\Models\Booking;
use App\Models\Hotel;
use App\Models\User;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller




{
    protected $mpesaController;

    public function __construct(MpesaController $mpesaController)
    {
        $this->mpesaController = $mpesaController;
    }


            public function bookTrip(Request $request, Hotel $hotel)
        {
            $user = auth()->user();

            // Validate the request data
            $request->validate([
                'NumTravelers' => 'required|integer|min:1',
            ]);

            $hotel = Hotel::find($request->input('destination_id'));

            // Create a new Booking instance with the necessary data
            $booking = Booking::create([
                'users_id' => $user->id,
                'destination_id' => $request->input('destination_id'),
                'NumTravelers' => $request->input('NumTravelers'),
                'TotalAmount' => (float)$request->input('price') * (int)$request->input('NumTravelers') * (int)$request->input('Nights'),
                'BookingDate' => now(),
                'Nights' => $request->input('Nights'),
            ]);

            // Save the booking
            $booking->save();

            // Send confirmation email
            Mail::to($user->email)->send(new BookingConfirmation($booking));

            // Call functions from MpesaController
            // $this->mpesaController->generateAccessToken();
            // $this->mpesaController->STKPush($request);


            // Redirect to the payment page
            return redirect()->route('payment')->with('success', 'Booking successful!');
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


        $userBookings = Booking::with('hotel')->where('users_id', auth()->user()->id)->get();
        $hotels = Hotel::select('id', 'name')->distinct()->get();
        return view('emails.booking.user', compact('userBookings', 'hotels'));



    }

    public function allBookings()
    {
        $bookings = Booking::with(['user', 'hotel'])->get();
        return view('emails.booking.admin', compact('bookings'));
    }

}
