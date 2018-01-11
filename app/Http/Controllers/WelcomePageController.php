<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomePageController extends WelcomeController
{

    public function login()
    {
        $user = \App\Welcome\WelcomeUser::where('username',request('username'))->first();
        if ($user && \Hash::check(request('password'), $user->password)) {
            session([
                'welcome_login' => true,
                'welcome_user' => $user
            ]);
            return redirect('/welcome_panel');
        }else {
            return back()->withErrors(['نام کاربری یا رمز عبور صحیح نیست']);
        }
    }

    public function panel()
    {
        //check if logged in
        WelcomeHelper::auth();

        //colors
        $colors = \App\Welcome\WelcomeColors::find(1) ?? new \App\Welcome\WelcomeColors;

        //colors
        $website = \App\Welcome\WelcomeWebsite::find(1) ?? new \App\Welcome\WelcomeWebsite;

        //layouts
        $layouts = \App\Welcome\WelcomeLayout::orderBy('position')->get();

        //header and footer
        $header = \App\Welcome\WelcomeHeader::find(1) ?? new \App\Welcome\WelcomeHeader;
        $footer = \App\Welcome\WelcomeFooter::find(1) ?? new \App\Welcome\WelcomeFooter;

        //contact us
        $contact_us = \App\Welcome\WelcomeContactUs::find(1);
        $main_branch = \App\Welcome\WelcomeMainBranch::find(1);
        $contact_branches = \App\Welcome\WelcomeContactBranch::orderBy('number')->get();

        return view('welcome_panel',compact('colors','contact_us','main_branch','contact_branches','header','footer','layouts','website'));
    }

    public function load($partial)
    {
        switch ($partial) {
            case 'header':
                $header = \App\Welcome\WelcomeHeader::find(1);
                $top_links = \App\Welcome\WelcomeTopLink::orderBy('number')->get();
                if(!count($top_links)) $top_links = array(new \App\Welcome\WelcomeTopLink);
                return view('welcome.'.$partial,compact('header','top_links'));
                break;
            case 'menu':
                $menus = \App\Welcome\WelcomeMenu::all();
                $welcome_logo = \App\Welcome\WelcomeLogo::find(1);
                if(!count($menus)) $menus = array(new \App\Welcome\WelcomeMenu);
                return view('welcome.'.$partial,compact('menus','welcome_logo'));
                break;
            case 'contact_us':
                $main_branch = \App\Welcome\WelcomeMainBranch::find(1);
                $contact_us = \App\Welcome\WelcomeContactUs::find(1);
                $branches = \App\Welcome\WelcomeContactBranch::all();
                if(!count($branches)) $branches = array(new \App\Welcome\WelcomeContactBranch);
                return view('welcome.'.$partial,compact('main_branch','branches','contact_us'));
                break;
            case 'footer':
                $footer = \App\Welcome\WelcomeFooter::find(1);
                $links = (isset($footer->links) && count($footer->links)) ? $footer->links : array(new \App\Welcome\WelcomeFooterLink);
                return view('welcome.'.$partial,compact('footer','links'));
                break;
            default:
                return view('welcome.'.$partial);
                break;
        }
    }

    public function index()
    {
        //essentials
        $colors = \App\Welcome\WelcomeColors::find(1);

        //header
        $header = \App\Welcome\WelcomeHeader::find(1);
        $top_links = \App\Welcome\WelcomeTopLink::orderBy('number')->get();

        //menu
        $menus = \App\Welcome\WelcomeMenu::all();
        $welcome_logo = \App\Welcome\WelcomeLogo::find(1);

        //contact us
        $contact_us = \App\Welcome\WelcomeContactUs::find(1);
        $main_branch = \App\Welcome\WelcomeMainBranch::find(1);
        $contact_branches = \App\Welcome\WelcomeContactBranch::orderBy('number')->get();

        //footer
        $footer = \App\Welcome\WelcomeFooter::find(1);

        return view('welcome',compact(
            'colors','header','top_links','menus','welcome_logo','contact_us','main_branch','contact_branches','footer'
        ));
    }
}
