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

        //validatio
        // TODO: uniqueness

        //store in database
        $section = Section::create(request()->all());

        //creating layout
        WelcomeHelper::make_layout($section->id,'Section');

        //redirection
        WelcomeHelper::flash();
        return redirect('welcome_panel');
    }
}
