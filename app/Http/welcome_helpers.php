<?php

function carousel_indicators($array)
{
    $count = count($array);
    if($count%4==0){
        return ($count/4)-1;
    }else {
        return floor($count/4);
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

function phone_number($mobile)
{
    return substr($mobile,0,4) . ' ' . substr($mobile,4,-4) . ' ' . substr($mobile,7,11);
}

function toman($value)
{
    $value = is_numeric($value) ? number_format($value) : $value;
    $toman = $value ? $value.' تومان' : $value;
    return $toman;
}

function storage($path)
{
    $path = 'storage/'.$path;
    $path = asset($path);
    $path = str_replace('public/','',$path);
    return $path;
}
