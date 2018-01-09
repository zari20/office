<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidateWelcome extends Controller
{
    public static function header($id=0)
    {
        return request()->validate([
            'telephone' => 'nullable',
            'telegram_id' => 'nullable',
            'instagram_id' => 'nullable',
            'co_link' => 'nullable',
            'website_title' => 'nullable',
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
