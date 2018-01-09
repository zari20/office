<p class="h3 dinar text-blue"> مدیریت هدر </p>
<form class="p-3" action="{{url('/welcome_page/header')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="row">
        <fieldset class="form-group col-md-2">
            <label> شماره تماس هدر بالا </label>
            <input value="{{$header->telephone ?? ''}}" type="text" class="form-control" name="telephone">
        </fieldset>

        <fieldset class="form-group col-md-2">
            <label> آیدی تلگرام </label>
            <input value="{{$header->telegram_id ?? ''}}" type="text" class="form-control" name="telegram_id">
        </fieldset>

        <fieldset class="form-group col-md-2">
            <label> آیدی اینستاگرام </label>
            <input value="{{$header->instagram_id ?? ''}}" type="text" class="form-control" name="instagram_id">
        </fieldset>

        <fieldset class="form-group col-md-3">
            <label> لینک {{$words->co}} </label>
            <input value="{{$header->co_link ?? ''}}" type="text" class="form-control" name="co_link">
        </fieldset>

        <fieldset class="form-group col-md-3">
            <label> عنوان تب مرورگر </label>
            <input value="{{$header->website_title ?? ''}}" type="text" class="form-control" name="website_title">
        </fieldset>
    </div>

    <div class="">
        <p class="h5 mt-3">
            <a class="cloner pointer">
                {{$words->other}}
                <i class="fa fa-plus text-blue mt-1 mr-2"></i>
            </a>
        </p>
    </div>


    <div class="clone-box">
        @foreach ($top_links as $key => $link)
            <div class="row to-be-cloned">
                <fieldset class="form-group col-md-1 p-3">
                    <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                </fieldset>
                <fieldset class="form-group col-md-1 p-3">
                    <label> شماره </label>
                    <input name="number[]" value="{{$link->number}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-7 p-3">
                    <label> لینک </label>
                    <input name="website_link[]" value="{{$link->href}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-3 p-3">
                    <label> آپلود لوگو </label>
                    <input name="website_logo[]" type="file" class="form-control-file">
                </fieldset>
            </div>
        @endforeach
    </div>


    <div class="row">
        <div class="col-md-5"></div>
        <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
    </div>
</form>
