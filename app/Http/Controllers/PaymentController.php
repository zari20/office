<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('regular')->except('show');
        $this->middleware('auth')->only('show');
    }

    public function create()
    {
        //check if current user already has a payment
        if($payment = auth()->user()->payment){
            return redirect("payments/$payment->id");
        }

        //neccessary variables
        $payment = new Payment;
        $card_number = ['','','',''];

        //return view
        return view('payments.create_or_edit',compact('payment','card_number'));
    }

    public function store(Request $request)
    {
        //check if current user already has a payment
        if(auth()->user()->payment){
            return back()->withErrors(["شما قبلا اطلاعات مالی خود را ثبت کرده اید. برای ویرایش از قسمت داشبرد اقدام کنید."]);
        }

        //perform validation
        $data = self::validation();

        //set user id
        $data['user_id'] = auth()->id();

        //creating record
        $payment = Payment::create($data);

        //redirection
        Helper::flash();
        return redirect("payments/$payment->id");
    }

    public function show(Payment $payment)
    {
        //check if user has access to current payment
        Helper::user_check($payment);

        //return view
        return view('payments.show',compact('payment'));
    }

    public function edit(Payment $payment)
    {
        //check if user has access to current payment
        Helper::user_check($payment);

        //neccessary variables
        $card_number = explode('-',$payment->card_number);

        //return view
        return view('payments.create_or_edit',compact('payment','card_number'));
    }

    public function update(Request $request, Payment $payment)
    {
        //check if user has access to current payment
        Helper::user_check($payment);

        //perform validation
        $data = self::validation();

        //updating record
        Payment::where('id',$payment->id)->update($data);

        //redirection
        Helper::flash();
        return redirect("payments/$payment->id");
    }

    public static function validation()
    {
        $data = request()->validate([
            'card_number.*' => 'required|digits:4',
            'owner_name' => 'required|string|max:190',
            'shaba' => 'nullable',
            'bank_name' => 'nullable',
            'bank_branch' => 'nullable',
            'bank_code'=> 'nullable',
        ]);
        $data['card_number'] = implode($data['card_number'],'-');
        return $data;
    }
}
