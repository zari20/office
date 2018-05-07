<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    protected $guarded = ['id'];

    public function expired()
    {
        return $this->expire_date && strtotime($this->expire_date) < strtotime('now');
    }

    public function room()
    {
        return $this->belongsTo(RoomType::class,'room_id');
    }
}
