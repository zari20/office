<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (user_type()=='admin') {
            return view('home');
        }else {
            $current_user = auth()->user();
            $suffix = $current_user->payment->id ?? 'create';
            $payment_url = 'payments/'.$suffix;
            return view('home',compact('current_user','payment_url'));
        }
    }
}
