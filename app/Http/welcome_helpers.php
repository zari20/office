<?php

function rw($value)
{
    return strtolower(str_replace('App\Welcome\Welcome','',$value));
}

function calculate_cols($count)
{
    switch ($count) {
        case 1: return 12; break;
        case 2: return 6; break;
        case 3: return 4; break;
        case 4: return 3; break;
        case 5: return 3; break;
        case 6: return 2; break;
        case 7: return 3; break;
        case 8: return 3; break;
        case 9: return 4; break;
        default: return 12; break;
    }
}

function welcome_translate($word)
{
    switch ($word) {
        case 'contactus': return 'تماس با ما'; break;
        case 'section': return 'بخش'; break;
        case 'tab': return 'تب'; break;
        case 'five_col': return '5 ستونه'; break;
        case 'slider': return 'اسلایدر'; break;
        case 'blog': return 'بلاگ'; break;
        case 'image': return 'ستون های عکس دار'; break;
        case 'image_cadr': return 'ستون های عکس دار با کادر'; break;
        case 'download': return 'ستون های دانلود'; break;
        case 'product': return 'محصولات'; break;
        case 'link': return 'لینک'; break;
        case 'card': return 'آگهی'; break;
        default: return $word; break;
    }
}

function carousel_indicators($array,$cols=4)
{
    $count = count($array);
    if($count%$cols==0){
        return ($count/$cols)-1;
    }else {
        return floor($count/$cols);
    }
}

function prepare_multiple($inputs)
{
    $result = [];

    foreach ($inputs as $key => $array) {
        if(is_array($array) && count($array)){
            foreach ($array as $i => $value) {
                $result[$i][$key] = $value;
            }
        }
    }

    return $result;
}

function pascal_case($str)
{
    $str = preg_replace_callback("/(?:^|_)([a-z])/", function($matches) {
        return strtoupper($matches[1]);
    }, $str);
    return $str;
}
