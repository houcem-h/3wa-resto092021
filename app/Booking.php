<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // protected $table = 'my_bookings';
    // protected $primaryKey = 'CIN';
    // public $incrementing = false;
    // public $timestamps = false;

    protected $dates = ['booking_date'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function scopeComingBookings($query)
    {
        return $query->where('booking_date', '>=', now());
    }

    public function scopePassedBookings($query)
    {
        return $query->where('booking_date', '<', now());
    }
}
