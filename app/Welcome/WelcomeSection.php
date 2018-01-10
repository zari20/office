<?php

namespace App\Welcome;

use Illuminate\Database\Eloquent\Model;

class WelcomeSection extends WelcomePage
{
    public function tab()
    {
        return $this->belongsTo(WelcomeTab::class);
    }
}
