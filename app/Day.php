<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function periods()
    {
        return $this->hasMany(Period::class);
    }
}
