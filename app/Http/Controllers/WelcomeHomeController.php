<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['welcome']);
    }

    public function index()
    {
        $words = \App\WelcomeWords::find(1) ?? new \App\WelcomeWords;
        return view('home',compact('words'));
    }

    public function manage($partial)
    {
        $words = \App\WelcomeWords::find(1) ?? new \App\WelcomeWords;
        switch ($partial) {
            case 'welcome_colors':
                $colors = \App\WelcomeColors::find(1) ?? new \App\WelcomeColors;
                return view('home',compact('words','partial','colors'));
                break;
            case 'welcome_header':
                $header = \App\WelcomeHeader::find(1);
                $top_links = \App\WelcomeTopLink::orderBy('number')->get();
                if(!count($top_links)) $top_links = array(new \App\WelcomeTopLink);
                return view('home',compact('words','partial','header','top_links'));
                break;
            case 'welcome_logo':
                $welcome_logo = \App\WelcomeLogo::find(1);
                return view('home',compact('words','partial','welcome_logo'));
                break;
            case 'welcome_menu':
                $menus = \App\WelcomeMenu::all();
                if(!count($menus)) $menus = array(new \App\WelcomeMenu);
                return view('home',compact('words','partial','menus'));
                break;
            case 'welcome_cols':
                $cols = \App\WelcomeCol::all();
                if(!count($cols)) $cols = array(new \App\WelcomeCol);
                return view('home',compact('words','partial','cols'));
                break;
            case 'welcome_sliders':
                $sliders = \App\WelcomeSlider::all();
                if(!count($sliders)) $sliders = array(new \App\WelcomeSlider);
                return view('home',compact('words','partial','sliders'));
                break;
            case 'welcome_introduce_tabs':
                $tabs = \App\WelcomeIntroduceTab::all();
                $blogs = \App\WelcomeIntroduceBlog::all();
                if(!count($tabs)) $tabs = array(new \App\WelcomeIntroduceTab);
                if(!count($blogs)) $blogs = array(new \App\WelcomeIntroduceBlog);
                return view('home',compact('words','partial','tabs','blogs'));
                break;
            case 'welcome_team_members':
                $team_members = \App\WelcomeOurTeam::all();
                if(!count($team_members)) $team_members = array(new \App\WelcomeOurTeam);
                return view('home',compact('words','partial','team_members'));
                break;
            case 'welcome_our_services':
                $services = \App\WelcomeOurService::all();
                if(!count($services)) $services = array(new \App\WelcomeOurService);
                return view('home',compact('words','partial','services'));
                break;
            case 'welcome_our_projects':
                $projects = \App\WelcomeOurProject::all();
                if(!count($projects)) $projects = array(new \App\WelcomeOurProject);
                return view('home',compact('words','partial','projects'));
                break;
            case 'welcome_our_departments':
                $departments = \App\WelcomeOurDepartment::all();
                if(!count($departments)) $departments = array(new \App\WelcomeOurDepartment);
                return view('home',compact('words','partial','departments'));
                break;
            case 'welcome_our_views':
                $views = \App\WelcomeOurView::all();
                if(!count($views)) $views = array(new \App\WelcomeOurView);
                return view('home',compact('words','partial','views'));
                break;
            case 'welcome_our_branches':
                $branches = \App\WelcomeOurBranch::all();
                if(!count($branches)) $branches = array(new \App\WelcomeOurBranch);
                return view('home',compact('words','partial','branches'));
                break;
            case 'welcome_main_branch':
                $main_branch = \App\WelcomeMainBranch::find(1);
                if(!$main_branch) $main_branch = new \App\WelcomeMainBranch;
                return view('home',compact('words','partial','main_branch'));
                break;
            case 'welcome_contact_branches':
                $branches = \App\WelcomeContactBranch::all();
                if(!count($branches)) $branches = array(new \App\WelcomeContactBranch);
                return view('home',compact('words','partial','branches'));
                break;
            case 'welcome_catalogs':
                $catalogs = \App\WelcomeCatalog::all();
                if(!count($catalogs)) $catalogs = array(new \App\WelcomeCatalog);
                return view('home',compact('words','partial','catalogs'));
                break;
            case 'welcome_videos':
                $videos = \App\WelcomeVideo::all();
                if(!count($videos)) $videos = array(new \App\WelcomeVideo);
                return view('home',compact('words','partial','videos'));
                break;
            case 'welcome_products':
                $products = \App\WelcomeProduct::all();
                if(!count($products)) $products = array(new \App\WelcomeProduct);
                return view('home',compact('words','partial','products'));
                break;
            case 'welcome_links':
                $links = \App\WelcomeLink::all();
                if(!count($links)) $links = array(new \App\WelcomeLink);
                return view('home',compact('words','partial','links'));
                break;
            case 'welcome_footer':
                $footer = \App\WelcomeFooter::find(1);
                $links = (isset($footer->links) && count($footer->links)) ? $footer->links : array(new \App\WelcomeFooterLink);
                return view('home',compact('words','partial','footer','links'));
                break;
            default:
                return view('home',compact('words','partial'));
                break;
        }
    }

    public function welcome()
    {
        $words = \App\WelcomeWords::find(1);
        $colors = \App\WelcomeColors::find(1);
        $header = \App\WelcomeHeader::find(1);
        $welcome_logo = \App\WelcomeLogo::find(1);
        $top_links = \App\WelcomeTopLink::orderBy('number')->get();
        $menus = \App\WelcomeMenu::all();
        $cols = \App\WelcomeCol::all();
        $sliders = \App\WelcomeSlider::all();
        $introduce_tabs = \App\WelcomeIntroduceTab::all();
        $sliders = \App\WelcomeSlider::all();
        $team_members = \App\WelcomeOurTeam::all();
        $our_services = \App\WelcomeOurService::all();
        $our_projects = \App\WelcomeOurProject::all();
        $our_departments = \App\WelcomeOurDepartment::all();
        $our_views = \App\WelcomeOurView::all();
        $our_branches = \App\WelcomeOurBranch::all();
        $main_branch = \App\WelcomeMainBranch::find(1);
        $contact_branches = \App\WelcomeContactBranch::all();
        $catalogs = \App\WelcomeCatalog::all();
        $videos = \App\WelcomeVideo::all();
        $latest_products = \App\WelcomeProduct::latest()->get();
        $links = \App\WelcomeLink::all();
        $footer = \App\WelcomeFooter::find(1);
        return view('welcome',compact(
            'words','colors','header','top_links','welcome_logo','menus','cols','sliders','introduce_tabs','team_members','our_services','our_projects',
            'our_departments','our_views','our_branches','main_branch','contact_branches','catalogs','videos','latest_products','links','footer'
        ));
    }
}
