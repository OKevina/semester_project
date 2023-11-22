<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{
    protected $table = 'bookings';

    public function user()
    {
        return $this->belongsTo(User::class, 'ID', 'ID');
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'DestinationID', 'DestinationID');
    }

    public function generateUniqueCode()
    {
        return 'BOOKING-' . Str::random(8);
    }
}
