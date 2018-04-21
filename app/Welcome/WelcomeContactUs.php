<?php

namespace App\Welcome;

use Illuminate\Database\Eloquent\Model;

class WelcomeContactUs extends WelcomePage
{
    protected $table = "welcome_contact_uses";

    public function main_branch()
    {
        return $this->hasOne(WelcomeMainBranch::class,'contact_us_id');
    }

    public function branches()
    {
        return $this->hasMany(WelcomeContactBranch::class,'contact_us_id')->orderBy('number');
    }
}
