<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Booking;
use Illuminate\Support\Facades\Log;


class BookingCancellation extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        $user = $this->booking->user;

        if (!$user || !$user->email) {
            Log::error('User email is missing for booking ' . $this->booking->id);
            return $this;
        }

        return $this->to($user->email, $user->name)->subject('Booking Cancellation')->view('emails.booking.cancellation');
    }
}
