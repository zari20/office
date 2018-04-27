<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medium extends Service
{
    public function mother()
    {
        return $this->belongsTo(MediumType::class,'medium_type_id');
    }
}
