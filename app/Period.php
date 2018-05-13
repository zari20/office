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

    public static function create_defaults($room_id)
    {
        // TODO: get default periods from database instead of hardcodes
        foreach (range(1,7) as $key2 => $i) {
            foreach ( array_combine(['08:30','14:00','19:30'],['13:30','19:00','22:30']) as $from => $untill) {
                \DB::table('periods')->insert([
                    'day_id'=>$i,
                    'room_id'=>$room_id,
                    'from'=>$from,
                    'till'=>$untill
                ]);
            }
        }
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }
}
