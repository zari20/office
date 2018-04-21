@extends('layouts.welcome')
@section('content')
    @include('welcome_partials.banner', ['title' => ' مدیریت اسلایدر ها'])
    @if ($editable) @include('welcome_partials.edit_section') @endif

    <form class="p-5" action="{{url('/welcome_page/slider/'.$section->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <p class="h5 mt-3">
            <a class="cloner pointer">
                اسلایدر
                <i class="fa fa-plus text-info mt-1 mr-2"></i>
            </a>
        </p>

        <div class="clone-box">
            @foreach ($section->fragments() as $key => $slider)
                <div class="row to-be-cloned">
                    <input type="hidden" name="section_id[]" value="{{$section->id}}">
                    <fieldset class="form-group col-md-1 p-3 text-center">
                        <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                    </fieldset>
                    <fieldset class="form-group col-md-1 p-3">
                        <label> شماره </label>
                        <input name="number[]" value="{{$slider->number}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-3 p-3">
                        <label> عنوان </label>
                        <input name="title[]" value="{{$slider->title}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-3 p-3">
                        <label> نام دکمه </label>
                        <input name="button_name[]" value="{{$slider->button_name}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> لینک دکمه </label>
                        <input name="button_link[]" value="{{$slider->button_link}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> تصویر پس زمینه </label>
                        <input name="picture[]" type="file" class="form-control-file">
                    </fieldset>
                    <fieldset class="form-group col-md-12 p-3">
                        <label> توضیحات </label>
                        <input name="passage[]" value="{{$slider->passage}}" type="text" class="form-control" placeholder="متن توضیحات">
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

@endsection
