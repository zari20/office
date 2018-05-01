<?php

namespace App\Http\Controllers;

use App\DiscountCode;
use Illuminate\Http\Request;

class DiscountCodeController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $codes = DiscountCode::all();
        return view('codes.index',compact('codes'));
    }

    public function create()
    {
        $rooms = \App\RoomType::all();
        return view('codes.create',compact('rooms'));
    }

    public function store(Request $request)
    {
        //validating requested data
        $data = self::validation();

        //creating record in database
        DiscountCode::create($data);

        //redirection
        Helper::flash();
        return redirect('discounts');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $code = DiscountCode::find($id);
        $rooms = \App\RoomType::all();
        return view('codes.create',compact('rooms','code'));
    }

    public function update(Request $request, $id)
    {
        //validating requested data
        $data = self::validation($id);

        //updating record in database
        DiscountCode::where('id',$id)->update($data);

        //redirection
        Helper::flash();
        return redirect('discounts');
    }

    public function destroy($id)
    {
        $code = DiscountCode::find($id);
        $code->delete();
        Helper::flash_delete_message();
        return back();
    }

    public static function validation($id=0)
    {
        return request()->validate([
            "room_id" => "nullable",
            "code" => "required|string|max:100|unique:discount_codes,code,$id",
            "percent" => "required|integer|between:1,99"
        ]);
    }
}
