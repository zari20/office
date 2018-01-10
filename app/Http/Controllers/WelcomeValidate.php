<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeValidate extends WelcomeController
{
    public static function header($id=0)
    {
        return request()->validate([
            'telephone' => 'nullable',
            'telegram_id' => 'nullable',
            'instagram_id' => 'nullable',
            'top_links_topic' => 'nullable',
            'search_placeholder' => 'nullable',
            'link_name' => 'nullable',
            'link_icon' => 'nullable',
            'link_href' => 'nullable',
        ]);
    }

    public static function logo($id=0)
    {
        return request()->validate([
            'subject' => 'nullable',
            'info' => 'nullable',
        ]);
    }

    public static function main_branch($id=0)
    {
        return request()->validate([
            'telegram_id' => 'nullable',
            'instagram_id' => 'nullable',
            'x_direction' => 'nullable',
            'y_direction' => 'nullable',
            'map_zoom' => 'nullable|integer',
            'passage' => 'nullable',
        ]);
    }

    public static function footer($id=0)
    {
        return request()->validate([
            'title' => 'nullable',
            'copy_right' => 'nullable',
            'passage' => 'nullable',
        ]);
    }
}
