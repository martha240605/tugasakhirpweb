<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $fillable = ['jam_mulai', 'jam_selesai'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
