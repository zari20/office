<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public static $types = ['catering','medium','graphic','informing'];
    public static $ptypes = ['caterings','media','graphics','informings'];

    public static function make($data,$reserve)
    {
        $services = [];
        foreach (self::$types as $key => $type) {
            foreach ($data[$type]['count'] as $key => $count) {
                if ($count) {
                    $class = '\App\\'.ucfirst($type);
                    $string = $type.'_type_id';
                    $s = new $class;
                    $s->reserve_id = $reserve->id;
                    $s->$string = $data[$type]['id'][$key];
                    $s->count = $data[$type]['count'][$key];
                    $s->cost = $data[$type]['cost'][$key];
                    $s->save();
                    $services[$type] = $s;
                }
            }
        }
        return $services;
    }

    public function total_cost()
    {
        return 100;
    }
}
