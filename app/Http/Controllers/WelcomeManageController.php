<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeManageController extends WelcomeController
{

    public function update($partial)
    {
        //check if logged in
        WelcomeHelper::auth();

        if(method_exists($this, $partial)){
            return $this->$partial();
        }else {
            return $this->update_and_upload($partial);
        }
    }

    public function action($id,$action,$type)
    {
        //check if logged in
        WelcomeHelper::auth();

        $puzzle_type = 'App\Welcome\Welcome'.pascal_case($type);
        $puzzle_id = $id ? $id : 1;

        $layout = \App\Welcome\WelcomeLayout::where('puzzle_id',$puzzle_id)->where('puzzle_type',$puzzle_type)->first();

        if (!$layout) {
            $section = $puzzle_type::find($puzzle_id);
            if ($type=='menu') {
                $header = \App\Welcome\WelcomeHeader::find(1);
                $header->menu_visible = !$header->menu_visible;
                $header->save();
            }elseif ($action == 'delete') {
                $section->delete();
            }else {
                $section->visible = !$section->visible;
                $section->save();
            }
        }else {
            if ( $action=='delete' ) {
                $puzzle = $layout->puzzle;
                if ( $type == 'tab' ) {
                    foreach ($puzzle->sections as $key => $section) {
                        $section->delete();
                    }
                }elseif($type == 'section') {
                    //do nothing
                }else {
                    return back();
                }
                $puzzle->delete();
                $layout->delete();
            }else {
                $layout->visible = !$layout->visible;
                $layout->save();
            }
        }

        WelcomeHelper::flash();
        return redirect('welcome_panel');
    }

    public function positions()
    {
        //check if logged in
        WelcomeHelper::auth();

        $layouts = \App\Welcome\WelcomeLayout::orderBy('position')->get();
        $positions = request('position');

        foreach ($layouts as $key => $layout) {
            $layout->position = $positions[$key];
            $layout->save();
        }

        WelcomeHelper::flash();
        return redirect('welcome_panel');
    }

    public function website()
    {
        \App\Welcome\WelcomeWebsite::truncate();
        \App\Welcome\WelcomeWebsite::create(request()->all());

        WelcomeHelper::flash();
        return back();
    }

    public function colors()
    {
        \App\Welcome\WelcomeColors::truncate();
        \App\Welcome\WelcomeColors::create(request()->all());

        WelcomeHelper::flash();
        return back();
    }

    public function header()
    {
        //header itself
        \App\Welcome\WelcomeHeader::truncate();
        $header = WelcomeValidate::header();
        \App\Welcome\WelcomeHeader::create($header);

        //dynamic links
        $hrefs = request('website_link');
        $logos = request('website_logo');
        $numbers = request('number');

        \App\Welcome\WelcomeTopLink::delete_others($numbers);

        for ($i=0; $i < count($hrefs) ; $i++) {

            $link_instance = \App\Welcome\WelcomeTopLink::where('number',$numbers[$i])->first();
            if (isset($logos[$i])) {
                $link_instance ? $link_instance->delete() : null;
                $link = new \App\Welcome\WelcomeTopLink;
                $link->href = $hrefs[$i];
                $link->number = $numbers[$i];
                $link->logo_path = $logos[$i]->storeAs(
                    'header', $numbers[$i].'.'.$logos[$i]->getClientOriginalExtension(), 'welcome_page_uploads'
                );
                $link->save();
            }elseif($link_instance) {
                $link_instance->href = $hrefs[$i];
                $link_instance->number = $numbers[$i];
                $link_instance->save();
            }else{
                continue;
            }

        }
        WelcomeHelper::flash();
        return back();
    }

    public function logo()
    {
        $found = \App\Welcome\WelcomeLogo::find(1);
        $main_logo =  $found ?? new \App\Welcome\WelcomeLogo;
        if (request('main_logo')) {
            $main_logo->logo_path = request('main_logo')->storeAs(
                'header', 'main_logo.'.request('main_logo')->getClientOriginalExtension(), 'welcome_page_uploads'
            );
        }
        $main_logo->title = request('title');
        $main_logo->info = request('info');
        $main_logo->save();

        WelcomeHelper::flash();
        return back();
    }

    public function menu()
    {
        \App\Welcome\WelcomeMenu::truncate();
        \DB::table('welcome_menus')->insert(prepare_multiple(request()->all()));
        WelcomeHelper::flash();
        return back();
    }

    public function contact_us()
    {
        $found = \App\Welcome\WelcomeContactUs::find(1);
        $contact_us =  $found ?? new \App\Welcome\WelcomeContactUs;
        if (request('background_path')) {
            $contact_us->background_path = request('background_path')->storeAs(
                'contact_us', 'background.'.request('background_path')->getClientOriginalExtension(), 'welcome_page_uploads'
            );
        }
        $contact_us->title = request('title');
        $contact_us->latin_id = request('latin_id');
        $contact_us->main_branch_title = request('main_branch_title');
        $contact_us->other_branches_title = request('other_branches_title');
        $contact_us->form_title = request('form_title');
        $contact_us->form_visible = request('form_visible');
        $contact_us->save();

        WelcomeHelper::flash();
        return back();
    }

    public function main_branch()
    {
        \App\Welcome\WelcomeMainBranch::truncate();
        $data = WelcomeValidate::main_branch();
        \App\Welcome\WelcomeMainBranch::create($data);
        WelcomeHelper::flash();
        return back();
    }

    public function contact_branches()
    {
        \App\Welcome\WelcomeContactBranch::truncate();
        \DB::table('welcome_contact_branches')->insert(prepare_multiple(request()->all()));
        WelcomeHelper::flash();
        return back();
    }

    public function footer()
    {
        \App\Welcome\WelcomeFooter::truncate();
        \App\Welcome\WelcomeFooterLink::truncate();

        $data = WelcomeValidate::footer();
        \App\Welcome\WelcomeFooter::create($data);

        \DB::table('welcome_footer_links')->insert(prepare_multiple(request()->all()));

        WelcomeHelper::flash();
        return back();
    }

    public function five_col()
    {
        $section_id = request('id');
        \App\Welcome\WelcomeFiveCol::clean($section_id);
        \DB::table('welcome_five_cols')->insert(prepare_multiple(request()->all()));
        WelcomeHelper::flash();
        return back();
    }

    public function link()
    {
        $section_id = request('id');
        \App\Welcome\WelcomeLink::clean($section_id);
        \DB::table('welcome_links')->insert(prepare_multiple(request()->all()));
        WelcomeHelper::flash();
        return back();
    }

    private function update_and_upload($keyword)
    {
        $section_id = request('id');
        $pictures = request('picture');
        $files = request('file');
        $numbers = request('number');

        $class = '\App\Welcome\Welcome'.pascal_case($keyword);
        $class::delete_others($numbers,$section_id);

        for ($i=0; $i < count($numbers) ; $i++) {

            $object_instance = $class::where('number',$numbers[$i])->where('section_id',$section_id)->first();
            $object = $object_instance ?? new $class;

            if (isset($pictures[$i])) {
                $object->picture_path = $pictures[$i]->storeAs(
                    $keyword, $section_id.'-'.$numbers[$i].'.'.$pictures[$i]->getClientOriginalExtension(), 'welcome_page_uploads'
                );
            }
            if (isset($files[$i])) {
                $object->file_path = $files[$i]->storeAs(
                    $keyword.'/files', $section_id.'-'.$numbers[$i].'.'.$files[$i]->getClientOriginalExtension(), 'welcome_page_uploads'
                );
            }
            foreach (request()->all() as $key => $input) {
                if (is_array($input) && !($key == 'picture' || $key == 'file')) {
                    $object->$key = $input[$i];
                }
            }
            $object->save();

        }

        WelcomeHelper::flash();
        return back();
    }
}
