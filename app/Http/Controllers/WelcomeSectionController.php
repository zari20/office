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

        //create fragment
        $data = request()->all();
        $fragment = WelcomeHelper::make_fragment(request('type'));

        //store in database
        $data['fragment_id'] = $fragment->id;
        $data['fragment_type'] = 'App\Welcome\Welcome'.pascal_case(request('type'));
        $section = Section::create($data);

        //creating layout
        WelcomeHelper::make_layout($section->id,'Section');

        //redirection
        WelcomeHelper::flash();
        return redirect('welcome_panel');
    }
}
