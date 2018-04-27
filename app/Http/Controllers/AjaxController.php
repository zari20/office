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
        $date = miladi(request('date'));
        $week_day = date('N', strtotime($date));

        if (new \DateTime() > new \DateTime($date)) {
            return view('fragments.error')->withMessage('تاریخ انتخاب شده در گذشته میباشد');
        }

        $days_and_dates = \App\Day::days_and_dates($week_day,$date);
        $days = $days_and_dates['days'];
        $dates = $days_and_dates['dates'];
        $current_room = request('room_id');

        return view('partials.calendar',compact('days','dates','current_room'));
    }
}
