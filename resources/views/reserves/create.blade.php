@extends('layouts.app')
@section('content')
    @guest
        <h4 class="reserve-title badge mb-md-4 my-2"> <i class="fa fa-lock ml-1"></i> تعریف حساب کاربری </h4>
        @include('fragments.new_user')
        <hr>
    @else
        <div class="alert alert-success">
            <i class="fa fa-check ml-1"></i>
            شما وارد حساب کاربری خود شدید.
            <br>
            <i class="fa fa-user ml-1"></i>
            نام کاربری یا شماره موبایل شما :
            <span class="text-dark"> {{auth()->user()->username ?? auth()->user()->mobile}} </span>
        </div>
        @if (admin())
            <div class="alert alert-warning">
                <i class="fa fa-warning ml-1"></i>
                توجه داشته باشید که شما با دسترسی ادمین وارد شده اید.
            </div>
        @endif
    @endguest

    <form class="" action="{{'reserves'}}" method="post">
        @csrf

        <h4 class="reserve-title badge"> <i class="fa fa-sitemap ml-1"></i> اطلاعات دوره آموزشی / کنفرانس </h4>
        @include('fragments.new_course')
        <hr>

        <h4 class="reserve-title badge"> <i class="fa fa-bank ml-1"></i> اطلاعات رزرو سالن </h4>
        @include('fragments.new_schedule')
        <hr>

        <h4 class="reserve-title badge"> <i class="fa fa-coffee ml-1"></i> خدمات پذیرایی را انتخاب نمایید </h4>
        @include('fragments.new_service',['type'=>'catering', 'services'=>$caterings])
        <hr>

        <h4 class="reserve-title badge"> <i class="fa fa-film ml-1"></i> خدمات سمعی بصری را انتخاب نمایید. </h4>
        @include('fragments.new_service',['type'=>'medium', 'services'=>$media])
        <hr>

        <h4 class="reserve-title badge"> <i class="fa fa-gamepad ml-1"></i> خدمات گرافیکی را انتخاب نمایید. </h4>
        @include('fragments.new_service',['type'=>'graphics', 'services'=>$graphics])
        <hr>

        <h4 class="reserve-title badge"> <i class="fa fa-headphones ml-1"></i> خدمات روابط عمومی و اطلاع رسانی را انتخاب نمایید. </h4>
        @include('fragments.new_service',['type'=>'informing', 'services'=>$informings])
        <hr>

        <h4 class="reserve-title badge"> <i class="fa fa-edge ml-1"></i> خدمات رزرواسیون آنلاین را انتخاب نمایید. </h4>

        <hr>

        <h4 class="reserve-title badge"> <i class="fa fa-check ml-1"></i> نهایی سازی و پرداخت آنلاین را انتخاب نمایید </h4>

        <hr>
    </form>


@endsection
