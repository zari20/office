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

        $this->update_and_upload('top_link',false);

        WelcomeHelper::flash();
        return back();
    }

    public function logo()
    {
        $found = \App\Welcome\WelcomeLogo::find(1);
        $main_logo =  $found ?? new \App\Welcome\WelcomeLogo;
        $main_logo->picture_path = $this->upload('header','main_logo',$main_logo->picture_path);
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
        $contact_us->background_path = $this->upload('contact_us','background_path'.$contact_us->background_path);
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

    private function random_string($length=10)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function upload($folder,$index,$prev_path)
    {
        if (request($index)) {
            $this->delete_photo($prev_path);
            return request($index)->storeAs(
                $folder, $this->random_string().'.'.request($index)->getClientOriginalExtension(), 'welcome_page_uploads'
            );
        }else {
            return $prev_path;
        }
    }

    private function delete_photo($path)
    {
        $path = 'welcome/'.$path;
        if (!is_dir($path) && file_exists($path)) {
            unlink($path);
        }

    }

    private function update_and_upload($keyword,$inside_a_section=true)
    {
        $section_id = $inside_a_section ? request('id') : 0;
        $pictures = request('picture');
        $files = request('file');
        $numbers = request('number');

        $class = '\App\Welcome\Welcome'.pascal_case($keyword);
        $class::delete_others($numbers,$section_id);

        if ($inside_a_section) {
            $object_instances = $class::where('section_id',$section_id)->get();
        }else {
            $object_instances = $class::all();
        }

        for ($i=0; $i < count($numbers) ; $i++) {

            $object = $object_instances[$i] ?? new $class;

            if (isset($pictures[$i])) {
                $this->delete_photo($object->picture_path);
                $object->picture_path = $pictures[$i]->storeAs(
                    $keyword, $section_id.'-'.$numbers[$i].'-'.$this->random_string().'.'.$pictures[$i]->getClientOriginalExtension(), 'welcome_page_uploads'
                );
            }
            if (isset($files[$i])) {
                $this->delete_photo($object->file_path);
                $object->file_path = $files[$i]->storeAs(
                    $keyword.'/files', $section_id.'-'.$numbers[$i].'-'.$this->random_string().'.'.$files[$i]->getClientOriginalExtension(), 'welcome_page_uploads'
                );
            }

            $picture_paths[$numbers[$i]] = $object->picture_path;

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
