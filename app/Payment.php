<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public static function make($data,$reserve){
        $p = new self;
        $p->reserve_id = $reserve->id;
        $p->card_number = implode($data['payment']['card_number'],'-');
        $p->owner_name = $data['payment']['owner_name'];
        $p->shaba = $data['payment']['shaba'];
        $p->bank_name = $data['payment']['bank_name'];
        $p->bank_branch = $data['payment']['bank_branch'];
        $p->bank_code = $data['payment']['bank_code'];
        $p->save();
        return $p;
    }
}
