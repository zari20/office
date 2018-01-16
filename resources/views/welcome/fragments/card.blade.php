@extends('layouts.welcome')
@section('content')
    @include('welcome_partials.banner', ['title' => ' مدیریت آگهی ها'])

    <form class="p-3" action="{{url('/welcome_page/card/'.$section->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <p class="h5 mt-3">
            <a class="cloner pointer">
                آگهی
                <i class="fa fa-plus text-info mt-1 mr-2"></i>
            </a>
        </p>


        <div class="clone-box">
            @foreach ($section->fragments() as $key => $card)
                <div class="row to-be-cloned">
                    <input type="hidden" name="section_id[]" value="{{$section->id}}">
                    <fieldset class="form-group col-md-1 p-3 text-center">
                        <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                    </fieldset>
                    <fieldset class="form-group col-md-1 p-3">
                        <label> شماره </label>
                        <input name="number[]" value="{{$card->number}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> عنوان </label>
                        <input name="title[]" value="{{$card->title}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> برچسب روی عکس </label>
                        <input name="picture_sticker[]" value="{{$card->picture_sticker}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> برچسب روی متن </label>
                        <input name="text_sticker[]" value="{{$card->text_sticker}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> لینک </label>
                        <input name="link[]" value="{{$card->link}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> کلمه </label>
                        <input name="word[]" value="{{$card->word}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> آیکون </label>
                        <input name="icon[]" value="{{$card->icon}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-8 p-3">
                        <label> توضیحات </label>
                        <input name="passage[]" value="{{$card->passage}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> تصویر <span dir="ltr">528*297</span></label>
                        <input name="picture[]" type="file" class="form-control-file">
                    </fieldset>
                </div>
                <hr class="col-12">
            @endforeach
        </div>


        <div class="row mt-4">
            <div class="col-md-5"></div>
            <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
        </div>
    </form>

@endsection
