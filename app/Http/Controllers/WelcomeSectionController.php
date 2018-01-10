<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Welcome\WelcomeSection as Section;

class WelcomeSectionController extends WelcomeController
{

    public function store()
    {
        //check if logged in
        WelcomeHelper::auth();

        //store in database
        Section::create(request()->all());

        //redirection
        WelcomeHelper::flash();
        return redirect('welcome_panel');
    }
}
