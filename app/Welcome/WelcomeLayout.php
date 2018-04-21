<?php

namespace App\Welcome;

use Illuminate\Database\Eloquent\Model;

class WelcomeLayout extends WelcomePage
{
    public function puzzle()
    {
        return $this->morphTo();
    }
}
