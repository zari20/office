@extends('layouts.welcome')
@section('content')
    @include('welcome_partials.banner', ['title' => ' مدیریت بلاگ ها'])

    <form class="p-3" action="{{url('/welcome_page/blog/'.$section->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <p class="h5 mt-3">
            <a class="cloner pointer">
                بلاگ
                <i class="fa fa-plus text-info mt-1 mr-2"></i>
            </a>
        </p>


        <div class="clone-box">
            @foreach ($section->fragments() as $key => $blog)
                <div class="row to-be-cloned">
                    <input type="hidden" name="section_id[]" value="{{$section->id}}">
                    <fieldset class="form-group col-md-1 p-3 text-center">
                        <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> شماره </label>
                        <input name="number[]" value="{{$blog->number}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-6 p-3">
                        <label> عنوان </label>
                        <input name="title[]" value="{{$blog->title}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-3 p-3">
                        <label> تصویر <span dir="ltr">528*297</span></label>
                        <input name="picture[]" type="file" class="form-control-file">
                    </fieldset>
                    <fieldset class="col-12">
                        <textarea name="passage[]" rows="2" class="form-control">{{$blog->passage}}</textarea>
                    </fieldset>
                </div>
            @endforeach
        </div>


        <div class="row mt-4">
            <div class="col-md-5"></div>
            <button type="submit" class="btn btn-primary form-control col-md-2"> تایید </button>
        </div>
    </form>

@endsection
