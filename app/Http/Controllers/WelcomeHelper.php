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

}
