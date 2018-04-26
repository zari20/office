<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public static $types = ['catering','medium','graphic','informing'];

    public static function make($data,$reserve)
    {
        $services = [];
        foreach (self::$types as $key => $type) {
            if($data[$type]['count']){
                $class = '\App\\'.ucfirst($type);
                $string = $type.'_type_id';
                $s = new $class;
                $s->reserve_id = $reserve->id;
                $s->$string = $data[$type]['id'];
                $s->count = $data[$type]['count'];
                $s->cost = $data[$type]['cost'];
                $s->save();
                $services[$type] = $s;
            }
        }
        return $services;
    }
}
