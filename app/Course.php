<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public static function make($data,$reserve){
        $c = new self;
        $c->reserve_id = $reserve->id;
        $c->name = $data['course']['name'];
        $c->performer = $data['course']['performer'];
        $c->teachers = $data['course']['teachers'];
        $c->code = $data['course']['code'];
        $c->document = $data['course']['document'];
        $c->description = $data['course']['description'];
        $c->file_path = $data['course']['file_path'] ?? '';
        $c->save();
        return $c;
    }
}
