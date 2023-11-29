<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'destination_id';
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class, 'destination_id', 'destination_id');    }

    public function images()
    {
        return $this->hasMany(HotelImage::class);
    }
}
