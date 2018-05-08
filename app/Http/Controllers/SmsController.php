<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmsController extends Controller
{

    public static function new_user($data)
    {
        $mobile = $data['mobile'];
        $username = $data['username'] ?? $mobile;
        $body  = "سلام. حساب کاربری شما با موفقیت ایجاد شد.";
        $body .= "\nنام کاربری : $username";
        $body .= "\nرمز عبور : ".$data['password'];
        self::send($mobile,$body);
    }

    public static function send($mobile,$body)
    {
        file_get_contents("http://iqcard.ir/direct?mobile=".$mobile."&body=".urlencode($body)."&token=31kBW4hvf4uGPQ2Cs0iPcemt8bUJParp");
    }
}
