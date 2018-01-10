@extends('layouts.welcome')
@section('content')
    <div class="text-center bg-info p-4 text-white">
        <span class="h2 dinar">ایجاد تب جدید</span>
        <a href="{{url('welcome_panel')}}" class="border-btn float-right"> <i class="fa fa-home m-1"></i> برگشت </a>
    </div>
    <form class="row p-4" action="{{url('/welcome_tabs')}}" method="post">
        {{ csrf_field() }}
        <div class="form-group col-md-6">
            <label for="title">عنوان</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group col-md-6">
            <label for="latin_id">آیدی (لاتین)</label>
            <input type="text" class="form-control" id="latin_id" name="latin_id" lang="en" dir="ltr">
        </div>

        <hr class="col-12">
        <div class="col-12 text-center">
            <a class="cloner pointer h2">
                <i class="fa fa-plus text-info mt-1 mr-2"></i>
                تب
            </a>
        </div>
        <hr class="col-12">

        @include('welcome_partials.pure_section',['array'=>true])

        <div class="col-md-5"></div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary form-control">تایید</button>
        </div>
    </form>
@endsection
