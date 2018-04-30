<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function main($method)
    {
        return $this->$method();
    }

    public function get_calendar()
    {
        $type = request('type');

        $date = miladi(request('date'));
        if ($type != 'current') {
            $operator = $type=='next' ? '+' : '-';
            $date = strtotime($date);
            $date = strtotime("{$operator}7 day", $date);
            $date = date('Y-m-d', $date);
        }
        $calendar_date = date_picker_date($date);
        $week_day = date('N', strtotime($date));


        if ( strtotime(date('Y-m-d')) > strtotime($date) ) {
            $past_date = true ;
        }

        $days_and_dates = \App\Day::days_and_dates($week_day,$date);
        $days = $days_and_dates['days'];
        $dates = $days_and_dates['dates'];
        $current_room = request('room_id');

        return view('partials.schedule',compact('days','dates','current_room', 'calendar_date', 'past_date'));
    }
}
