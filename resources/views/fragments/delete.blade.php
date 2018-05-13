<a onclick="if(confirm('ایا این آیتم پاک شود؟')) $('form#delete-{{$name}}-{{$object->id}}').submit()" class="none" title="حذف">
    <i class="fa fa-trash text-danger"></i>
</a>
<form class="d-none" action="{{url("{$name}s/$object->id")}}" method="post" id="delete-{{$name}}-{{$object->id}}">
    @csrf
    @isset($value)
        <input type="hidden" name="{{$name}}" value="{{$value}}">
    @endisset
    {{method_field('DELETE')}}
</form>
