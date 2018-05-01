<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    public function expired()
    {
        return strtotime($this->expire_date) < strtotime('now');
    }
}
