<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function periods($room_id)
    {
        return Period::where('room_id',$room_id)->where('day_id',$this->id)->get();
    }
}
