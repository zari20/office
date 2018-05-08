<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

     public function index()
     {
         $type = request('type') ?? 'all';

         switch ($type) {
             case 'all':
                 $bookings['past'] = Booking::whereDate('date','<',Carbon::today())->orderBy('date')->limit(6)->get();
                 $bookings['today'] = Booking::whereDate('date','=',Carbon::today())->orderBy('date')->limit(6)->get();
                 $bookings['future'] = Booking::whereDate('date','>',Carbon::today())->orderBy('date')->limit(6)->get();
                 break;
             case 'past':
                 $bookings = Booking::whereDate('date','<',Carbon::today())->orderBy('date')->paginate(30);
                 break;
             case 'today':
                 $bookings = Booking::whereDate('date','=',Carbon::today())->orderBy('date')->paginate(30);
                 break;
             case 'future':
                 $bookings = Booking::whereDate('date','>',Carbon::today())->orderBy('date')->paginate(30);
                 break;
             default:
                abort(404);
                 break;
         }

         return view('bookings.index',compact('bookings','type'));
     }

    public function create()
    {
        $periods = \App\Period::all();
        return view('bookings.create',compact('periods'));
    }

    public function store(Request $request)
    {

        //validating data
        $data = $request->validate([
            'period_id' => 'required|exists:periods,id',
            'date' => ['required', new \App\Rules\FutureDate, new \App\Rules\MatchingWeekDay ]
        ]);

        //making record
        Booking::admin_make($data);

        //redirection
        Helper::flash();
        return redirect('bookings');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        $message = "عملیات با موفقیت انجام شد.";
        Helper::message($message);
        return back();
    }
}
