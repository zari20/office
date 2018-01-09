<p class="h3 dinar text-info">  {{$words->contact_main_branch}} </p>
<form class="p-3" action="{{url('/welcome_page/main_branch')}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="row">
        <fieldset class="form-group col-md-2 p-3">
            <label> آیدی تلگرام </label>
            <input name="telegram_id" type="text" class="form-control" value="{{$main_branch->telegram_id}}">
        </fieldset>
        <fieldset class="form-group col-md-2 p-3">
            <label> آیدی اینستاگرام </label>
            <input name="instagram_id" type="text" class="form-control" value="{{$main_branch->instagram_id}}">
        </fieldset>
        <fieldset class="form-group col-md-3 p-3">
            <label> مختصات محور x نقشه </label>
            <input name="x_direction" type="text" class="form-control" value="{{$main_branch->x_direction}}">
        </fieldset>
        <fieldset class="form-group col-md-3 p-3">
            <label> مختصات محور y نقشه </label>
            <input name="y_direction" type="text" class="form-control" value="{{$main_branch->y_direction}}">
        </fieldset>
        <fieldset class="form-group col-md-2 p-3">
            <label> درجه زوم نقشه </label>
            <input name="map_zoom" type="text" class="form-control" value="{{$main_branch->map_zoom}}">
        </fieldset>
        <fieldset class="form-group col-md-12 p-3">
            <label> اطلاعات تماس </label>
            <textarea name="passage" rows="6" class="form-control">{{$main_branch->passage}}</textarea>
        </fieldset>
    </div>


    <div class="row">
        <div class="col-md-5"></div>
        <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
    </div>
</form>
