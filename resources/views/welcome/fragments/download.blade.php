@extends('layouts.welcome')
@section('content')
    @include('welcome_partials.banner', ['title' => 'دانلود فایل 4 ستونه'])
    @if ($editable) @include('welcome_partials.edit_section') @endif

    <form class="p-5" action="{{url('/welcome_page/download/'.$section->id)}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <p class="h5 mt-3">
            <a class="cloner pointer">
                ستون
                <i class="fa fa-plus text-info mt-1 mr-2"></i>
            </a>
        </p>

        <div class="clone-box">
            @foreach ($section->fragments() as $key => $download)
                <div class="row to-be-cloned">
                    <input type="hidden" name="section_id[]" value="{{$section->id}}">
                    <fieldset class="form-group col-md-1 p-3 text-center">
                        <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                    </fieldset>
                    <fieldset class="form-group col-md-1 p-3 text-center">
                        <label> شماره </label>
                        <input name="number[]" value="{{$download->number}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> عنوان </label>
                        <input name="title[]" value="{{$download->title}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-4 p-3">
                        <label> متن </label>
                        <input name="passage[]" value="{{$download->passage}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> تصویر </label>
                        <input name="picture[]" type="file" class="form-control-file">
                    </fieldset>
                    <fieldset class="form-group col-md-2 p-3">
                        <label> فایل </label>
                        <input name="file[]" type="file" class="form-control-file">
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
