<?php

namespace App\Http\Controllers;

class ReseveDataController extends Controller
{
    public static $errors = ['سیستم با خطا مواجه شد.'];

    public static function total_cost_from_request($data)
    {
        $schedule = $data['schedule']['cost'];
        $services = 0;
        foreach ($data['service'] as $key => $array) {
            $services += array_sum($array['cost']);
        }
        return $schedule + $services;
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
                return back()->withErrors(self::$errors);
            }
        }

        //check if hours is not hacked
        if ($hours != $data['schedule']['hours']) {
            return back()->withErrors(self::$errors);
        }

        //calculate room money
        $room = \App\Room::find($room_id);
        $total_cost += $room->cost_pre_hour * $hours;

        //services cost
        $services_cost = 0;
        foreach ($data['service'] as $i => $array) {
            foreach ($array['model'] as $j => $model_id) {
                if ($model_id) {
                    $model = \App\ServiceModel::find($model_id);
                    $services_cost += $model->base * ( $model->countable ?  $array['count'][$j] : 1);
                }
            }
        }

        //returning total cost
        $total_cost += $services_cost;
        return $total_cost;

    }//end of method
}
