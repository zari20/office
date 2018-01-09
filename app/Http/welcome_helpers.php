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
