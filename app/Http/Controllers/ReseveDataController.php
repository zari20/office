<?php

namespace App\Http\Controllers;

class ReseveDataController extends Controller
{
    public static $errors = ['سیستم با خطا مواجه شد.'];

    public static function total_cost_from_request($data)
    {
        return $data['schedule']['cost']+
                array_sum($data['catering']['cost'])+
                array_sum($data['medium']['cost'])+
                array_sum($data['graphic']['cost'])+
                array_sum($data['informing']['cost']);
    }

    public static function total_cost()
    {
        $data = request()->all();
        $room_id = $data['schedule']['room_id'];
        $period_ids = $data['period']['id'];
        $total_cost = 0;

        //room cost
        $hours = 0;
        foreach ($period_ids as $key => $id) {
            $period = \App\Period::find($id);
            if ($period && $period->room_id == $room_id) {
                $hours += time_difference($period->from,$period->till);
            }else {
                return back()->withErrors(self::$erros);
            }
        }

        //check if hours is not hacked
        if ($hours != $data['schedule']['hours']) {
            return back()->withErrors(self::$erros);
        }

        //calculate room money
        $room = \App\RoomType::find($room_id);
        $total_cost += $room->cost_pre_hour * $hours;

        //services cost
        $services_cost = 0;
        foreach (\App\Service::$types as $key => $type) {
            foreach ($data[$type]['id'] as $i => $id) {
                if ($count = $data[$type]['count'][$i]) {
                    $class = '\App\\'.ucfirst($type).'Type';
                    $service = $class::find($id);
                    $services_cost += $count * $service->cost;
                }
            }
        }

        //returning total cost
        $total_cost += $services_cost;
        return $total_cost;

    }//end of method
}
