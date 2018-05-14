@foreach (services() as $key => $service)
    <div class="collapse" id="collapse-service-{{$service->id}}" data-parent="#reserves-collapseable">

        <div id="model-rows-{{$service->id}}">
            @foreach (old('service')[$service->id]['model'] ?? [0] as $i => $id)
                <div class="row" data-service-type="{{$service->id}}" data-row="{{$i+1}}" id="model-row">

                    <div class="form-group col-md-4">
                        <label> نوع {{$service->title}} </label>
                        <select class="form-control" name="service[{{$service->id}}][model][]" onchange="modelChange($(this))">
                            <option value=""> انتخاب کنید </option>
                            @foreach ($service->models as $key => $model)
                                <option value="{{$model->id}}" data-cost="{{$model->base}}" data-countable="{{$model->countable}}"
                                    @if($model->id == old('service')[$service->id]['model'][$i]) selected @endif>
                                    {{$model->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-4" id="model-count-field">
                        <label for="model-count"> تعداد </label>
                        <input type="number" class="form-control model-count" name="service[{{$service->id}}][count][]"
                            onchange="changeCount($(this))" onkeyup="changeCount($(this))"
                            value="{{old('service')[$service->id]['count'][$i] ?? 0}}">
                    </div>

                    <div class="form-group col-md-4">
                        <label> <i class="fa fa-money ml-1"></i> هزینه به تومان </label>
                        <input type="text" class="form-control model-row-cost" name="service[{{$service->id}}][cost][]"
                            value="{{old('service')[$service->id]['cost'][$i] ?? 0}}" readonly>
                    </div>

                </div>
            @endforeach
        </div>
        <hr>
        <div class="text-light text-center">
            <a onclick="removeModelRow('{{$service->id}}')" class="btn btn-danger mx-1" id="trash-icon-{{$service->id}}" style="display:none">
                <i class="fa fa-times ml-1"></i> حذف مورد
            </a>
            <a onclick="newModelRow('{{$service->id}}')" class="btn btn-success mx-1"> <i class="fa fa-plus ml-1"></i> اضافه کردن {{$service->title}} جدید </a>
        </div>
        <hr>

    </div>
@endforeach
