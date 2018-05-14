<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;

class RoomController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $rooms = Room::all();
        return view('rooms.index',compact('rooms'));
    }

    public function create()
    {
        $room = new Room;
        return view('rooms.create_or_edit',compact('room'));
    }

    public function store(Request $request)
    {
        $data = self::validation();
        Room::create($data);
        Helper::flash();
        return redirect("rooms");
    }

    public function edit(Room $room)
    {
        return view('rooms.create_or_edit',compact('room'));
    }

    public function update(Request $request, $id)
    {
        $data = self::validation();
        Room::where('id',$id)->update($data);
        Helper::flash();
        return redirect("rooms");
    }

    public function destroy(Room $room)
    {
        $room->delete();
        Helper::flash_delete_message();
        return redirect("rooms");
    }

    public static function validation()
    {
        return request()->validate([
            'name' => 'required|string|max:100',
            'capacity' => 'required|integer',
            'cost_pre_hour' => 'required|integer',
            'description' => 'nullable|string|max:1000',
        ]);
    }
}
