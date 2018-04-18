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
