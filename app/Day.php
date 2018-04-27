<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function periods($room_id)
    {
        return Period::where('room_id',$room_id)->where('day_id',$this->id)->get();
    }

    public static function days_and_dates($init_week_day=null,$init_date=null)
    {
        $init_week_day = $init_week_day ?? date('w');
        $init_date = $init_date ?? date('Y-m-d');

        $day = 0;
        $i = 0;
        while ($day != $init_week_day) {
            $day = $day==0 ? $init_week_day : $day;

            $days[] = \App\Day::where('latin_number',$day)->first();

            $date = new \DateTime($init_date);
            $date->modify("+$i day");
            $dates[] = $date;

            $day == 7 ? $day = 1 : $day++;
            $i++;
        }

        return compact('days','dates');
    }
}
