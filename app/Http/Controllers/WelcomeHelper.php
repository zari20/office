<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeHelper extends WelcomeController
{
    public static function message($body='',$status='success')
    {
        session()->flash('message', $body);
        session()->flash('status', $status);
    }

    public static function error($body='')
    {
        session()->flash('message', $body);
        session()->flash('status', 'danger');
    }

    public static function flash($success=true)
    {
      $message = $success ? 'ذخیره سازی با موفقیت انجام شد.' : 'ذخیره سازی با خطا مواجه شد.' ;
      $status  = $success ? 'success' : 'danger' ;
      session()->flash('message', $message);
      session()->flash('status', $status);
    }

    public static function auth()
    {
        if (!session('welcome_login')) {
            abort(404);
        }
    }

    public static function make_layout($id,$type)
    {
        $highest_layout = \DB::table('welcome_layouts')->where('position', \DB::raw("(SELECT MAX(`position`) FROM welcome_layouts)"))->first();
        $postion =  $highest_layout ? ($highest_layout->position + 1) : 1;
        $layout = new \App\Welcome\WelcomeLayout;
        $layout->puzzle_id = $id;
        $layout->puzzle_type = 'App\Welcome\Welcome'.$type;
        $layout->position = $postion;
        $layout->save();
    }

    public static function make_fragment($type)
    {
        switch ($type) {
            case 'five_col':
                $fragment = new \App\Welcome\WelcomeFiveCol;
                break;
            case 'slider':
                $fragment = new \App\Welcome\WelcomeSlider;
                break;
            case 'blog':
                $fragment = new \App\Welcome\WelcomeBlog;
                break;
            case 'image':
                $fragment = new \App\Welcome\WelcomeImage;
                break;
            case 'image_cadr':
                $fragment = new \App\Welcome\WelcomeImageCadr;
                break;
            case 'download':
                $fragment = new \App\Welcome\WelcomeDownload;
                break;
            case 'product':
                $fragment = new \App\Welcome\WelcomeProduct;
                break;
            case 'link':
                $fragment = new \App\Welcome\WelcomeLink;
                break;
            default:
                dd("Fatel Error");
                break;
        }
        return $fragment;
    }

}
