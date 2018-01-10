@extends('layouts.welcome')
@section('content')
    @include('welcome_partials.banner', ['title' => 'ارتباط با ما'])

    <hr>
    <p class="h3 text-center text-white bg-success py-4 dinar"> تنظیمات اصلی </p>
    <hr>

    <form class="p-3" action="{{url('/welcome_page/contact_us')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="row">
            <fieldset class="form-group col-md-4 p-3">
                <label> عنوان </label>
                <input name="title" type="text" class="form-control" value="{{$contact_us->title}}">
            </fieldset>
            <fieldset class="form-group col-md-4 p-3">
                <label> عنوان تب دفتر مرکزی </label>
                <input name="main_branch_title" type="text" class="form-control" value="{{$contact_us->main_branch_title}}">
            </fieldset>
            <fieldset class="form-group col-md-4 p-3">
                <label> عنوان تب شعب </label>
                <input name="other_branches_title" type="text" class="form-control" value="{{$contact_us->other_branches_title}}">
            </fieldset>
            <fieldset class="form-group col-md-4 p-3">
                <label> عنوان تب فرم ارتباط </label>
                <input name="form_title" type="text" class="form-control" value="{{$contact_us->form_title}}">
            </fieldset>
            <fieldset class="form-group col-md-4 p-3">
                <p> تصویر پس زمینه </p>
                <input name="background_path" type="file" class="custome-form-control">
            </fieldset>
            <fieldset class="form-group col-md-4 p-3">
                <p> نمایش فرم ارتباط </p>
                <label class="custom-control custom-radio">
                    <input id="radio1" name="form_visible" type="radio" value="1" class="custom-control-input" {{$contact_us->form_visible ? 'checked' : ''}}>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">بلی</span>
                </label>
                <label class="custom-control custom-radio">
                    <input id="radio2" name="form_visible" type="radio" value="0" class="custom-control-input" {{$contact_us->form_visible ? '' : 'checked'}}>
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">خیر</span>
                </label>
            </fieldset>
            <div class="col-md-5"></div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary form-control">تایید</button>
            </div>

        </div>
    </form>

    <hr>
    <p class="h3 text-center text-white bg-success py-4 dinar"> شعبه اصلی </p>
    <hr>

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


    <hr>
    <p class="h3 text-center text-white bg-success py-4 dinar"> سایر شعب </p>
    <hr>

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
                        <textarea name="passage[]" rows="6" class="form-control">{{$branch->passage}}</textarea>
                    </fieldset>
                </div>
            @endforeach
        </div>


        <div class="row">
            <div class="col-md-5"></div>
            <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
        </div>
    </form>

@endsection
