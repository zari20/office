<div class="col-md-5"></div>
<div class="col-md-2">
    <button type="submit" class="btn btn-block bg-blue" @isset($name) name="{{$name}}" value="{{$value}}" @endisset>
        <i class="fa fa-{{$icon ?? 'check'}} ml-1"></i>
        {{$text ?? 'تایید'}}
    </button>
</div>
