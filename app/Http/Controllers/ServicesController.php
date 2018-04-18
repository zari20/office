<?php

namespace App\Http\Controllers;

class ServicesController extends Controller
{

    public function main($method,$type,$id=0)
    {
        $this->$method($type,$id);
    }

    public function index($type,$id=null)
    {
        $class = '\App\\'.ucfirst($type);
        $records = $class::all();
        dd($records);
    }
}
