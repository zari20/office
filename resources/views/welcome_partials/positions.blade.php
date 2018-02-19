@extends('layouts.welcome')
@section('content')
    <div class="text-center bg-info p-4 text-white">
        <span class="h2 dinar">مدیریت ترتیب ها</span>
        <a href="{{url('welcome_panel')}}" class="border-btn float-right"> <i class="fa fa-home m-1"></i> برگشت </a>
    </div>
    <form class="container my-4 text-center" action="{{url('welcome_positions')}}" method="post">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        @foreach ($layouts as $key => $layout)
            <div class="card my-1">
                <div class="card-block p-2 bx-blue">
                    <div class="row my-2">
                        <div class="col-md-3">
                            <span class="font-weight-bold dinar lead">{{welcome_translate(rw($layout->puzzle_type))}}</span>
                        </div>
                        <div class="col-md-3">
                            {{$layout->puzzle->title}}
                            ({{$layout->puzzle->latin_id}})
                        </div>
                        <div class="col-md-3">
                            <label class="custom-control custom-checkbox">
                                <input type="hidden" name="container{{$key}}" value="0">
                                <input type="checkbox" class="custom-control-input" name="container{{$key}}" @if($layout->container) checked @endif value="1">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">فاصله</span>
                            </label>
                        </div>
                        <div class="col-md-3">
                            <input type="number" name="position[]" value="{{$layout->position}}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="row mt-4">
            <div class="col-md-5"></div>
            <div class="col-md-2">
                <button type="submit" class="form-control btn btn-primary">تایید</button>
            </div>
        </div>
    </form>
@endsection
