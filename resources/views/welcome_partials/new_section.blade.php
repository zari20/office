@extends('layouts.welcome')
@section('content')
    <div class="text-center bg-info p-4 text-white">
        <span class="h2 dinar">ایجاد بخش جدید</span>
        <a href="{{url('welcome_panel')}}" class="border-btn float-right"> <i class="fa fa-home m-1"></i> برگشت </a>

    </div>
    <hr>
    <form class="row p-4" action="{{url('/welcome_sections')}}" method="post">
        {{ csrf_field() }}

        @include('welcome_partials.pure_section',['array'=>false])

        <div class="col-md-5"></div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary form-control">تایید</button>
        </div>
    </form>
@endsection
