<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public static function make($data,$reserve)
    {
        $s = new self;
        $s->reserve_id = $reserve->id;
        $s->room_id = $data['schedule']['room_id'];
        $s->hours = $data['schedule']['hours'];
        $s->cost = $data['schedule']['cost'];
        $s->save();
        return $s;
    }
}
