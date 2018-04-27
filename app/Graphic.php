<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Graphic extends Service
{
    public function mother()
    {
        return $this->belongsTo(GraphicType::class,'graphic_type_id');
    }
}
