<?php

namespace App\Welcome;

use Illuminate\Database\Eloquent\Model;

class WelcomeTab extends WelcomePage
{
    public function sections()
    {
        return $this->hasMany(WelcomeSection::class,'tab_id');
    }

    public function visible_sections()
    {
        return WelcomeSection::where('tab_id',$this->id)->where('visible',1)->get();
    }
}
