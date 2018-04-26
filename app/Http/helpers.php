<?php

//dates


//authenticating

function user_type()
{
    return auth()->user()->type;
}

function admin()
{
    return auth()->user()->type == 'admin';
}

//retrieve

function cities()
{
    return \DB::table('cities')->get();
}

function services()
{
    return ['room','catering','medium','graphic','informing'];
}

//translate
function translate($word)
{
    switch ($word) {
        case 'room': return 'اتاق'; break;
        case 'catering': return 'پذیرایی'; break;
        case 'medium': return 'خدمات سمعی بصری'; break;
        case 'graphic': return 'خدمات گرافیکی'; break;
        case 'informing': return 'خدمات روابط عمومی'; break;
        default: return $word; break;
    }
}

function week_day($day)
{
    if($day==0) return "شنبه";
    if($day==1) return "یکشنبه";
    if($day==2) return "دوشنبه";
    if($day==3) return "سه شنبه";
    if($day==4) return "چهارشنبه";
    if($day==5) return "پنجشنبه";
    if($day==6) return "جمعه";
    return '?';
}

function latin_week_day($day)
{
    if($day==1) return "دوشنبه";
    if($day==2) return "سه شنبه";
    if($day==3) return "چهارشنبه";
    if($day==4) return "پنجشنبه";
    if($day==5) return "جمعه";
    if($day==6) return "شنبه";
    if($day==7) return "یکشنبه";
    return '?';
}

//texts

function toman($amount)
{
    return $amount ? number_format($amount)."تومان" : 0;
}

function str_with_dots($string,$number=100)
{
    return strlen($string) > $number ? substr($string, 0, $number).'...' : $string;
}
function display_time($time)
{
    return substr($time, 0, -3);
}
