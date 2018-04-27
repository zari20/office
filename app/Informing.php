<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informing extends Service
{
    public function mother()
    {
        return $this->belongsTo(InformingType::class,'informing_type_id');
    }
}
