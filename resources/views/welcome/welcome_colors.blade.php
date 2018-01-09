<form class="p-3" action="{{url('/welcome_page/colors')}}" method="post">
    {{ csrf_field() }}
    {{ method_field('PATCH') }}

    <div class="row">
        <div class="form-group col-md-4">
            <label for="layout_background"> پس زمینه هدر و فوتر </label>
            <input type="color" class="form-control" id="layout_background" name="layout_background" value="{{$colors->layout_background}}"  style="background-color:{{$colors->layout_background}}">
        </div>
        {{-- <div class="form-group col-md-4">
            <label for="layout_text"> رنگ نوشته های هدر و فوتر </label>
            <input type="color" class="form-control" id="layout_text" name="layout_text" value="{{$colors->layout_text}}"  style="background-color:{{$colors->layout_text}}">
        </div> --}}
        <div class="form-group col-md-4">
            <label for="organ_color_1"> رنگ سازمانی 1 </label>
            <input type="color" class="form-control" id="organ_color_1" name="organ_color_1" value="{{$colors->organ_color_1}}"  style="background-color:{{$colors->organ_color_1}}">
        </div>
        <div class="form-group col-md-4">
            <label for="organ_color_2"> رنگ سازمانی 2 </label>
            <input type="color" class="form-control" id="organ_color_2" name="organ_color_2" value="{{$colors->organ_color_2}}"  style="background-color:{{$colors->organ_color_2}}">
        </div>
    </div>

    <div class="row">
        <div class="col-md-5"></div>
        <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
    </div>
</form>
