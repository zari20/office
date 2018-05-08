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
                 $bookings['past'] = \App\Booking::whereDate('date','<',Carbon::today())->limit(6)->get();
                 $bookings['today'] = \App\Booking::whereDate('date','=',Carbon::today())->limit(6)->get();
                 $bookings['future'] = \App\Booking::whereDate('date','>',Carbon::today())->limit(6)->get();
                 break;
             case 'past':
                 dd('past');
                 break;
             case 'today':
                 dd('today');
                 break;
             case 'future':
                 dd('future');
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

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('partials.under_construction');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        return view('partials.under_construction');
    }
}
