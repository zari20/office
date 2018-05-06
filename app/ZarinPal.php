<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ZarinPal extends Model
{
    public static function make($initial_data,$result,$type)
    {
        $z = new self;
        $z->aid = $result['Authority'];
        $z->mid = $initial_data['MerchantID'];
        $z->amount = $initial_data['Amount'];
        $z->callback_url = $initial_data['CallbackURL'];
        $z->type = $type;
        $z->description = $initial_data['Description'];
        $z->status = $result['Status'];
        $z->save();
        return $z;
    }
}
