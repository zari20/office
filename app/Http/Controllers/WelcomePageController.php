<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomePageController extends WelcomeController
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

    public function load($partial)
    {
        switch ($partial) {
            case 'welcome_colors':
                $colors = \App\Welcome\Welcome\Colors::find(1) ?? new \App\Welcome\Welcome\Colors;
                return view('home',compact('partial','colors'));
                break;
            case 'welcome_header':
                $header = \App\Welcome\Welcome\Header::find(1);
                $top_links = \App\Welcome\Welcome\TopLink::orderBy('number')->get();
                if(!count($top_links)) $top_links = array(new \App\Welcome\Welcome\TopLink);
                return view('home',compact('partial','header','top_links'));
                break;
            case 'welcome_logo':
                $welcome_logo = \App\Welcome\Welcome\Logo::find(1);
                return view('home',compact('partial','welcome_logo'));
                break;
            case 'welcome_menu':
                $menus = \App\Welcome\Welcome\Menu::all();
                if(!count($menus)) $menus = array(new \App\Welcome\Welcome\Menu);
                return view('home',compact('partial','menus'));
                break;
            case 'welcome_cols':
                $cols = \App\Welcome\Welcome\Col::all();
                if(!count($cols)) $cols = array(new \App\Welcome\Welcome\Col);
                return view('home',compact('partial','cols'));
                break;
            case 'welcome_sliders':
                $sliders = \App\Welcome\Welcome\Slider::all();
                if(!count($sliders)) $sliders = array(new \App\Welcome\Welcome\Slider);
                return view('home',compact('partial','sliders'));
                break;
            case 'welcome_introduce_tabs':
                $tabs = \App\Welcome\Welcome\IntroduceTab::all();
                $blogs = \App\Welcome\Welcome\IntroduceBlog::all();
                if(!count($tabs)) $tabs = array(new \App\Welcome\Welcome\IntroduceTab);
                if(!count($blogs)) $blogs = array(new \App\Welcome\Welcome\IntroduceBlog);
                return view('home',compact('partial','tabs','blogs'));
                break;
            case 'welcome_team_members':
                $team_members = \App\Welcome\Welcome\OurTeam::all();
                if(!count($team_members)) $team_members = array(new \App\Welcome\Welcome\OurTeam);
                return view('home',compact('partial','team_members'));
                break;
            case 'welcome_our_services':
                $services = \App\Welcome\Welcome\OurService::all();
                if(!count($services)) $services = array(new \App\Welcome\Welcome\OurService);
                return view('home',compact('partial','services'));
                break;
            case 'welcome_our_projects':
                $projects = \App\Welcome\Welcome\OurProject::all();
                if(!count($projects)) $projects = array(new \App\Welcome\Welcome\OurProject);
                return view('home',compact('partial','projects'));
                break;
            case 'welcome_our_departments':
                $departments = \App\Welcome\Welcome\OurDepartment::all();
                if(!count($departments)) $departments = array(new \App\Welcome\Welcome\OurDepartment);
                return view('home',compact('partial','departments'));
                break;
            case 'welcome_our_views':
                $views = \App\Welcome\Welcome\OurView::all();
                if(!count($views)) $views = array(new \App\Welcome\Welcome\OurView);
                return view('home',compact('partial','views'));
                break;
            case 'welcome_our_branches':
                $branches = \App\Welcome\Welcome\OurBranch::all();
                if(!count($branches)) $branches = array(new \App\Welcome\Welcome\OurBranch);
                return view('home',compact('partial','branches'));
                break;
            case 'welcome_main_branch':
                $main_branch = \App\Welcome\Welcome\MainBranch::find(1);
                if(!$main_branch) $main_branch = new \App\Welcome\Welcome\MainBranch;
                return view('home',compact('partial','main_branch'));
                break;
            case 'welcome_contact_branches':
                $branches = \App\Welcome\Welcome\ContactBranch::all();
                if(!count($branches)) $branches = array(new \App\Welcome\Welcome\ContactBranch);
                return view('home',compact('partial','branches'));
                break;
            case 'welcome_catalogs':
                $catalogs = \App\Welcome\Welcome\Catalog::all();
                if(!count($catalogs)) $catalogs = array(new \App\Welcome\Welcome\Catalog);
                return view('home',compact('partial','catalogs'));
                break;
            case 'welcome_videos':
                $videos = \App\Welcome\Welcome\Video::all();
                if(!count($videos)) $videos = array(new \App\Welcome\Welcome\Video);
                return view('home',compact('partial','videos'));
                break;
            case 'welcome_products':
                $products = \App\Welcome\Welcome\Product::all();
                if(!count($products)) $products = array(new \App\Welcome\Welcome\Product);
                return view('home',compact('partial','products'));
                break;
            case 'welcome_links':
                $links = \App\Welcome\Welcome\Link::all();
                if(!count($links)) $links = array(new \App\Welcome\Welcome\Link);
                return view('home',compact('partial','links'));
                break;
            case 'welcome_footer':
                $footer = \App\Welcome\Welcome\Footer::find(1);
                $links = (isset($footer->links) && count($footer->links)) ? $footer->links : array(new \App\Welcome\Welcome\FooterLink);
                return view('home',compact('partial','footer','links'));
                break;
            default:
                return view('home',compact('partial'));
                break;
        }
    }

    public function index()
    {
        $colors = \App\Welcome\Welcome\Colors::find(1);
        $header = \App\Welcome\Welcome\Header::find(1);
        $welcome_logo = \App\Welcome\Welcome\Logo::find(1);
        $top_links = \App\Welcome\Welcome\TopLink::orderBy('number')->get();
        $menus = \App\Welcome\Welcome\Menu::all();
        $five_cols = \App\Welcome\Welcome\FiveCol::all();
        $sliders = \App\Welcome\Welcome\Slider::all();
        $main_branch = \App\Welcome\Welcome\MainBranch::find(1);
        $contact_branches = \App\Welcome\Welcome\ContactBranch::all();
        $latest_products = \App\Welcome\Welcome\Product::latest()->get();
        $links = \App\Welcome\Welcome\Link::all();
        $footer = \App\Welcome\Welcome\Footer::find(1);
        return view('welcome',compact(
            'colors','header','top_links','welcome_logo','menus','cols','sliders','introduce_tabs','team_members','our_services','our_projects',
            'our_departments','our_views','our_branches','main_branch','contact_branches','catalogs','videos','latest_products','links','footer'
        ));
    }
}
