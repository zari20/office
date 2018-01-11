@extends('layouts.welcome')
@section('content')
    @include('welcome_partials.banner', ['title' => ' مدیریت هدر'])

    <form class="p-3" action="{{url('/welcome_page/header')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="row">
            <fieldset class="form-group col-md-3">
                <label> شماره تماس هدر بالا </label>
                <input value="{{$header->telephone ?? ''}}" type="text" class="form-control" name="telephone">
            </fieldset>

            <fieldset class="form-group col-md-3">
                <label> آیدی تلگرام </label>
                <input value="{{$header->telegram_id ?? ''}}" type="text" class="form-control" name="telegram_id">
            </fieldset>

            <fieldset class="form-group col-md-3">
                <label> آیدی اینستاگرام </label>
                <input value="{{$header->instagram_id ?? ''}}" type="text" class="form-control" name="instagram_id">
            </fieldset>

            <fieldset class="form-group col-md-3">
                <label> عنوان لینک های لوگو دار </label>
                <input value="{{$header->top_links_topic ?? ''}}" type="text" class="form-control" name="top_links_topic">
            </fieldset>

            <fieldset class="form-group col-md-3">
                <label> عبارت جستجو </label>
                <input value="{{$header->search_placeholder ?? ''}}" type="text" class="form-control" name="search_placeholder">
            </fieldset>

            <fieldset class="form-group col-md-3">
                <label> نام لینک </label>
                <input value="{{$header->link_name ?? ''}}" type="text" class="form-control" name="link_name">
            </fieldset>

            <fieldset class="form-group col-md-3">
                <label> آیکون لینک </label>
                <input value="{{$header->link_icon ?? ''}}" type="text" class="form-control" name="link_icon">
            </fieldset>

            <fieldset class="form-group col-md-3">
                <label> هدف لینک </label>
                <input value="{{$header->link_href ?? ''}}" type="text" class="form-control" name="link_href">
            </fieldset>
        </div>

        <p class="h5 mt-3">
            <a class="cloner pointer">
                لینک
                <i class="fa fa-plus text-info mt-1 mr-2"></i>
            </a>
        </p>


        <div class="clone-box">
            @foreach ($top_links as $key => $link)
                <div class="row to-be-cloned">
                    <fieldset class="form-group col-md-1 p-3 text-center">
                        <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                    </fieldset>
                    <fieldset class="form-group col-md-1 p-3 text-center">
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
@endsection
