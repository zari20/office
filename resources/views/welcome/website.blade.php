<form class="p-3" action="{{url('/welcome_page/website')}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="row">

        <div class="form-group col-md-6">
            <label for="title"> عنوان سایت </label>
            <input type="text" class="form-control" id="title" name="title" value="{{$website->title}}">
        </div>
        <div class="form-group col-md-6">
            <label for="author"> مدیر سایت </label>
            <input type="text" class="form-control" id="author" name="author" value="{{$website->author}}">
        </div>
        <div class="form-group col-md-12">
            <label for="description"> توضیحات سایت </label>
            <input type="text" class="form-control" id="description" name="description" value="{{$website->description}}">
        </div>

    </div>

    <div class="row">
        <div class="col-md-5"></div>
        <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
    </div>
</form>
