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

        //validation
        // TODO: uniqueness

        //store in database
        $section = Section::create(request()->all());

        //creating layout
        WelcomeHelper::make_layout($section->id,'Section');

        //redirection
        WelcomeHelper::flash();
        return redirect('welcome_panel');
    }

    public function update($id)
    {
        //check if logged in
        WelcomeHelper::auth();

        //updating record
        $section = Section::find($id);
        $section->title = request('title');
        $section->latin_id = request('latin_id');
        $section->cols = request('cols');
        $section->save();

        //redirection
        WelcomeHelper::flash();
        return back();
    }
}
