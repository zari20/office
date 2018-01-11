<p class="h3 dinar text-info"> {{$words->videos}} </p>
<form class="p-3" action="{{url('/welcome_page/videos')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="">
        <p class="h5 mt-3">
            <a class="cloner pointer">
                {{$words->videos}}
                <i class="fa fa-plus text-info mt-1 mr-2"></i>
            </a>
        </p>
    </div>


    <div class="clone-box">
        @foreach ($videos as $key => $video)
            <div class="row to-be-cloned">
                <fieldset class="form-group col-md-1 p-3 text-center">
                    <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                </fieldset>
                <fieldset class="form-group col-md-1 p-3 text-center">
                    <label> شماره </label>
                    <input name="number[]" value="{{$video->number}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> عنوان </label>
                    <input name="title[]" value="{{$video->title}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> لینک آپارات </label>
                    <input name="aparat_link[]" value="{{$video->aparat_link}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-4 p-3">
                    <label> متن </label>
                    <input name="body[]" value="{{$video->body}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> تصویر </label>
                    <input name="picture[]" type="file" class="form-control-file">
                </fieldset>
            </div>
        @endforeach
    </div>


    <div class="row">
        <div class="col-md-5"></div>
        <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
    </div>
</form>
