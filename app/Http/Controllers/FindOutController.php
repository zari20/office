<?php

namespace App\Http\Controllers;

use App\FindOut;
use Illuminate\Http\Request;

class FindOutController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $find_outs = FindOut::all();
        return view('find_outs.index',compact('find_outs'));
    }

    public function create()
    {
        $find_out = new FindOut;
        return view('find_outs.create',compact('find_out'));
    }

    public function store(Request $request)
    {
        //perform validation
        $titles = self::validation();

        //store titles in database
        $titles = explode("\r\n",$titles);
        foreach ($titles as $key => $title) {
            FindOut::make($title);
        }

        //redirection
        Helper::flash();
        return redirect("find_outs");
    }

    public function edit(FindOut $find_out)
    {
        return view('find_outs.edit',compact('find_out'));
    }

    public function update(Request $request, $id)
    {
        //perform validation
        $title = self::validation();

        //update record
        FindOut::where('id',$id)->update(compact('title'));

        //redirection
        Helper::flash();
        return redirect("find_outs");

    }

    public function destroy(FindOut $find_out)
    {
        $find_out->delete();
        Helper::flash_delete_message();
        return redirect("find_outs");
    }

    public static function validation()
    {
        request()->validate([
            'title' => 'required'
        ]);
        return request('title');
    }
}
