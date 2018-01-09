<p class="h3 dinar text-blue"> فوتر </p>
<form class="p-3" action="{{url('/welcome_page/footer')}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="row">
        <fieldset class="form-group col-md-6 p-3">
            <label> عنوان فوتر </label>
            <input name="title" value="{{$footer->title ?? ''}}" type="text" class="form-control">
        </fieldset>
        <fieldset class="form-group col-md-6 p-3">
            <label> کپی رایت </label>
            <input name="copy_right" value="{{$footer->copy_right ?? ''}}" type="text" class="form-control">
        </fieldset>
        <fieldset class="form-group col-md-12">
            <textarea name="passage" rows="2" class="form-control">{{$footer->passage ?? ''}}</textarea>
        </fieldset>
    </div>

    <div class="">
        <p class="h5 mt-3">
            <a class="cloner pointer">
                لینک
                <i class="fa fa-plus text-blue mt-1 mr-2"></i>
            </a>
        </p>
    </div>

    <div class="clone-box">
        @foreach ($links as $key => $link)
            <div class="row to-be-cloned">
                <fieldset class="form-group col-md-1 p-3">
                    <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                </fieldset>
                <fieldset class="form-group col-md-4 p-3">
                    <label> عنوان </label>
                    <input name="name[]" value="{{$link->name}}" type="text" class="form-control">
                </fieldset>
                <fieldset class="form-group col-md-7 p-3">
                    <label> لینک </label>
                    <input name="href[]" value="{{$link->href}}" type="text" class="form-control">
                </fieldset>
            </div>
        @endforeach
    </div>


    <div class="row">
        <div class="col-md-5"></div>
        <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
    </div>
</form>
