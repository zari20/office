<p class="h3 dinar text-blue"> مدیریت لوگو </p>
<form class="p-3" action="{{url('/welcome_page/logo')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="row">

        <fieldset class="form-group col-md-4">
            <label> عنوان سایت </label>
            <input value="{{$welcome_logo->title ?? ''}}" type="text" class="form-control" name="title">
        </fieldset>

        <fieldset class="form-group col-md-4">
            <label> توضیخات سایت </label>
            <input value="{{$welcome_logo->info ?? ''}}" type="text" class="form-control" name="info">
        </fieldset>

        <fieldset class="form-group col-md-4">
            <label> لوگوی اصلی </label>
            <input name="main_logo" type="file" class="form-control-file">
        </fieldset>
    </div>

    <div class="row">
        <div class="col-md-5"></div>
        <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
    </div>
</form>
