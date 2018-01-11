@extends('layouts.welcome')
@section('content')
    @include('welcome_partials.banner', ['title' => ' مدیریت  لینک ها'])

    <form class="p-5" action="{{url('/welcome_page/link/'.$section->id)}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <p class="h5 mt-3">
            <a class="cloner pointer">
                لینک
                <i class="fa fa-plus text-info mt-1 mr-2"></i>
            </a>
        </p>


        <div class="clone-box">
            @foreach ($section->fragments() as $key => $link)
                <div class="row to-be-cloned">
                    <input type="hidden" name="section_id[]" value="{{$section->id}}">
                    <fieldset class="form-group col-md-1 p-3 text-center">
                        <a class="delete-cloned pointer"><i class="fa fa-trash fa-2x mt-4 text-danger"></i></a>
                    </fieldset>
                    <fieldset class="form-group col-md-4 p-3">
                        <label> عنوان </label>
                        <input name="name[]" value="{{$link->name}}" type="text" class="form-control">
                    </fieldset>
                    <fieldset class="form-group col-md-7 p-3">
                        <label> لینک </label>
                        <input name="href[]" value="{{$link->href}}" type="text" class="form-control">
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
