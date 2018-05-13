<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceType;
use App\ServiceModel;

class ServiceController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $records = ServiceType::orderBy('position')->get();
        return view("services.index", compact('records','kind'));
    }

    public function create()
    {
        $kind = request('kind') ?? 'service_model';
        return view("services.create_{$kind}", compact('kind'));
    }

    public function store(Request $request)
    {
        $data = self::validation();
        $kind = request('kind');
        $class = class_name($kind);
        $class::create($data);
        Helper::flash();
        return redirect("services");
    }

    public function show($id)
    {
        $service = ServiceType::find($id);
        return view('services.show',compact('service'));
    }

    public function edit($id)
    {
        $kind = request('kind') ?? 'service_model';
        $class = class_name($kind);
        $object = $class::find($id);
        return view("services.create_{$kind}", compact('object','kind'));
    }

    public function update(Request $request, $id)
    {
        $data = self::validation();
        $kind = request('kind');
        $class = class_name($kind);
        $class::where('id',$id)->update($data);
        Helper::flash();
        return redirect("services");
    }

    public function destroy($id)
    {
        $service = request('service');
        if ($service == 'service_type') {
            $object = ServiceType::find($id);
            foreach ($object->models as $key => $model) {
                $model->delete();
            }
        }elseif($service == 'service_model') {
            $object = ServiceModel::find($id);
        }
        $object->delete();
        Helper::flash_delete_message();
        return redirect("services");
    }

    public static function validation()
    {
        $kind = request('kind');
        if ($kind == 'service_type') {
            return request()->validate([
                'title' => 'required|string|max:100',
                'position' => 'nullable'
            ]);
        }elseif ($kind == 'service_model') {
            $data = request()->validate([
                'service_type_id' => 'required|exists:service_types,id',
                'title' => 'required|string|max:100',
                'base' => 'required|integer',
                'countable' => 'nullable',
                'description' => 'nullable'
            ]);
            $data['countable'] = $data['countable'] ?? 0;
            return $data;
        }else {
            abort(404);
        }
    }

}
