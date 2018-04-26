<?php

namespace App\Http\Controllers;

use App\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['create','store']);
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

            self::validation();
            dd(request()->all());

        }else {
            return back()->withErrors(['شما باید ابتدا وارد حساب کاربری خود شوید.'])->withInput();
        }
    }

    public function show(Reserve $reserve)
    {
        //
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
