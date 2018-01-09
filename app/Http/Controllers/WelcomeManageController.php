<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeManageController extends WelcomeController
{

    public function update($partial)
    {
        return $this->$partial();
    }

    public function colors()
    {
        \App\WelcomeColors::truncate();
        \App\WelcomeColors::create(request()->all());

        WelcomeHelper::flash();
        return back();
    }

    public function header()
    {
        //header itself
        \App\WelcomeHeader::truncate();
        $header = WelcomeValidate::header();
        \App\WelcomeHeader::create($header);

        //dynamic links
        $hrefs = request('website_link');
        $logos = request('website_logo');
        $numbers = request('number');

        \App\WelcomeTopLink::delete_others($numbers);

        for ($i=0; $i < count($hrefs) ; $i++) {

            $link_instance = \App\WelcomeTopLink::where('number',$numbers[$i])->first();
            if (isset($logos[$i])) {
                $link_instance ? $link_instance->delete() : null;
                $link = new \App\WelcomeTopLink;
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
        $found = \App\WelcomeLogo::find(1);
        $main_logo =  $found ?? new \App\WelcomeLogo;
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
        \App\WelcomeMenu::truncate();
        \DB::table('welcome_menus')->insert(prepare_multiple(request()->all()));
        WelcomeHelper::flash();
        return back();
    }

    public function col()
    {
        \App\WelcomeCol::truncate();
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
        \App\WelcomeSlider::truncate();
        \DB::table('welcome_sliders')->insert(prepare_multiple(request()->all()));
        WelcomeHelper::flash();
        return back();
    }

    public function introduce_tab()
    {
        \App\WelcomeIntroduceTab::truncate();
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

        \App\WelcomeIntroduceBlog::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $blog_instance = \App\WelcomeIntroduceBlog::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $blog_instance ? $blog_instance->delete() : null;
                $blog = new \App\WelcomeIntroduceBlog;
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

        \App\WelcomeOurTeam::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $team_member_instance = \App\WelcomeOurTeam::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $team_member_instance ? $team_member_instance->delete() : null;
                $team_member = new \App\WelcomeOurTeam;
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

        \App\WelcomeOurService::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $service_instance = \App\WelcomeOurService::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $service_instance ? $service_instance->delete() : null;
                $service = new \App\WelcomeOurService;
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

        \App\WelcomeOurProject::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $project_instance = \App\WelcomeOurProject::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $project_instance ? $project_instance->delete() : null;
                $project = new \App\WelcomeOurProject;
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

        \App\WelcomeOurDepartment::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $department_instance = \App\WelcomeOurDepartment::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $department_instance ? $department_instance->delete() : null;
                $department = new \App\WelcomeOurDepartment;
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

        \App\WelcomeOurView::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $view_instance = \App\WelcomeOurView::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $view_instance ? $view_instance->delete() : null;
                $view = new \App\WelcomeOurView;
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

        \App\WelcomeOurBranch::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $branch_instance = \App\WelcomeOurBranch::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $branch_instance ? $branch_instance->delete() : null;
                $branch = new \App\WelcomeOurBranch;
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
        \App\WelcomeMainBranch::truncate();
        $data = WelcomeValidate::main_branch();
        \App\WelcomeMainBranch::create($data);
        WelcomeHelper::flash();
        return back();
    }

    public function contact_branches()
    {
        \App\WelcomeContactBranch::truncate();
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

        \App\WelcomeCatalog::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $catalog_instance = \App\WelcomeCatalog::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $catalog_instance ? $catalog_instance->delete() : null;
                $catalog = new \App\WelcomeCatalog;
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

        \App\WelcomeVideo::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $video_instance = \App\WelcomeVideo::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $video_instance ? $video_instance->delete() : null;
                $video = new \App\WelcomeVideo;
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

        \App\WelcomeProduct::delete_others($numbers);

        for ($i=0; $i < count($numbers) ; $i++) {

            $product_instance = \App\WelcomeProduct::where('number',$numbers[$i])->first();
            if (isset($pictures[$i])) {
                $product_instance ? $product_instance->delete() : null;
                $product = new \App\WelcomeProduct;
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
        \App\WelcomeLink::truncate();
        \DB::table('welcome_links')->insert(prepare_multiple(request()->all()));
        WelcomeHelper::flash();
        return back();
    }

    public function footer()
    {
        \App\WelcomeFooter::truncate();
        \App\WelcomeFooterLink::truncate();

        $data = WelcomeValidate::footer();
        \App\WelcomeFooter::create($data);

        \DB::table('welcome_footer_links')->insert(prepare_multiple(request()->all()));

        WelcomeHelper::flash();
        return back();
    }
}
