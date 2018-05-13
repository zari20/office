<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    protected $guarded = ['id'];

    public function type()
    {
        return $this->belongsTo(ServiceType::class);
    }
}
