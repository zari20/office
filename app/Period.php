<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    public function booked($date)
    {
        $found = \App\Booking::where('period_id',$this->id)->where('date',$date)->first();
        return $found ? true : false;
    }
}
