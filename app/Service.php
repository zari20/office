<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = ['id'];

    public static function make($data,$reserve)
    {
        foreach ($data['service'] as $type_id => $array) {
            foreach ($array['model'] as $i => $model_id) {
                $model = ServiceModel::find($model_id);
                if ($model) {
                    $s = new self;
                    $s->reserve_id = $reserve->id;
                    $s->type = $type_id;
                    $s->model = $model_id;
                    $s->count = $model->countable ? $array['count'][$i] : 1;
                    $s->save();
                }
            }
        }
    }
}
