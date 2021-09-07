<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    // protected $table = 'my_bookings';
    // protected $primaryKey = 'CIN';
    // public $incrementing = false;
    // public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
