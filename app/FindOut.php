<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FindOut extends Model
{
    public static function make($title)
    {
        $t = new self;
        $t->title = $title;
        $t->save();
        return $t;
    }
}
