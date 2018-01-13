@extends('layouts.welcome')
@section('content')
    <div class="text-center bg-info p-4 text-white">
        <span class="h2 dinar">مدیریت ترتیب ها</span>
        <a href="{{url('welcome_panel')}}" class="border-btn float-right"> <i class="fa fa-home m-1"></i> برگشت </a>
    </div>
    <div class="container my-4 text-center">
        @foreach ($layouts as $key => $layout)
            <div class="row my-2">
                <div class="col-md-3">
                    {{welcome_translate(rw($layout->puzzle_type))}}
                </div>
                <div class="col-md-3">

                </div>
                <div class="col-md-3">
                    <input type="text" name="position[]" value="{{$layout->position}}" class="form-control">
                </div>
            </div>
        @endforeach
    </div>
@endsection
