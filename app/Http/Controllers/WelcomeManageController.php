<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeManageController extends WelcomeController
{

    public function update($partial)
    {
        return $this->$partial();
    }

    public function action($partial,$action)
    {
        dd($partial.','.$action);
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
                    'header', $numbers[$i].'.'.$logos[$i]->extension(), 'welcome_page_uploads'
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
                'header', 'main_logo.'.request('main_logo')->extension(), 'welcome_page_uploads'
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

    public function col()
    {
        \App\Welcome\WelcomeCol::truncate();
        \DB::table('welcome_cols')->insert(prepare_multiple(request()->all()));
        WelcomeHelper::flash();
        return back();
    }

    public function slider()
    {
        if (request('background')) {
            request('background')->storeAs(
                'slider', 'slider.png', 'welcome_page_uploads'
            );
        }
        \App\Welcome\WelcomeSlider::truncate();
        \DB::table('welcome_sliders')->insert(prepare_multiple(request()->all()));
        WelcomeHelper::flash();
        return back();
    }

    public function introduce_tab()
    {
        \App\Welcome\WelcomeIntroduceTab::truncate();
        \DB::table('welcome_introduce_tabs')->insert(prepare_multiple(request()->all()));
        WelcomeHelper::flash();
        return back();
    }

    public function introduce_blog()
    {
        $titles = request('title');
        $tab_numbers = request('tab_number');
        $numbers = request('number');
        $pictures = request('picture');
        $passages = request('passage');

        \App\Welcome\WelcomeIntroduceBlog::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $blog_instance = \App\Welcome\WelcomeIntroduceBlog::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $blog_instance ? $blog_instance->delete() : null;
                $blog = new \App\Welcome\WelcomeIntroduceBlog;
                $blog->title = $titles[$i];
                $blog->number = $numbers[$i];
                $blog->tab_number = $tab_numbers[$i];
                $blog->passage = $passages[$i];
                $blog->picture_path = $pictures[$i]->storeAs(
                    'introduce_blog', $numbers[$i].'.'.$pictures[$i]->extension(), 'welcome_page_uploads'
                );
                $blog->save();
            }elseif($blog_instance) {
                $blog_instance->title = $titles[$i];
                $blog_instance->number = $numbers[$i];
                $blog_instance->tab_number = $tab_numbers[$i];
                $blog_instance->passage = $passages[$i];
                $blog_instance->save();
            }else{
                continue;
            }

        }

        WelcomeHelper::flash();
        return back();
    }

    public function our_team()
    {
        $titles = request('title');
        $bodies = request('body');
        $pictures = request('picture');
        $numbers = request('number');

        \App\Welcome\WelcomeOurTeam::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $team_member_instance = \App\Welcome\WelcomeOurTeam::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $team_member_instance ? $team_member_instance->delete() : null;
                $team_member = new \App\Welcome\WelcomeOurTeam;
                $team_member->title = $titles[$i];
                $team_member->number = $numbers[$i];
                $team_member->body = $bodies[$i];
                $team_member->picture_path = $pictures[$i]->storeAs(
                    'team_members', $numbers[$i].'.'.$pictures[$i]->extension(), 'welcome_page_uploads'
                );
                $team_member->save();
            }elseif($team_member_instance) {
                $team_member_instance->title = $titles[$i];
                $team_member_instance->number = $numbers[$i];
                $team_member_instance->body = $bodies[$i];
                $team_member_instance->save();
            }else{
                continue;
            }

        }

        WelcomeHelper::flash();
        return back();
    }

    public function our_services()
    {
        $titles = request('title');
        $passages = request('passage');
        $pictures = request('picture');
        $numbers = request('number');

        \App\Welcome\WelcomeOurService::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $service_instance = \App\Welcome\WelcomeOurService::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $service_instance ? $service_instance->delete() : null;
                $service = new \App\Welcome\WelcomeOurService;
                $service->title = $titles[$i];
                $service->number = $numbers[$i];
                $service->passage = $passages[$i];
                $service->picture_path = $pictures[$i]->storeAs(
                    'services', $numbers[$i].'.'.$pictures[$i]->extension(), 'welcome_page_uploads'
                );
                $service->save();
            }elseif($service_instance) {
                $service_instance->title = $titles[$i];
                $service_instance->number = $numbers[$i];
                $service_instance->passage = $passages[$i];
                $service_instance->save();
            }else{
                continue;
            }

        }

        WelcomeHelper::flash();
        return back();
    }

    public function our_projects()
    {
        $titles = request('title');
        $bodies = request('body');
        $pictures = request('picture');
        $numbers = request('number');

        \App\Welcome\WelcomeOurProject::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $project_instance = \App\Welcome\WelcomeOurProject::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $project_instance ? $project_instance->delete() : null;
                $project = new \App\Welcome\WelcomeOurProject;
                $project->title = $titles[$i];
                $project->number = $numbers[$i];
                $project->body = $bodies[$i];
                $project->picture_path = $pictures[$i]->storeAs(
                    'projects', $numbers[$i].'.'.$pictures[$i]->extension(), 'welcome_page_uploads'
                );
                $project->save();
            }elseif($project_instance) {
                $project_instance->title = $titles[$i];
                $project_instance->number = $numbers[$i];
                $project_instance->body = $bodies[$i];
                $project_instance->save();
            }else{
                continue;
            }

        }

        WelcomeHelper::flash();
        return back();
    }

    public function our_department()
    {
        $titles = request('title');
        $bodies = request('body');
        $pictures = request('picture');
        $numbers = request('number');

        \App\Welcome\WelcomeOurDepartment::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $department_instance = \App\Welcome\WelcomeOurDepartment::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $department_instance ? $department_instance->delete() : null;
                $department = new \App\Welcome\WelcomeOurDepartment;
                $department->title = $titles[$i];
                $department->number = $numbers[$i];
                $department->body = $bodies[$i];
                $department->picture_path = $pictures[$i]->storeAs(
                    'department', $numbers[$i].'.'.$pictures[$i]->extension(), 'welcome_page_uploads'
                );
                $department->save();
            }elseif($department_instance) {
                $department_instance->title = $titles[$i];
                $department_instance->number = $numbers[$i];
                $department_instance->body = $bodies[$i];
                $department_instance->save();
            }else{
                continue;
            }

        }

        WelcomeHelper::flash();
        return back();
    }

    public function our_views()
    {
        $titles = request('title');
        $passages = request('passage');
        $pictures = request('picture');
        $numbers = request('number');

        \App\Welcome\WelcomeOurView::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $view_instance = \App\Welcome\WelcomeOurView::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $view_instance ? $view_instance->delete() : null;
                $view = new \App\Welcome\WelcomeOurView;
                $view->title = $titles[$i];
                $view->number = $numbers[$i];
                $view->passage = $passages[$i];
                $view->picture_path = $pictures[$i]->storeAs(
                    'views', $numbers[$i].'.'.$pictures[$i]->extension(), 'welcome_page_uploads'
                );
                $view->save();
            }elseif($view_instance) {
                $view_instance->title = $titles[$i];
                $view_instance->number = $numbers[$i];
                $view_instance->passage = $passages[$i];
                $view_instance->save();
            }else{
                continue;
            }

        }

        WelcomeHelper::flash();
        return back();
    }

    public function our_branches()
    {
        $titles = request('title');
        $bodies = request('body');
        $pictures = request('picture');
        $numbers = request('number');

        \App\Welcome\WelcomeOurBranch::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $branch_instance = \App\Welcome\WelcomeOurBranch::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $branch_instance ? $branch_instance->delete() : null;
                $branch = new \App\Welcome\WelcomeOurBranch;
                $branch->title = $titles[$i];
                $branch->number = $numbers[$i];
                $branch->body = $bodies[$i];
                $branch->picture_path = $pictures[$i]->storeAs(
                    'branch', $numbers[$i].'.'.$pictures[$i]->extension(), 'welcome_page_uploads'
                );
                $branch->save();
            }elseif($branch_instance) {
                $branch_instance->title = $titles[$i];
                $branch_instance->number = $numbers[$i];
                $branch_instance->body = $bodies[$i];
                $branch_instance->save();
            }else{
                continue;
            }

        }

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

    public function catalogs()
    {
        $titles = request('title');
        $bodies = request('body');
        $pictures = request('picture');
        $numbers = request('number');

        \App\Welcome\WelcomeCatalog::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $catalog_instance = \App\Welcome\WelcomeCatalog::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $catalog_instance ? $catalog_instance->delete() : null;
                $catalog = new \App\Welcome\WelcomeCatalog;
                $catalog->title = $titles[$i];
                $catalog->number = $numbers[$i];
                $catalog->body = $bodies[$i];
                $catalog->picture_path = $pictures[$i]->storeAs(
                    'catalog', $numbers[$i].'.'.$pictures[$i]->extension(), 'welcome_page_uploads'
                );
                $catalog->save();
            }elseif($catalog_instance) {
                $catalog_instance->title = $titles[$i];
                $catalog_instance->number = $numbers[$i];
                $catalog_instance->body = $bodies[$i];
                $catalog_instance->save();
            }else{
                continue;
            }

        }

        WelcomeHelper::flash();
        return back();
    }

    public function videos()
    {
        $titles = request('title');
        $aparat_links = request('aparat_link');
        $bodies = request('body');
        $pictures = request('picture');
        $numbers = request('number');

        \App\Welcome\WelcomeVideo::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $video_instance = \App\Welcome\WelcomeVideo::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $video_instance ? $video_instance->delete() : null;
                $video = new \App\Welcome\WelcomeVideo;
                $video->title = $titles[$i];
                $video->aparat_link = $aparat_links[$i];
                $video->number = $numbers[$i];
                $video->body = $bodies[$i];
                $video->picture_path = $pictures[$i]->storeAs(
                    'video_cover', $numbers[$i].'.'.$pictures[$i]->extension(), 'welcome_page_uploads'
                );
                $video->save();
            }elseif($video_instance) {
                $video_instance->title = $titles[$i];
                $video_instance->aparat_link = $aparat_links[$i];
                $video_instance->number = $numbers[$i];
                $video_instance->body = $bodies[$i];
                $video_instance->save();
            }else{
                continue;
            }

        }

        WelcomeHelper::flash();
        return back();
    }


    public function products()
    {
        $titles = request('title');
        $prices = request('price');
        $bodies = request('body');
        $pictures = request('picture');
        $numbers = request('number');

        \App\Welcome\WelcomeProduct::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $product_instance = \App\Welcome\WelcomeProduct::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $product_instance ? $product_instance->delete() : null;
                $product = new \App\Welcome\WelcomeProduct;
                $product->title = $titles[$i];
                $product->price = $prices[$i];
                $product->number = $numbers[$i];
                $product->body = $bodies[$i];
                $product->picture_path = $pictures[$i]->storeAs(
                    'product', $numbers[$i].'.'.$pictures[$i]->extension(), 'welcome_page_uploads'
                );
                $product->save();
            }elseif($product_instance) {
                $product_instance->title = $titles[$i];
                $product_instance->price = $prices[$i];
                $product_instance->number = $numbers[$i];
                $product_instance->body = $bodies[$i];
                $product_instance->save();
            }else{
                continue;
            }

        }

        WelcomeHelper::flash();
        return back();
    }

    public function links()
    {
        \App\Welcome\WelcomeLink::truncate();
        \DB::table('welcome_links')->insert(prepare_multiple(request()->all()));
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
}
