<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public static function make($data,$reserve){
        $bookings = [];
        foreach (array_combine($data['period']['id'],$data['period']['date']) as $id => $date) {
            $b = new self;
            $b->reserve_id = $reserve->id;
            $b->room_id = $data['schedule']['room_id'];
            $b->period_id = $id;
            $b->date = $date;
            $b->save();
            $bookings[] = $b;
        }
        return $bookings;
    }

    public function reserve()
    {
        return $this->belongsTo(Reserve::class);
    }
}
