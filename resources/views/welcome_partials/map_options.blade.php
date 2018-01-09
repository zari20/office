<form class="map-options" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <button type="submit" class="link" formaction="{{url('welcome_action/edit/'.$partial)}}">
        <a class="none" href="#" title="ویرایش" data-tooltip="tooltip">
            <i class="fa fa-edit text-success"></i>
        </a>
    </button>

    <button type="submit" class="link" formaction="{{url('welcome_action/delete/'.$partial)}}">
        <a class="none" href="#" title="حذف" data-tooltip="tooltip">
            <i class="fa fa-trash text-danger"></i>
        </a>
    </button>

    <button type="submit" class="link" formaction="{{url('welcome_action/visibility/'.$partial)}}">
        <a class="none" href="#" title="{{$open ? 'نمایش' : 'عدم نمایش'}}" data-tooltip="tooltip">
            <i class="fa fa-{{$open ? 'eye' : 'eye-slash'}} text-{{$open ? 'primary' : 'warning'}}"></i>
        </a>
    </button>
</form>
