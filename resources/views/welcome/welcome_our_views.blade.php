<p class="h3 dinar text-info">  {{$words->our_views}} </p>
<form class="p-3" action="{{url('/welcome_page/our_views')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="">
        <p class="h5 mt-3">
            <a class="cloner pointer">
                {{$words->our_views}}
                <i class="fa fa-plus text-info mt-1 mr-2"></i>
            </a>
        </p>
    </div>


    <div class="clone-box">
        @foreach ($views as $key => $view)
            <div class="row to-be-cloned">
                <fieldset class="form-group col-md-1 p-3 text-center">
                    <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> شماره </label>
                    <input name="number[]" value="{{$view->number}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-6 p-3">
                    <label> عنوان </label>
                    <input name="title[]" value="{{$view->title}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-3 p-3">
                    <label> تصویر <span dir="ltr">528*297</span></label>
                    <input name="picture[]" type="file" class="form-control-file">
                </fieldset>
                <fieldset class="col-12">
                    <textarea name="passage[]" rows="2" class="form-control">{{$view->passage}}</textarea>
                </fieldset>
            </div>
        @endforeach
    </div>


    <div class="row">
        <div class="col-md-5"></div>
        <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
    </div>
</form>
