<?php

namespace App\Http\Controllers;

use App\Period;
use Illuminate\Http\Request;

class PeriodController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $periods = Period::orderBy('day_id')->orderBy('room_id')->orderBy('from')->get();
        return view('periods.index',compact('periods'));
    }

    public function create()
    {
        $days = \App\Day::orderBy('number')->get();
        $rooms = \App\RoomType::all();
        return view('periods.create',compact('days','rooms'));
    }

    public function store(Request $request)
    {
        $data = request()->all();
        unset($data['_token']);
        Period::insert($data);
        Helper::flash();
        return redirect('/periods');
    }

    public function show(Period $period)
    {
        return redirect('/periods');
    }

    public function edit(Period $period)
    {
        $days = \App\Day::orderBy('number')->get();
        $rooms = \App\RoomType::all();
        return view('periods.create',compact('days','rooms','period'));
    }

    public function update($id)
    {
        $data = request()->all();
        unset($data['_token']);
        unset($data['_method']);
        Period::where('id',$id)->update($data);
        Helper::flash();
        return redirect('/periods');
    }

    public function destroy(Period $period)
    {
        $bookings = \App\Booking::where('period_id',$period->id)->get();
        if (count($bookings)) {
            $errors = ['نمیتوان این سانس را پاک کرد.'];
            foreach ($bookings as $key => $booking) {
                $user = $booking->reserve->user;
                if ($user) {
                    $errors[] = "این سانس توسط کاربری با شماره تماس $user->mobile رزرو شده است.";
                }else {
                    $errors[] = "این سانس توسط کاربری که اکنون حساب کاربریش پاک شده است رزرو شده است.";
                }
            }
            return back()->withErrors($errors);
        }else {
            $period->delete();
            Helper::flash_delete_message();
            return back();
        }
    }
}
