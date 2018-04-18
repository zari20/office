<?php

function user_type()
{
    return auth()->user()->type;
}
