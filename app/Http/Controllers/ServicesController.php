<?php

namespace App\Http\Controllers;

class ServicesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function main($method,$type,$id=0)
    {
        Helper::admin_check();
        if (in_array($type,services())) {
            return $this->$method($type,$id);
        }else {
            abort(404);
        }
    }

    public function index($type,$id)
    {
        $class = '\App\\'.ucfirst($type).'Type';
        $records = $class::all();
        return view('services.index',compact('type','records'));
    }

    public function create($type,$id)
    {
        return view('services.create',compact('type'));
    }

    public function store($type,$id)
    {
        $class = '\App\\'.ucfirst($type).'Type';
        $object = new $class;
        return $this->save($type,$object,true);
    }

    public function edit($type,$id)
    {
        $class = '\App\\'.ucfirst($type).'Type';
        $object = $class::find($id);
        if ($object) {
            return view('services.create',compact('type','object'));
        }else {
            abort(404);
        }
    }

    public function update($type,$id)
    {
        $class = '\App\\'.ucfirst($type).'Type';
        $object = $class::find($id);
        if ($object) {
            return $this->save($type,$object,false);
        }else {
            abort(404);
        }
    }

    public function destroy($type,$id)
    {
        $class = '\App\\'.ucfirst($type).'Type';
        $object = $class::find($id);
        if ($object) {
            $object->delete();
            if ($type == 'room') {
                \App\Period::where('room_id',$id)->delete();
            }
            Helper::flash_delete_message();
            return back();
        }else {
            abort(404);
        }
    }

    private function save($type,$object,$create_periods=false)
    {
        $object->name = request('name');
        if ($type=='room') {
            $object->capacity = request('capacity');
            $object->cost_pre_hour = request('cost_pre_hour');
        }else {
            $object->cost = request('cost');
        }
        $object->description = request('description');
        $object->save();

        if ($create_periods && $type=='room') {
            \App\Period::create_defaults($object->id);
        }

        Helper::flash();
        return redirect("services/index/$type");
    }
}
