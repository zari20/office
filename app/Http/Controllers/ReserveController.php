<?php

namespace App\Http\Controllers;

use App\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['show','logmein','index']);
        $this->middleware('admin')->only(['destroy']);
    }

    public function index()
    {
        if (admin()) {
            $reserves = Reserve::latest()->get();
        }else {
            $reserves = Reserve::where('user_id',auth()->id())->latest()->get();
        }
        return view('reserves.index',compact('reserves'));
    }

    public function create()
    {
        //check if rooms exist
        $rooms = \App\RoomType::all();
        if(!count($rooms)){
            return view('reserves.no_room_error');
        }

        //getting neccessary records from database
        $caterings = \App\CateringType::all();
        $media = \App\MediumType::all();
        $graphics = \App\GraphicType::all();
        $informings = \App\InformingType::all();

        //find_outs
        $find_outs = \App\FindOut::all();

        //creating days and dates array
        $days_and_dates = \App\Day::days_and_dates();
        $days = $days_and_dates['days'];
        $dates = $days_and_dates['dates'];
        $current_room = old('schedule')['room_id'] ?? $rooms->first()->id;

        //rserve data
        $reserve_data = session('reserve_data');

        return view('reserves.create',compact('rooms','caterings','media','graphics','informings','find_outs','icons','days','dates','current_room'))->withInput($reserve_data);
    }

    public function store(Request $request)
    {
        if(Auth::check()){

            //finalizing form

            if ($request->step == 0) {
                $reserve_data = session('reserve_data');
                return redirect('reserves/create')->withInput($reserve_data);
            }

            if ($request->step == 1) {
                self::validation();
                $reserve_data = request()->all();

                //hack check and return view
                $requested_total_cost = ReseveDataController::total_cost_from_request($reserve_data);
                $total_cost = ReseveDataController::total_cost();
                if( !is_int($total_cost)) return $total_cost;
                if ($requested_total_cost == $total_cost) {

                    //set total cost in reserve data
                    $reserve_data['total_cost'] = $total_cost;

                    //file upload
                    if ($request->course_file) {
                        $reserve_data['course']['file_path'] = $request->file('course_file')->store('courses');
                        unset($reserve_data['file']);
                    }

                    //store reserve data in session for further use
                    session(compact('reserve_data'));

                    return view('reserves.finalize',compact('reserve_data'));

                }else {
                    return back()->withErrors(ReseveDataController::$errors);
                }
            }

            //discount code
            if ($request->step == 2) {
                $reserve_data = session('reserve_data');
                $discount_code = \App\DiscountCode::where('code',$request->discount_code)->first();
                if ($discount_code) {
                    $errors = [];
                    if ($discount_code->expired()) {
                        $errors[] = "تاریخ استفاده از این کد گذشته است. انقضا: ".date_picker_date($discount_code->expire_date);
                    }
                    if ($discount_code->room_id && $discount_code->room_id != $reserve_data['schedule']['room_id']) {
                        $errors[] = "این کد تخفیف برای این سالن قابل استفاده نمیباشد.";
                    }
                    if ($discount_code->period_id && !in_array($discount_code->period_id,$reserve_data['period']['id'])) {
                        $errors[] = "این تخفیف در صورتی شامل حال شما میشود که از سانس ".period_details($discount_code->period_id)." استفاده کنید.";
                    }
                    if (count($errors)) {
                        return view('reserves.finalize',compact('reserve_data'))->withErrors($errors);
                    }else {
                        $reserve_data['discount']['code'] = $request->discount_code;
                        $reserve_data['discount']['percent'] = $discount_code->percent;
                        $reserve_data['discount']['id'] = $discount_code->id;
                        $reserve_data['discount']['amount'] = floor($reserve_data['total_cost'] * ($discount_code->percent/100));
                        $reserve_data['payable_amount'] = $reserve_data['total_cost'] - $reserve_data['discount']['amount'];
                        session(['reserve_data'=>$reserve_data]);
                        return view('reserves.finalize',compact('reserve_data'));
                    }
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

                Helper::flash();
                session(['reserve_data'=>null]);
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

    public function destroy($id)
    {
        dd("در دست ساخت");
        $reserve = Reserve::find($id);
        $reserve->delete();
        Helper::flash_delete_message();
        return back();
    }

    public function pay(Reserve $reserve)
    {
        $amount = $reserve->payable_amount;
        $description = "پرداخت هزینه مربوط به اجاره سالن در آیکیوآفیس";
        return \App\Http\Controllers\ZarinPalController::direct($amount,$description,'reserve');
    }

    public function successful_transaction($zarin_instance)
    {
        //update reseve instance
        $reserve = $zarin_instance->reserve;
        if ($reserve) {
            $reserve->zarin_pal_id = $zarin_instance->id;
            $reserve->status = 1;
            $reserve->save();
        }else {
            return view('partials.whoops', ["extra"=>"برای پیگیری از شناسه پرداخت $zarin_instance->uid استفاده کنید."] );
        }

        //send sms to user
        $mobile = $reserve->user->mobile ?? null;
        $body = "پرداخت شما با موفقیت در سیستم ثبت شد. شناسه پرداخت : $zarin_instance->uid";
        if($mobile){
            SmsController::send($mobile,$body);
        }else {
            SmsController::warn("IQ-Office send message about successful transaction");
        }

        //redirection
        Helper::message($body);
        return redirect("reserves/$reserve->id");
    }

    public function create_user()
    {
        $data = UserController::validation();
        SmsController::new_user($data);
        $data['password'] = bcrypt($data['password']);
        $user = \App\User::create($data);
        \Auth::login($user);

        Helper::message("حساب کاربری با موفقیت ایجاد شد.");
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
