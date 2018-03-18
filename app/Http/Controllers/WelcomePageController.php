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

    public function index()
    {
        //check if logged in
        return $this->bring_and_load('welcome');
    }

    public function panel()
    {
        //check if logged in
        WelcomeHelper::auth();
        return $this->bring_and_load('welcome_panel',false);
    }

    private function bring_and_load($view,$only_visibles=true)
    {
        //colors
        $colors = \App\Welcome\WelcomeColors::find(1) ?? new \App\Welcome\WelcomeColors;

        //colors
        $website = \App\Welcome\WelcomeWebsite::find(1) ?? new \App\Welcome\WelcomeWebsite;

        //layouts
        $layouts = $only_visibles ? \App\Welcome\WelcomeLayout::where('visible',1)->orderBy('position')->get() : \App\Welcome\WelcomeLayout::orderBy('position')->get();

        //header and footer
        $header = \App\Welcome\WelcomeHeader::find(1) ?? new \App\Welcome\WelcomeHeader;
        $top_links = \App\Welcome\WelcomeTopLink::orderBy('number')->get();
        $welcome_logo = \App\Welcome\WelcomeLogo::find(1) ?? new \App\Welcome\WelcomeLogo;
        $menus = \App\Welcome\WelcomeMenu::orderBy('number')->get();
        $footer = \App\Welcome\WelcomeFooter::find(1) ?? new \App\Welcome\WelcomeFooter;

        //contact us
        $contact_us = \App\Welcome\WelcomeContactUs::find(1);
        $main_branch = $contact_us->main_branch;
        $contact_branches = $contact_us->branches;;

        return view( $view, compact(
            'colors','contact_us','main_branch','contact_branches','header','top_links','welcome_logo','menus','footer','layouts','website'
        ));
    }

    public function positions()
    {
        $colors = \App\Welcome\WelcomeColors::find(1) ?? new \App\Welcome\WelcomeColors;
        $website = \App\Welcome\WelcomeWebsite::find(1) ?? new \App\Welcome\WelcomeWebsite;
        $layouts = \App\Welcome\WelcomeLayout::orderBy('position')->get();
        return view('welcome_partials.main',compact('layouts','colors','website'));
    }

    public function load($partial,$id=0)
    {
        //check if logged in
        WelcomeHelper::auth();

        switch ($partial) {
            case 'header':
                $header = \App\Welcome\WelcomeHeader::find(1);
                $welcome_logo = \App\Welcome\WelcomeLogo::find(1);
                $top_links = \App\Welcome\WelcomeTopLink::orderBy('number')->get();
                if(!count($top_links)) $top_links = array(new \App\Welcome\WelcomeTopLink);
                return view('welcome.'.$partial,compact('header','top_links','welcome_logo'));
                break;
            case 'menu':
                $layouts = \App\Welcome\WelcomeLayout::all();
                $menus = \App\Welcome\WelcomeMenu::orderBy('number')->get();
                if(!count($menus)) $menus = array(new \App\Welcome\WelcomeMenu);
                return view('welcome.'.$partial,compact('menus','layouts'));
                break;
            case 'contact_us':
                $main_branch = \App\Welcome\WelcomeMainBranch::find(1);
                $contact_us = \App\Welcome\WelcomeContactUs::find(1);
                $branches = \App\Welcome\WelcomeContactBranch::orderBy('number')->get();
                if(!count($branches)) $branches = array(new \App\Welcome\WelcomeContactBranch);
                return view('welcome.'.$partial,compact('main_branch','branches','contact_us'));
                break;
            case 'footer':
                $footer = \App\Welcome\WelcomeFooter::find(1);
                $links = (isset($footer->links) && count($footer->links)) ? $footer->links : array(new \App\Welcome\WelcomeFooterLink);
                return view('welcome.'.$partial,compact('footer','links'));
                break;
            case 'section':
                $section = \App\Welcome\WelcomeSection::find($id);
                $editable = !$section->tab_id;
                if (substr( $section->type, 0, 5 ) === "model"){
                    $view = "model";
                    $model = str_replace("model", "", $section->type);
                }else {
                    $view = $section->type;
                    $model = null;
                }
                return view('welcome.fragments.'.$view,compact('section','editable','model'));
                break;
            case 'tab':
                $tab = \App\Welcome\WelcomeTab::find(request('id'));
                return view('welcome_partials.new_tab',compact('tab'));
                break;
            default:
                return view('welcome.'.$partial);
                break;
        }
    }
}
