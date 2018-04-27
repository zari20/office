<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    public function booked($date,$room_id)
    {
        $found = \App\Booking::where('period_id',$this->id)->where('room_id',$room_id)->where('date',$date)->first();
        return $found ? true : false;
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
