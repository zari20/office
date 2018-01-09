<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WelcomeIntroduceTab extends WelcomePage
{
    public function blogs()
    {
        return WelcomeIntroduceBlog::where('tab_number',$this->number)->get();
    }
}
