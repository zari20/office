<form class="p-3" action="{{url('/welcome_page/website')}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="row">

        <div class="form-group col-md-6">
            <label for="title"> عنوان سایت </label>
            <input type="text" class="form-control" id="title" name="title" value="{{$website->title}}">
        </div>
        <div class="form-group col-md-3">
            <label for="author"> مدیر سایت </label>
            <input type="text" class="form-control" id="author" name="author" value="{{$website->author}}">
        </div>
        <div class="form-group col-md-3">
            <label for="telegram_chat"> آیدی چت تلگرام </label>
            <input type="text" class="form-control" id="telegram_chat" name="telegram_chat" value="{{$website->telegram_chat}}">
        </div>
        <div class="form-group col-md-12">
            <label for="description"> توضیحات سایت </label>
            <input type="text" class="form-control" id="description" name="description" value="{{$website->description}}">
        </div>
        <div class="form-group col-md-12">
            <label for="keywords"> کلمات کلیدی </label>
            <textarea name="keywords" rows="8" class="form-control" id="keywords">{{$website->keywords}}</textarea>
        </div>
        <div class="form-group col-md-12">
            <label class="custom-control custom-radio">
                <span class="snip1582">عنوان</span>
                <input id="radio1" name="radio" type="radio" class="custom-control-input">
                <span class="custom-control-indicator"></span>
            </label>
            <label class="custom-control custom-radio">
                <input id="radio2" name="radio" type="radio" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                <span class="custom-control-description">Or toggle this other custom radio</span>
            </label>
        </div>

    </div>

    <div class="row">
        <div class="col-md-5"></div>
        <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
    </div>
</form>
