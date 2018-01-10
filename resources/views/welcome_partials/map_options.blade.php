<form class="map-options" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}

    <button type="submit" class="link" formaction="{{url('welcome_action/edit/'.$partial)}}">
        <a class="none" href="#" title="ویرایش" data-tooltip="tooltip">
            <i class="fa fa-edit text-success"></i>
        </a>
    </button>

    @if ($delete)
        <button type="submit" class="link" formaction="{{url('welcome_action/delete/'.$partial)}}">
            <a class="none" href="#" title="حذف" data-tooltip="tooltip">
                <i class="fa fa-trash text-danger"></i>
            </a>
        </button>
    @endif

    <button type="submit" class="link" formaction="{{url('welcome_action/visibility/'.$partial)}}">
        <a class="none" href="#" title="{{$close ? 'عدم نمایش' : 'نمایش'}}" data-tooltip="tooltip">
            <i class="fa fa-{{$close ? 'eye-slash' : 'eye' }} text-{{$close ? 'warning' : 'primary'}}"></i>
        </a>
    </button>
</form>
