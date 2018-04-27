<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catering extends Service
{
    public function mother()
    {
        return $this->belongsTo(CateringType::class,'catering_type_id');
    }
}
