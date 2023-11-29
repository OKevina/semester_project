<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Booking extends Model
{


        protected $fillable = [
            'users_id',
            'destination_id',
            'NumTravelers',
            'TotalAmount',
            'BookingDate',
            'Nights'

        ];
    protected $table = 'bookings';

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'destination_id', 'destination_id');
    }

    public function generateUniqueCode()
    {
        return 'BOOKING-' . Str::random(8);
    }


}
