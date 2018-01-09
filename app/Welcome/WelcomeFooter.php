<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WelcomeFooter extends WelcomePage
{
    public function links()
    {
        return $this->hasMany(WelcomeFooterLink::class);
    }
}
