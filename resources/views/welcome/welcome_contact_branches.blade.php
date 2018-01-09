<p class="h3 dinar text-info">  {{$words->contact_branches}} </p>
<form class="p-3" action="{{url('/welcome_page/contact_branches')}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="">
        <p class="h5 mt-3">
            <a class="cloner pointer">
                شعبه
                <i class="fa fa-plus text-info mt-1 mr-2"></i>
            </a>
        </p>
    </div>

    <div class="clone-box">
        @foreach ($branches as $key => $branch)
            <div class="row to-be-cloned">
                <fieldset class="form-group col-md-1 p-3">
                    <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> آیدی تلگرام </label>
                    <input name="telegram_id[]" type="text" class="form-control" value="{{$branch->telegram_id}}">
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> آیدی اینستاگرام </label>
                    <input name="instagram_id[]" type="text" class="form-control" value="{{$branch->instagram_id}}">
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> مختصات محور x نقشه </label>
                    <input name="x_direction[]" type="text" class="form-control" value="{{$branch->x_direction}}">
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> مختصات محور y نقشه </label>
                    <input name="y_direction[]" type="text" class="form-control" value="{{$branch->y_direction}}">
                </fieldset>
                <fieldset class="form-group col-md-2 p-3">
                    <label> درجه زوم نقشه </label>
                    <input name="map_zoom[]" type="text" class="form-control" value="{{$branch->map_zoom}}">
                </fieldset>
                <fieldset class="form-group col-md-12">
                    <textarea name="passage[]" rows="2" class="form-control">{{$branch->passage}}</textarea>
                </fieldset>
                <hr class="col-12">
            </div>
        @endforeach
    </div>


    <div class="row">
        <div class="col-md-5"></div>
        <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
    </div>
</form>
