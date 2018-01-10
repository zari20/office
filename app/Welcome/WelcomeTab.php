<?php

namespace App\Welcome;

use Illuminate\Database\Eloquent\Model;

class WelcomeTab extends WelcomePage
{
    public function sections()
    {
        return $this->hasMany(WelcomeSection::class,'tab_id');
    }
}
