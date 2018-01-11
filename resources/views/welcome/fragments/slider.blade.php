@extends('layouts.welcome')
@section('content')
    @include('welcome_partials.banner', ['title' => ' مدیریت اسلایدر ها'])

    <form class="p-3" action="{{url('/welcome_page/slider/'.$section->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="row">
            <fieldset class="form-group col-md-3 p-3">
                <label> تصویر پس زمینه </label>
                <input name="background" type="file" class="form-control-file">
            </fieldset>
        </div>

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
                    <fieldset class="form-group col-md-2 p-3">
                        <label> عنوان </label>
                        <input name="title[]" value="{{$slider->title}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-5 p-3">
                        <label> متن </label>
                        <input name="body[]" value="{{$slider->body}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> نام دکمه </label>
                        <input name="button_name[]" value="{{$slider->button_name}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> لینک دکمه </label>
                        <input name="button_link[]" value="{{$slider->button_link}}" type="text" class="form-control">
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
