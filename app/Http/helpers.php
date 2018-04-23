<?php

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

//services

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

//texts

function toman($amount)
{
    return $amount ? number_format($amount)."تومان" : 0;
}

function str_with_dots($string,$number=100)
{
    return strlen($string) > $number ? substr($string, 0, $number).'...' : $string;
}
