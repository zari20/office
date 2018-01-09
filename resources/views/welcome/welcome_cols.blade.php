<p class="h3 dinar text-blue"> مدیریت ستون های زیر منو </p>
<form class="p-3" action="{{url('/welcome_page/col')}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="">
        <p class="h5 mt-3">
            <a class="cloner pointer">
                ستون
                <i class="fa fa-plus text-blue mt-1 mr-2"></i>
            </a>
        </p>
    </div>


    <div class="clone-box">
        @foreach ($cols as $key => $col)
            <div class="row to-be-cloned">
                <fieldset class="form-group col-md-1 p-3">
                    <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> عنوان </label>
                    <input name="subject[]" value="{{$col->subject}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> آیکون </label>
                    <input name="icon[]" value="{{$col->icon}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> لینک </label>
                    <input name="href[]" value="{{$col->href}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-5 p-3">
                    <label> توضیحات </label>
                    <input name="info[]" value="{{$col->info}}" type="text" class="form-control">
                </fieldset>
            </div>
        @endforeach
    </div>


    <div class="row">
        <div class="col-md-5"></div>
        <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
    </div>
</form>
