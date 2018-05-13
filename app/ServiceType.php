<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    protected $guarded = ['id'];

    public function models()
    {
        return $this->hasMany(ServiceModel::class);
    }
}
