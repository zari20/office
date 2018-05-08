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
            $b->period_id = $id;
            $b->date = $date;
            $b->save();
            $bookings[] = $b;
        }
        return $bookings;
    }

    public static function admin_make($data)
    {
        $b = new Booking;
        $b->reserve_id = 0;
        $b->period_id = $data['period_id'];
        $b->date = persian_to_carbon($data['date']);
        $b->save();
        return $b;
    }

    public function reserve()
    {
        return $this->belongsTo(Reserve::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }
}
