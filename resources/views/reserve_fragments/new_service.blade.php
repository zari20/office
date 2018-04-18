<div class="collapse" id="collapse{{ucfirst($type)}}">
    <div class="alert alert-info">
        <h4 class="alert-heading">توضیحات {{translate($type)}}</h4>
        <hr>
        @foreach ($services as $key => $service)
            <p class="{{$type}}-description" id="{{$type}}-description-{{$service->id}}" @if($key>0) style="display:none" @endif> {{$service->description}} </p>
        @endforeach
        <p>
            هزینه واحد:
            @foreach ($services as $key => $service)
                <span class="{{$type}}-cost" id="{{$type}}-cost-{{$service->id}}" @if($key>0) style="display:none" @endif> {{$service->cost}} </span>
            @endforeach
            تومان
        </p>
    </div>
    <div class="row">
        <div class="form-group col-md-4 styled-select slate">
            <label for="{{$type}}"> نوع {{translate($type)}} <i class="fa fa-asterisk text-danger"></i></label>
            <select class="form-control" name="{{$type}}_id" id="{{$type}}" onchange="changeService($(this))">
                @foreach ($services as $key => $service)
                    <option value="{{$service->id}}" data-cost="{{$service->cost}}">{{$service->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label for="{{$type}}-count"> تعداد <i class="fa fa-asterisk text-danger"></i></label>
            <input type="number" class="form-control" id="{{$type}}-count" name="{{$type}}_count" value="{{old($type.'_count') ?? 1}}" required placeholder="*الزامی" onchange="changeCount($(this))" data-type="{{$type}}">
        </div>
        <div class="form-group col-md-4">
            <label for="{{$type}}-final-cost"> <i class="fa fa-money ml-1"></i> هزینه نهایی به تومان </label>
            <input type="text" class="form-control" id="{{$type}}-final-cost" name="{{$type}}_cost" value="{{$services->first()->cost ?? 0}}" disabled>
        </div>
    </div>
    <hr>
</div>
