<?php

namespace App\Http\Controllers;

use App\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['index','show','edit','update','destroy','logmein']);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        //getting neccessary records from database
        $rooms = \App\RoomType::all();
        $caterings = \App\CateringType::all();
        $media = \App\MediumType::all();
        $graphics = \App\GraphicType::all();
        $informings = \App\InformingType::all();

        //creating days and dates array
        $today = date('w');
        $day = 0;
        $i = 0;
        while ($day != $today) {
            $day = $day==0 ? $today : $day;

            $days[] = \App\Day::where('latin_number',$day)->first();

            $date = new \DateTime(date('Y-m-d'));
            $date->modify("+$i day");
            $dates[] = $date;

            $day == 7 ? $day = 1 : $day++;
            $i++;
        }

        return view('reserves.create',compact('rooms','caterings','media','graphics','informings','icons','days','dates'));
    }

    public function store(Request $request)
    {
        if(Auth::check()){

            //re-filling the form
            if ($request->step == 0) {
                $reserve_data = session('reserve_data');
                // TODO:
                dd('در دست ساخت');
            }

            //finalizing form
            if ($request->step == 1) {
                self::validation();
                $reserve_data = request()->all();
                $total_cost = $reserve_data['schedule']['cost']+
                                $reserve_data['catering']['cost']+
                                $reserve_data['medium']['cost']+
                                $reserve_data['graphic']['cost']+
                                $reserve_data['informing']['cost'];
                $reserve_data['total_cost'] = $total_cost;
                session(compact('reserve_data'));
                return view('reserves.finalize',compact('reserve_data'));
            }

            //discount code
            if ($request->step == 2) {
                $reserve_data = session('reserve_data');
                $found = \App\DiscountCode::where('code',$request->discount_code)->first();
                if ($found) {
                    // TODO:
                }else {
                    return view('reserves.finalize',compact('reserve_data'))->withErrors(['کد تخفیف وارد شده صحیح نیست']);
                }
            }

            //storing in database
            if ($request->step == 3) {
                $reserve_data = session('reserve_data');
                $reserve_instance = Reserve::make($reserve_data);
                \App\Course::make($reserve_data,$reserve_instance);
                \App\Schedule::make($reserve_data,$reserve_instance);
                \App\Booking::make($reserve_data,$reserve_instance);
                \App\Service::make($reserve_data,$reserve_instance);
                \App\Payment::make($reserve_data,$reserve_instance);

                Helper::flash();
                return redirect("reserves/$reserve_instance->id");
            }

        }else {
            return back()->withErrors(['شما باید ابتدا وارد حساب کاربری خود شوید.'])->withInput();
        }
    }

    public function show($id)
    {
        //getting instance
        $reserve = Reserve::find($id);

        //user check
        Helper::user_check($reserve);

        //return view
        return view('reserves.show',compact('reserve'));
    }

    public function edit(Reserve $reserve)
    {
        //
    }

    public function update(Request $request, Reserve $reserve)
    {
        //
    }

    public function destroy(Reserve $reserve)
    {
        //
    }

    public function create_user()
    {
        $data = request()->validate([
            'email' => 'nullable|string|email|max:190|unique:users',
            'mobile' => 'required|digits:11|unique:users',
            'telephone' => 'nullable|digits:11|unique:users',
            'city_id' => 'nullable|integer|exists:cities,id',
            'region' => 'nullable|string|max:190',
            'address' => 'nullable|string|max:300',
            'postal_code' => 'nullable|integer|digits:10|unique:users',
            'password' => 'required|string|min:4|confirmed',
        ]);
        $user = \App\User::create($data);
        \Auth::login($user);

        Helper::flash();
        return redirect("reserves/create");
    }

    public function logmein()
    {
        return redirect('reserves/create');
    }

    public static function validation()
    {
        request()->validate([
            'course.name' => 'required',
            'course.performer' => 'required',
            'schedule.room_id' => 'required',
            'period' => 'required'
        ]);
    }
}
