<?php

namespace App\Welcome;

use Illuminate\Database\Eloquent\Model;

class WelcomeSection extends WelcomePage
{
    public function tab()
    {
        return $this->belongsTo(WelcomeTab::class);
    }

    public function fragments()
    {
        $class = '\App\Welcome\Welcome'.pascal_case($this->type);
        $fragments = $class::where('section_id',$this->id)->get();
        return $fragments;
    }
}
