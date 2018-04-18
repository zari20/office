<?php

namespace App\Http\Controllers;

use App\Reserve;
use Illuminate\Http\Request;

class ReserveController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $rooms = \App\RoomType::all();
        return view('reserves.create',compact('rooms'));
    }

    public function store(Request $request)
    {
        //
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
}
